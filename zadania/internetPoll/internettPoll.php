<?php
if(isset($_POST["answer"])) {

        $content = file_get_contents(__DIR__."/file.txt");
        $answers = explode(" ", $content);
        $yes = (int)$answers[0];
        $no = (int)$answers[1];

        if (!isset($_COOKIE["poll"])) {
            setcookie("poll", "voted", time() + (15));

            switch ($_POST["answer"]) {
                case "yes":
                    $yes++;
                    break;
                case "no":
                    $no++;
                    break;
            }

        if (!$fd = fopen(__DIR__."/file.txt", "w")) {
        echo "nie moge sprawdzic wynikow";
}
        else {
            fwrite($fd, $yes . " " . $no);
            $scores = "SUCCESS!!!<br>
                        Scores<br>
                        &nbspYES: &nbsp" . $yes . " votes<br>
                        &nbspNO: &nbsp" . $no . " votes<br>";
            fclose($fd);
        }
        }
        else{
            $scores = "You have already voted, try again after 15 seconds<br>
                        Scores<br>
                        &nbspYES: &nbsp" . $yes . " votes<br>
                        &nbspNO: &nbsp" . $no . " votes<br>";
        }
}
?>




<!DOCTYPE html>
<html>
<body text=green>

<div style="background-color: lightgrey; border: black solid; width: 25%; height: 50%;">
    <br><br>
    <form action="#" method="post">

            <legend style="text-align: center">HAVE YOU BEEN IN AMERICA ( USA ) ?</legend>
            <div>
                <br>
                <label>YES </label><input type="radio" name="answer" value="yes">
                <br><br>
                <label>NO </label><input type="radio" name="answer" value="no">
                <br><br>
                <input type="submit" value="VOTE" style="width: 100%">
            </div>
    </form>
    <?php
    if (isset($_POST["answer"])){
        echo $scores;
    }
    ?>

</div>
</body>
</html>
