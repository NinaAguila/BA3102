<?php
function generateApplicationNumber($firstName, $lastName) {
    $currentYear = date("Y");
    $randomDigits = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
    $firstInitial = substr($firstName, 0, 1);
    $lastInitial = substr($lastName, 0, 1);
    return $firstInitial . $lastInitial . $currentYear . $randomDigits;
}
?>