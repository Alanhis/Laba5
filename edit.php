<html>
<head> <title> Редактирование данных о языке </title> </head>
<body>
<?php
 $link=mysqli_connect("localhost","f0470399_programlanguage","BEpBd03x");
mysqli_query( $link,'set names utf8');
 mysqli_select_db($link,"f0470399_programlanguage") or die("Нет такой таблицы!");
 $rows=mysqli_query($link,"SELECT name_language , type_language , data_language , typeworking_language , Author FROM language");
 while ($st = mysqli_fetch_array($rows)) {
$id_lan=$_GET['id_lan'];
 $name = $st['name_language'];
 $login = $st['type_language'];
 $password = $st['data_language'];
 $e_mail = $st['typeworking_language'];
 $info = $st['Author'];
 }
print "<form action='save_edit.php' metod='get'>";
print "Имя: <input name='name_language' size='50' type='text'
value='".$name."'>";
echo"<br>Тип:";

echo "<select name ='type_language' >";
	echo "<option value='Interpreted '>Интерпретируемый </option>";
	echo "<option value='Compiled '>Компилируемый </option>";
echo "</select>";

print "<br>Дата создания: <input name='data_language' size='20' type='text'
value='".$password."'>";
echo"<br>Тип работы:";
echo "<select name ='typeworking_language' >";
	echo "<option value='Server '>Cерверный </option>";
	echo "<option value='Client'>Клиентский </option>";
echo "</select>";
print "<br>Создатель: <input name='Author' size='30' type='text'
value='".$info."'>";
print "<input type='hidden' name='id_lan' value='".$id_lan."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "<input type='hidden' name='id_process' value='1'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку пользователей </a>";
?>
</body>
</html>