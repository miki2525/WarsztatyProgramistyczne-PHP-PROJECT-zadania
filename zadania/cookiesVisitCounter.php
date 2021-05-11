<?php

if(!isset($_COOKIE["counter"])) {
    setcookie("counter", 2);
    }
else {
        $counter = (int)$_COOKIE["counter"];
        $counter++;
        setcookie("counter", $counter);
    }
?>


<!DOCTYPE html>
<html>
<body>

<h1>
    <?php
    if (isset($_COOKIE["counter"]) && (int)$_COOKIE["counter"] >= 5){
        echo "Brawo! Masz conajmniej 5 odwiedzin";
    }
    else{
        echo "Odwiedz strone conajmniej 5 razy.";
    }
    ?>
</h1>

<h2>
    <?php echo "Licznik odwiedzin strony: ";
echo isset($_COOKIE["counter"]) ? $_COOKIE["counter"] : 1;
    ?>
</h2>

<h3>

</h3>

</form>
</body>
</html>
