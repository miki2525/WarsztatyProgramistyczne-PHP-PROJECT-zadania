<?php
if(isset($_POST)){
    print_r($_POST);
    /////// Wyczytać wydawce karty na podstawie numeru
    /////check if not exist persist to db, set cookie(registered) return to main page with message
}
else{
    echo "nie ma posta";
    /////setcoockie(registered ,failed!) return to registration with msg failuer
}
