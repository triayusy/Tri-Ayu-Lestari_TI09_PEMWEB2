<?php 
function sum($a) {
    $hasil = 0;
    foreach ($a as $key => $value) {
        $hasil += $value;
    }
    echo $hasil;
}
sum([1,2,3,4,5,6,7,8,9,10]);