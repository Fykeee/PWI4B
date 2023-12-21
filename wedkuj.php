<?php
 $db = new mysqli(
    hostname: "127.0.0.1",
    username:"root",
    password:"",
    database:"wedkowanie",
    port:3306
 );
 if($db->connect_errno){
    echo "Błąd połączenia z bazą danych";
 }
 function skrypt1(): ?array{
    global $db;
    $result = $db->query("SELECT Ryby.nazwa, Lowisko.akwen, Lowisko.wojewodztwo FROM Ryby INNER JOIN Lowisko ON Ryby.id=Lowisko.Ryby_id WHERE Lowisko.rodzaj=3;");
    while($row=$result->fetch_assoc()){
        $rybunie[] = $row;
    }
    $result->free_result();
    $db->close();
    return $rybunie;
 }
 function skrypt2(): ?array{
    global $db;
    $result = $db->query("SELECT id, nazwa, wystepowanie FROM Ryby WHERE styl_zycia = 1;");
    while($row=$result->fetch_assoc()){
        $drapiezne[] = $row;
    }
    $result->free_result();
    $db->close();
    return $drapiezne;
 }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="./styl_1.css">
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <div id="centrum">
        <section class="lewy" id="pierwszy">
            <h3>Ryby zamieszkujące rzeki</h3>
            <ol>
                <pre>
                <?php
                    var_dump(skrypt1());
                ?>
                </pre>
            </ol>
        </section>



        <section class="lewy" id="drugi">
            <h3>Ryby drapieżne naszych wód</h3>
            <table>
                <thead>
                    <th>L.p.</th>
                    <th>Gatunek</th>
                    <th>Występowanie</th>  
                </thead>
                <tbody>

                </tbody>
            </table>
        </section>



        <section  id="prawy">
            <img src="./ryba1.jpg" alt="Sum">
            <a href="./kwerendy.txt">Pobierz kwerendy</a>
        </section>
    </div>
    <footer>
        <p>Stronę wykonał: 0000000</p>
    </footer>
</body>
</html>