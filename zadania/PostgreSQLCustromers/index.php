<?php

$password = 'H@SLOtajne54';
$username = "s20157";

$db = new PDO("pgsql:host=localhost;port=5434", $username, $password);
$query = "SELECT * FROM customers";
$result = $db->query($query);
if (!$result){
    echo "BŁĄD w zapytaniu";
    exit;
}
?>

<html>
<body>
<table style="border: 1px solid">
    <?php
    if ($result){?>
        <tr style="border-bottom:  2px red solid">
            <th>firstname</th>
            <th>secondname</th>
        </tr>
    <?php } $i=1;
    while($row = $result->fetch()){ ?>
    <tr>
        <td style="border-bottom: 1px red solid"><?php echo $row['firstname'];?></td>
        <td style="border-bottom: 1px red solid"><?php echo $row['secondname'];?></td>
        <td><form method="post", action="process.php">
                <input type="submit" name="delete" class="delete" value="<?php echo $row['id']?>"><label>USUN</label>
                <input type="submit" name="edit" class="edit" value="<?php echo $row['id'];?>"><label>EDYTUJ</label>
            </form></td>
    </tr> <?php } ?>
</table>
</body>
</html>
