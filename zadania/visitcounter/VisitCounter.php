<?php

if(!$fd = fopen("file.txt", "r")) {
    echo "Nie mozna otworzyc pliku licznik.txt";
    if (!$fd = fopen("licznik.txt", "w")) {
        echo "Nie mozna utworzyc pliku licznik.txt";
        exit(1);
    } else {
        fwrite($fd, "1");
        fclose($fd);
    }
}
else{
        $counter = (int)fread($fd, filesize("licznik.txt"));
        fclose($fd);
    }

    if (!$fd = fopen("licznik.txt", "w")) {
        echo "Nie mozna otworzyc pliku licznik.txt";
    } else {
        ++$counter;
        fwrite($fd, (string)$counter);
        fclose($fd);
    }
?>





<!DOCTYPE html>
<html>
<body>

<h1><?php echo "Licznik odwiedzin strony: ".$counter?></h1>

</form>
</body>
</html>
