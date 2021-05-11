<?php
$error = "przekieruj sie";
if(isset($_POST["slijto"])) {

    $url = $_POST["textArea"];
    $stringURL = $url;
    $url = urldecode($url);
    $httpCheck = substr($url, 0, 7);
    $httpsCheck = substr($url, 0, 8);
    if ($httpsCheck != "https://" && $httpCheck != "http://") {
        $error = "Niepoprawny adres";
    } else { header("Location: " . $url);
        }
}
?>
<html>

<script>window.onload = function (){
    }
</script>
<body>

<form action="#" method="post">

    <fieldset style="border: mediumorchid solid" ">

    <label>Address: </label><div style="width: 50%; height: 10%; background-color: red" hidden id="div">!!MACHINE BLOWN!!</div>
        <textarea name="textArea" style="box-shadow: green 3px 2px" id="text" cols="100" rows="1" wrap="hard" >https://</textarea><label id="counter" ></label></li>
    <br><label style="font-size: 12px; color: dodgerblue">F5 - > refresh<br>Example: https://romhustler.org/img/screenshots/psx_full/ingame/530c49db75ebb.png</label>
    <br>

    </fieldset>
    <input type="submit" name="slijto" style="border: ghostwhite solid; box-shadow: green 3px 2px">
    <br></form>
<h1><?php echo $error ?></h1>

</body>
</html>