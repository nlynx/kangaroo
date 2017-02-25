<?php

$x1 = 0; // задается стартовая позиция кенгуру №1
$x2 = 3; // задается стартовая позиция кенгуру №2
$v1 = 2; // задается скорость кенгуру №1 (размер шага)
$v2 = 1; // задается скорость кенгуру №2 (размер шага)
$result; 

$arr = array ($x1,$x2,$v1,$v2);

function check_number($arr)  {
    $errors = array();
    foreach ($arr as $var) {
        if (!is_int($var)) {
        $errors[] = $var;
        } 
    } 

    if(count(array_filter($errors)) !== 0) {
        foreach($errors as $value) {
            echo $value . "  должно быть целым числом" .  "<br>";
        } return FALSE;
        } else { 
          return TRUE; 
    }
}
 
if(check_number($arr) == FALSE) {
    exit;
}

    if($v1<1) {
        echo "Скорость кенгуру №1 не должна быть меньше 1";
        exit;
    } elseif(!is_int($v1)) {
        echo "Скорость кенгуру №1 должна быть целым числом";
        exit;
    } 
    
  
    if($v2<1) {
        echo "Скорость кенгуру №2 не должна быть меньше 1";
        exit;
    } elseif(!is_int($v2)) {
        echo "Скорость кенгуру №2 должна быть целым числом";
        exit;
    } 
    
for ($i = 0;$i<=10000;$i++){

    $x1 = $x1 + $v1;
    $x2 = $x2 + $v2;
     
    if($x1==$x2) {
        $result = TRUE;
        break;
    } else {
        $result = FALSE;  
    }

}

if ($result == TRUE) {
    print "Да, пути совпадут на " . $i . " прыжке на " . $x1 . " позиции." ;
} else {
    print "Нет, пути не совпадут.";
}
?>
