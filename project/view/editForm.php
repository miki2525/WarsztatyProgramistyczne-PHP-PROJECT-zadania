<?php
session_start();
if(isset($_POST) && isset($_SESSION["login"])){
    print_r($_POST);

    /////check if not exist  persist to db, setcookie(updated!) return to mainlogin page with confirmation msg
    /// Location(userPanel)
}
else{
    echo "nie ma posta";
}