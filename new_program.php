<html>
<head><meta charset="utf-8">
	<title> Добавление новой программы </title> </head>
<body>
<H2>Регистрация на сайте:</H2>
<form action="save_new.php" metod="get">
 Имя: <input name="name_program" size="50" type="text">
<br>ID Языка
<?php
  // Подключение к базе данных MySQL.
 $link = mysqli_connect("localhost","f0470399_programlanguage","BEpBd03x");

 mysqli_select_db($link,"f0470399_programlanguage") or die("Нет такой таблицы!");
 ?>
 <?
// Делаем выборку из таблицы.
 $result=mysqli_query($link, "SELECT iq_language, name_language FROM `language`");

echo "<select name ='iq_language' >";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['0'] ."'>" . $row['0'] ." - ".$row['1']."</option>";
}
echo "</select>";
?>
<br>ID Разработчика
<?
$result1=mysqli_query($link, "SELECT iq_creator, name_creator FROM `creator`");
echo "<select name ='iq_creator' >";
while ($row = mysqli_fetch_array($result1)) {
    echo "<option value='" . $row['0'] ."'>" . $row['0'] ." - ".$row['1']."</option>";
}
echo "</select>";
  	?>
<br>Версия: <input name="version" size="50" type="text">
<br>Дата: <input name="data_create" size="8" type="date">
</textarea>
<input type='hidden' name='id_process' value='2'>
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="index.php"> Вернуться к списку  </a>
</body>
</html>
