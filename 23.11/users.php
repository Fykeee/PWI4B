<?php
$conn = new mysqli(
    hostname:"127.0.0.1",
    username:"root",
    password:"",
    database:"egzamin"
    );
?>
<!doctype html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Panel administratora</title>
        <link rel="stylesheet" href="./styl4.css">

    </head>
    <body>
        <header>
            <h3>Portal społecznościowy - Panel administratora</h3>

        </header>
        <main>
        <section>
            <h4>Użytkownicy</h4>


            <?php

            $sql = 'SELECT id, imie, nazwisko, rok urodzenia, zdjecie FROM osoby LIMIT 30';
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo $row['id'] .''. $row[imie] .''. $row['nazwisko'] .''. (date(format:'Y') - $row['rok_urodzenia']) .'<br>';
            }
            $result->free_result();

            ?>


            <a href="settings.html">Inne ustawienia</a><br>
        </section>
        <section>
            <h4>Podaj id użytkownika</h4>
            <form method="post">
                <input type="number">
                <button>ZOBACZ</button>
            </form>
            <hr>

            <?php

if (isset($_POST['user_id'])) {
    $id = $_POST['user_id'];

    $sql = 'SELECT id, imie, nazwisko, rok urodzenia, zdjecie FROM osoby WHERE id = ' . $id;

    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    echo "<h2>$id. ($result['imie']) {$result['nazwisko']}</h2>";

    echo "<img src='./{$row['zdjecie']}' alt-$id'/>";


            ?>

        </section>
        </main>
        <footer>
            strone wykonal: 000000000000
        </footer>
    </body>
    </html>
<?php
$conn->close();
?>