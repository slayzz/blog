<?php
$array = array('wea re champ', '12', 'wins');
$man = array_map(function ($param) {
    return $param;
}, $array);
print_r($man);
/*
#34495E
#3498DB
#ECF0F1
#F1C40F*/


?>
