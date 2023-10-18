<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <style>
body {font-family: 'Helvetica', 'sans-serif';
    background-color: whitesmoke;
    color:#222;
    margin: 0 auto;
    width: 100%;}
main {background-color: black;
        color: white;
        display: flex;
        justify-content: center;
        height: 100px;}
div,  {width: 50%;}
footer {background-color: black;
    color: white;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;}
a {color: #aaa;
    text-decoration: none;
    border-bottom: 1px solid white;}
.ul{
    display: flex;
    flex-direction: row;
}

    </style>
</head>
<body>


    <main>
        <h1>Kontakt<h2>
    </main>
    <nav>
        <ul>
            <li><a href="index.php">Strona Główna</a></li>
            <li><a href="contact.php">Kontakt</a></li>
            <li><a href="about-as.php">O nas</a></li>
        </ul>

    </nav>

    <form id = "formularz"><div>

<input name="Imię">Podaj swoje imię<br>
<input name="Nazwisko">Podaj swoje nazwisko<br>
<input type="submit" value="Wyślij formularz">
<input type="reset" value="Wyczyść dane">
</div></form>

<script>
document.getElementById("formularz").addEventListener("click", Wyślij_formularz);
function Wyślij_formularz() {
    alert ("Nie można wysłać formularza")
}

</script>

    <?php
    require_once('./footer.php')
    ?>
</body>
</html>
