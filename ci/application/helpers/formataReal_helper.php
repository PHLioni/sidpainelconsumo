<?php

function numeroEmReais($numero){
    return "R$ " . number_format($numero, 2, ",", ".");
}

function numAderencia($num){
    return number_format($num, 2);
}

function numDDD($num){
    return strval(number_format($num, 2));
}

function numNormal($num){
    return number_format($num,0, ",", ".");
}

?>