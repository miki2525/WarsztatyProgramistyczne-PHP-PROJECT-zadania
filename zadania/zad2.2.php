<?php



$data = array($_POST['name'],$_POST['mail'],$_POST['phone'],$_POST['temat'],$_POST['textArea'], $_POST['contact']
,$_POST['wwwBefore'],$_POST['file']);


list($name, $mail, $phone, $temat, $textArea, $contact1, $wwwBefore, $file) = $data;

print_r($data);

?>
