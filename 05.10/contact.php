<?php
    $tytul = "Kontakt";

    require("./parts/head.php"); ?>

    <?php require("./parts/nav.php"); ?>

    <div>

        <form>
            <label for="imie">Imię: </label><br>
            <input type="text" id="imie" name="imie"><br>
            <label for="nazwisko">Nazwisko: </label><br>
            <input type="text" id="nazwisko" name="nazwisko"><br>
            <label for="email">E-mail</label><br>
            <input type="email" id="email" name="email"><br>
            <button>Prześlij</button>
        </form>

    </div>
    <br>

    <?php require("./parts/footer.php"); ?>

    <script>

        document.querySelector("button").onclick=()=>{
            alert("Nie można wysłać formularza");
        }

    </script>
