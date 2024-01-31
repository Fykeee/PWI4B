<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Mój kalendarz</title>
    <link rel="stylesheet" href="../kalendarz/styl5.css">
</head>

<body>
    <header>
        <section id="banner1">
            <img src="../kalendarz/logo1.png" alt="Mój kalendarz">
        </section>

        <section id="banner2">
            <h2>KALENDARZ</h2>

            <?php
            $conn = new mysqli(
                hostname: '127.0.0.1',
                username: 'root',
                password: '',
                database: 'egzamin5',
                port: 3306,
            );

            if ($conn) {
                $sql = "SELECT miesiac, rok FROM zadania WHERE dataZadania  = '2020-07-01'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<h1>miesiąc: $row[0], rok: $row[1]</h1>";
                }

                mysqli_free_result($result);
            } else {
                echo "błąd połączenia";
            }
            ?>

        </section>
    </header>
    <section id="glowny">

        <?php
        if ($conn) {
            $sql = "SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'lipiec'";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {
                echo "<div id='banner3'>
                        <h5>$row[0]</h5>
                        <p>$row[1]</p>
                    </div>";
            }

            mysqli_free_result($result);
        }
        ?>
        
    </section>
    <footer>
        <form action="..//kalendarz/kalendarz.php" method="POST">
            <label>dodaj wpis:
                <input type="text" name="wpis">
            </label>
            <input type="button" name="send" value="DODAJ">
        </form>

        <?php
        if ($conn && isset($_POST['send'])) {
            $wpis = mysqli_real_escape_string($conn, $_POST['wpis']);
            $sql = "UPDATE zadania SET wpis = '$wpis' WHERE dataZadania = '2020-07-13'";
            mysqli_query($conn, $sql);
        }

        if ($conn) {
            mysqli_close($conn);
        }
        ?>

        <p>Stronę wykonał: 21372137213</p>

    </footer>
</body>
</html>
