<nav>
    <ul>
        <li><a href="./index.php">Strona główna</a></li>
        <li><a href="./contact.php">Kontakt</a></li>
        <li><a href="./about-us.php">O nas</a></li>
    </ul>
</nav>
<?php 
    require("./functions.php");
    echo renderHeader($content, $level);
?>