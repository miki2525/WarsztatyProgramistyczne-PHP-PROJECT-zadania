<?php
if(isset($_POST)){
    print_r($_POST);

    /////check if not exist persist to db, set cookie(registered) return to main page with message
}
else{
    echo "nie ma posta";
    /////setcoockie(registered ,failed!) return to registration with msg failuer
}
