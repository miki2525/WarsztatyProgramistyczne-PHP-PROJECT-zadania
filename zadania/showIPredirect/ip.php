<?php
$guestIP =  $_SERVER["REMOTE_ADDR"];

if(!$file = fopen("wantedIP.txt", "r")){
    echo "Blad otwierania pliku wantedIP.txt";
}
else{

    $OctVer1 = substr($guestIP, 0, 2);
    $OctVer2 = substr($guestIP, 0, 3);

    while (($line = fgets($file)) !== false){
        if ($OctVer2 == substr($line, 0, 3) ||
        $OctVer1 == substr($line, 0, 2)
        ){  //wyswietl inna strone
            header("Location: https://i.ytimg.com/vi/8lzkeJInJyw/maxresdefault.jpg");
        }
    }
    echo "Twoj adres nie jest scigany";
}


?>


<!DOCTYPE html>
<html>
<body>

<h1 style="color: red"><?php echo "Twoj adres IP: " . $guestIP;?></h1>
<br>
<br>
<br>
<p>W pliku zapisane sa pelne adresy. dla zwiekszenia czestotliwosci przekierowan adresow, sprawdzany jest tylko 1 oktet ip.</p>
<h3><a href="http://szuflandia.pjwstk.edu.pl/~s20157/WPRG-PHP/showIPredirect/wantedIP.txt">Link do pliku z adresami wantedIP.txt</a></h3>

</form>
</body>
</html>
