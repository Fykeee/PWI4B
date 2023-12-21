<?php

$conn = new mysqli(
    hostname: "127.0.0.1",
    username:"root",
    password:"",
    database:"wedkowanie",
    port:3306,
);

if($conn->connect_errno){
    echo "błąd łączenia z bazą danych ";
}

function fn1(): ?array{
    global $conn;
    $result = $conn->query("SELECT Ryby.nazwa, Lowisko.akwen, Lowisko.wojewodztwo FROM Ryby INNER JOIN Lowisko ON Ryby.id=Lowisko.Ryby_id WHERE Lowisko.rodzaj=3;");
    while($row=$result->fetch_assoc()){
        $ryby[] = $row;
    }

    $conn->close();
    $result->free_result();
    return $ryby;
}

function fn2(): ?array{
    global $conn;
    $result = $conn->query("SELECT id, nazwa, wystepowanie FROM Ryby WHERE styl_zycia = 1;");
    while($row=$result->fetch_assoc()){
        $rybydrap[] = $row;
    }
    $result->free_result();
    $conn->close();
    return $rybydrap;
}
?>



<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wędkowanie </title>
    <link rel="stylesheet" href="./styl_1.css">
</head>
<body>
<header>
    <h1>Portal dla wędkarzy </h1>
</header>
<div id="centrum">
    <section class="left" id="first">
        <h3>Ryby zamieszkujące rzeki </h3>
        <ol>



                <?php
                $conn = new mysqli(
                    hostname: "127.0.0.1",
                    username: "root",
                    password: "",
                    database: "wedkowanie",
                    port: "3306",
                );

                if($conn->connect_errno){
                    echo "błąd łączenia z bazą danych ";
                }
                $result = $conn->query("SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby INNER JOIN lowisko on ryby.id=lowisko.Ryby_id WHERE lowisko.rodzaj = 3;");
                while($row = mysqli_fetch_array($result)) {
                    echo "<li>" . $row[0] . " pływa w rzece " . $row[1] . ", " . $row[2] . "</li>";
                }
                $conn->close();
                ?>



        </ol>
    </section>



    <section class="left" id="second">

        <h3>Ryby drapieżne naszych wód </h3>
        <table>
            <thead>
            <th>L.p. </th>
            <th>Gatunek </th>
            <th>Występowanie </th>
            </thead>
            <tbody>

                <?php

                    $conn= new mysqli(
                            hostname: "127.0.0.1",
                            username: "root",
                            password: "",
                            database: "wedkowanie",
                            port: 3306,
                    );

                    if($conn->connect_errno) {
                        echo "Błąd połączenia z bazą danych";
                    }
                    $result = $conn -> query("SELECT id, nazwa, wystepowanie FROM ryby where styl_zycia=1;");
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>".
                            "<td>".$row[0]."</td>".
                            "<td>".$row[1]."</td>".
                            "<td>".$row[2]."</td>".
                        "</tr>";
                    }
                    $conn->close();
                ?>

            </tbody>
        </table>

    </section>



    <section id="right">
        <img src="./ryba1.jpg" alt="sum"><br>
        <a href="./kwerendy.txt">Pobierz kwerendy </a>
    </section>

</div>

<footer>
    <p>Stronę wykonał: 0000000000000000000</p>
</footer>

</body>
</html>