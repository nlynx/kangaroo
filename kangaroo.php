<DOCTYPE HTML>
<html>
<head> 
<meta charset="UTF-8">
<title>ТЗ (форма)</title>
<style>
/*стили можно вынести в отдельный файл*/
html, body {
    margin: 0;
    padding: 0;
}
html {
    background-color: darkseagreen;
}
body {
    background-color: lightgray;
    width: 960px;
    margin: 30px auto 0;
    padding: 10px; 
}

p {
    padding: 10px 0px 10px 0px;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 16px;
}
form {
    width: 800px;
    margin: 10px auto 30px;
}
.error {
    color: red;
}
#box2 {
    clear: both;
}
#box3 {
    height: 100px;
}
</style>
<body>
<?php
session_start();

// фильтрация вводных данных
function test_input($data) {
  $data = trim($data); // Удаляет пробелы (или другие символы) из начала и конца строки
  $data = stripslashes($data); // Удаляет экранирование символов
  $data = htmlspecialchars($data); // Преобразует специальные символы в HTML-сущности
  return $data;
}


function check_number_positive ($var) {
 if (isset($var) && $var!=='') {  
     return false;
 } else {
     return true;
 }
}

$first_place = $second_place = $first_speed = $second_speed = $steps = "";
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
  if (check_number_positive($_POST["first_place"])) {
    $errors['first_place'] = "Введите корректные данные";
  } else {
    $first_place = test_input($_POST["first_place"]);
  }
  if (check_number_positive($_POST["second_place"])) {
    $errors['second_place'] = "Введите корректные данные";
  } else {
    $second_place = test_input($_POST["second_place"]);
  }
  if (check_number_positive($_POST["first_speed"])) {
    $errors['first_speed'] = "Введите корректные данные";
  } else {
    $first_speed = test_input($_POST["first_speed"]);
  }
  if (check_number_positive($_POST["second_speed"])) {
    $errors['second_speed'] = "Введите корректные данные";
  } else {
    $second_speed = test_input($_POST["second_speed"]);
  }
  if (check_number_positive($_POST["steps"])) {
    $errors['steps'] = "Введите корректные данные";
  } else {
    $steps = test_input($_POST["steps"]);
  }

$x1 = $first_place;
$x2 = $second_place;
$v1 = $first_speed;
$v2 = $second_speed;
$p1 = $p2 = $steps; 

     
if($x1<=$x2 && $p2>0 && $p1>0 ) {

    if (($x1<$x2) && ($v1<$v2)){
        $response = "вариант 1: Нет, пути не совпадут" . "<br><br>";
        } 
    
    if (($x1<$x2) && ($v1==$v2)) {
       $response = "вариант 2: Нет, пути не совпадут" . "<br><br>";
        }

    if (($x1<$x2) && ($v1>$v2)) {
       $response = "вариант 3: Вероятно, пути совпадут" . "<br><br>"; // пути cовпадут
        }

    if (($x1==$x2) && ($v1<$v2)) {
       $response = "вариант 4: Нет, пути не совпадут" . "<br><br>";
        }

    if (($x1==$x2) && ($v1==$v2)) {
       $response = "вариант 5: Да, пути совпадут" . "<br><br>"; // пути cовпадут
        }

    if (($x1==$x2) && ($v1>$v2)) {
       $response = "вариант 6: Нет, пути не совпадут" . "<br><br>";
    }

} else {
    $response = "не соответствует условиям задачи" . "<br><br>";
}

$_SESSION['resp1'] = $response;
}

?>
<!-- html форма -->
<br><b> Задача: </b> <br>
Два кенгуру прыгают в одном направлении.<br>
Место старта первого кенгуру не может быть дальше, чем место старта второго кенгуру.<br>
Скорость обоих кенгуру может быть как различной, так и равной.<br>
<br>
Возможен ли вариант, что оба кенгуру "приземлятся" в одном и том же месте 
за равное количество прыжков по ходу своего движения <br>
(то есть их пути должны совпасть в одной точке хотя бы один раз). 

<br><br>
<form name="contact_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<p><b>Введите, пожалуйста, данные:</b></p>
<div class = "mainBox">

    <label >Место старта первого кенгуру:</label>
    <input id="input1" type="text" size="10" name="first_place" value= "<?php echo $first_place ?>" >
    <span class="error">* <?php if(isset($errors['first_place'])) { echo  $errors['first_place']; }?></span>
    <br>
  
    <label>Место старта второго кенгуру:</label>
    <input id="input2" type="text" size="10" name="second_place" value= "<?php echo $second_place ?>" >
    <span class="error">* <?php if(isset($errors['second_place'])) { echo $errors['second_place']; }?></span>
    <br><br>

    <label>Скорость первого кенгуру:</label>
    <input id="input3" type="text" size="10" name="first_speed" value= "<?php echo $first_speed ?>" >
    <span class="error">* <?php if(isset($errors['first_speed'])) { echo $errors['first_speed']; }?></span>
    <br>
 
    <label>Скорость второго кенгуру:</label>
    <input id="input4" type="text" size="10" name="second_speed" value= "<?php echo $second_speed ?>" >
    <span class="error">* <?php if(isset($errors['second_speed'])) { echo $errors['second_speed']; }?></span>
    <br><br>
  
    <label>Количество шагов:</label>
    <input id="input5" type="text" size="10" name="steps" value= "<?php echo $steps ?>" >
    <span class="error">* <?php if(isset($errors['steps'])) { echo $errors['steps']; }?></span>
    <br><br>
  
</div> <!-- конец mainBox -->

<div id = "box2">
<br>  
  <input type="submit" name="submit" value="Ответ">  
</div>  

<br><br><span class="error">* Поля, обязательные для заполнения</span><br><br>

<div id = "box3">
<b>Ответ:</b> <br>
<?php if (isset($_SESSION['resp1'])) { echo $_SESSION['resp1']; $_SESSION['resp1'] = ''; } ?>

</div>
</form>

</body>
</html>