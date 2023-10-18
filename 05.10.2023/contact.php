<?php
    $podstrona = "Contact";
    $content = "Kontakt";
    $level = 1;
    require("site/head.php"); ?>
<body>
    <?php require("views/nav.php"); ?>
    <div>
        <form>
            <label for="fname">Imię: </label><br />
            <input type="text" id="fname" name="fname"><br />
            <label for="lname">Nazwisko: </label><br />
            <input type="text" id="lname" name="lname"><br />
            <label for="email">E-mail</label><br />
            <input type="e-mail" id="email" name="email"><br /><br />
            <input type="submit" value="Prześlij" id="submit">
        </form>
    </div><br />
    <?php require("views/footer.php"); ?>
    <script>
        document.querySelector("#submit").onclick=()=>{
            alert("Nie można wysłać formularza");
        }
    </script>
</body>
</html>