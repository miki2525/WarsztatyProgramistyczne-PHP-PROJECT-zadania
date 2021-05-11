<?php


$source = __DIR__."/file.txt";

if (is_file($source)){
    $conent = file_get_contents($source);
}

else{
    echo "brak pliku";
}
$countOpinions = preg_split("[====================]", $conent);
$numOfOpinions = count($countOpinions) - 1;


if ($numOfOpinions > 0){
    $beFirst = "Liczba dotychczasowych opinii: " . $numOfOpinions;
}

else{
    $beFirst = "Brak opinii. Bądź pierwszy/a !!!";
}

if(isset($_POST["kasuj"])) {
    if (!$file = fopen($source, "w")) {
        echo "Nie można zapisać do pliku";
    } else {
        fwrite($file, "");
        $beFirst = "Brak opinii. Bądź pierwszy/a !!!";
        fclose($file);
    }
}

if(isset($_POST["slij"])) {
    $opinion = $_POST["textArea"];
    if ($opinion == ""){
        echo "Napisz coś";
    }
    else {
        if (!$file = fopen($source, "a")) {
            echo "Nie można zapisać do pliku";
        } else {

            $opinion = $opinion . "\n====================\n";
            fwrite($file, $opinion);
            fclose($file);
            header("Location: opinion.php");

        }
    }
}


?>

<html>
<script>window.onload = function (){
        var x = 1;
        document.getElementById("text").addEventListener("keyup", count);

        function count(){
       var y =  document.getElementById("text").value.length;
       document.getElementById("counter").innerHTML="Ilość znaków: " +y+ "/255.  !!! Nie przekraczaj liczby znaków !!!";
        if (y >= 256){
            document.getElementById("text").value;
            document.getElementById("div").style.display="block";
            // document.getElementById("text").removeEventListener("keyup", count);
            document.getElementById("text").style.display="none";
            document.getElementsByClassName("submit")[0].style.display="none";
            document.getElementsByClassName("submit")[1].style.display="none";
            document.getElementById("counter").innerHTML="<img src=\"https://sensorstechforum.com/wp-content/uploads/2019/01/hAnt-virus-wants-to-burn-down-your-antminer.jpg\">";

        }
    }
    }
</script>
<body>
<DIV style="border: chocolate dashed"><h1>NAPISZ OPINIĘ</h1></DIV>
<form action="#" method="post">

    <fieldset style="border: coral solid" ">
        <legend>Formularos por Gringo!</legend>

    <li><label>Treść wiadomości: </label><div style="width: 50%; height: 10%; background-color: red" hidden id="div">!!MACHINE BLOWN!!</div>
        <textarea name="textArea" id="text" cols="25" rows="7" wrap="hard" ></textarea><label id="counter" ></label></li>

    <br>
    <?php echo $beFirst ?>
    </fieldset>
    <input type="submit" name="slij" class="submit">
    <input type="submit" name="kasuj" class="submit" value="kasuj">
    <br></form>

</body>
</html>