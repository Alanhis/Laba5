<html>
<head> <title> Редактирование данных о языке </title> </head>
<body>
<?php
 $link=mysqli_connect("localhost","f0470399_programlanguage","BEpBd03x");
mysqli_query( $link,'set names utf8');
 mysqli_select_db($link,"f0470399_programlanguage") or die("Нет такой таблицы!");
 $rows=mysqli_query($link,"SELECT iq_creator , name_creator , city_creator  FROM creator WHERE iq_creator =".$_GET['iq_creator']." ");
 while ($st = mysqli_fetch_array($rows)) {
$iq_creator=$_GET['iq_creator'];

 $login = $st['name_creator'];
 $password = $st['city_creator'];

 }
print "<form action='save_edit.php' metod='get'>";

print "<br>Имя: <input name='name_creator' size='40' type='text'
value='".$login."'>";
print "<br>Город: <input name='city_creator' size='40' type='text'
value='".$password."'>";

print "<input type='hidden' name='iq_creator' value='".$iq_creator."'> <br>";
print "<input type='hidden' name='id_process' value='3'>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку пользователей </a>";
?>
</body>
</html>
