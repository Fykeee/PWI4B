<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <h1>O nas<h2>
    </main>
<nav class ="nav" >
        <ul>
            <li><a href="index.php">Strona Główna</a></li>
            <li><a href="contact.php">Kontakt</a></li>
            <li><a href="about-as.php">O nas</a></li>
        </ul>

    </nav>
<p>Jestem uczniem ZSK</p>
<p>Mam 18 lat</p>
<?php
    require_once('./footer.php')
    ?>
</body>
</html>
