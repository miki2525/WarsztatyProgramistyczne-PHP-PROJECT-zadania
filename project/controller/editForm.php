<?php
session_start();
if(isset($_POST) && isset($_SESSION["login"])){
    print_r($_POST);

    /////check if not exist(create or update), persist to db, setcookie(updated!) return to mainlogin page with confirmation msg
    /// Location(userPanel && adminPanel)
}
else{
    echo "nie ma posta";
}