<?

$a =  explode(" ", readline());

foreach ($a as  $ait){
    if($ait <= 0){
        echo "BŁĄD";
        return;
    }
    if(!is_numeric($ait)) {
        echo "BŁĄD";
        return;
    }
}

if (($a[0] + $a[1] > $a[2]) && ($a[0] + $a[2] > $a[1]) && ($a[1] + $a[2] > $a[0])) {
    echo "TAK";
} else {
    echo "NIE";
}

?>
