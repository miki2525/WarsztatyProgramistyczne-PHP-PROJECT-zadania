<?php

$daysToGo = date("l") ? 366 - date("z") +1 : 365 - date("z") + 1;
echo "Do końca roku pozostało " .$daysToGo. " dni.\n";

?>