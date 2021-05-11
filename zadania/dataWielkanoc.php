<?php
if (isset($_POST['year'])) {
    if (is_numeric($_POST['year'])) {
        if ($_POST['year'] >= 1 && $_POST['year'] <= 2199) {
            $year = $_POST['year'];
            $x = 0;
            $y = 0;

            if ($year >= 1 && $year <= 1582) {
                $x = 15;
                $y = 6;
            }
            if ($year >= 1583 && $year <= 1699) {
                $x = 22;
                $y = 2;
            }
            if ($year >= 1700 && $year <= 1799) {
                $x = 23;
                $y = 3;
            }
            if ($year >= 1800 && $year <= 1899) {
                $x = 23;
                $y = 4;
            }
            if ($year >= 1900 && $year <= 2099) {
                $x = 24;
                $y = 5;
            }
            if ($year >= 2100 && $year <= 2199) {
                $x = 24;
                $y = 6;
            }

            $a = $year % 19;
            $b = $year % 4;
            $c = $year % 7;
            $d = (19 * $a + $x) % 30;
            $f = (2 * $b + 4 * $c + 6 * $d + $y) % 7;

            if ($f == 6 && $d == 29) {
                echo "Wielkanoc jest 26 kwietnia";
                return;
            }
            if ($f == 6 && $d == 28 && ((11 * $x + 11) % 30 < 19)) {
                echo "Wielkanoc jest 18 kwietnia";
                return;
            }
            if (($f + $d) < 10) {
                echo "Wielkanoc jest " . 22 + $d + $f . " marca";
                return;
            }
            if ($f + $d > 9) {
                echo "Wielkanoc jest " . ($d + $f - 9) . " kwietnia";
                return;
            }

        }

        }

    }
            echo "Nieprawidowy rok";
            return;
?>
