<html>
<head> <title> Редактирование данных о языке </title> </head>
<body>
<?php
 $link=mysqli_connect("localhost","f0470399_programlanguage","BEpBd03x");
mysqli_query( $link,'set names utf8');
 mysqli_select_db($link,"f0470399_programlanguage") or die("Нет такой таблицы!");
 $rows=mysqli_query($link,"SELECT iq_language , iq_creator , data_create , 	version , name_program FROM program WHERE id =".$_GET['id']." ");
 while ($st = mysqli_fetch_array($rows)) {
$id=$_GET['id'];
 $name = $st['iq_language'];
 $login = $st['iq_creator'];
 $password = $st['data_create'];
 $e_mail = $st['version'];
 $info = $st['name_program'];
 }
print "<form action='save_edit.php' metod='get'>";
print "Название языка(ID языка) ";
$result=mysqli_query($link, "SELECT iq_language, name_language FROM `language`");

echo "<select name ='iq_language' >";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['0'] ."'>" . $row['1'] ." ( ".$row['0']." ) "."</option>";
}
echo "</select>";
print "<br>ID Разработчика ";
$result1=mysqli_query($link, "SELECT iq_creator, name_creator FROM `creator`");
echo "<select name ='iq_creator' >";
while ($row = mysqli_fetch_array($result1)) {
    echo "<option value='" . $row['0'] ."'>" . $row['0'] ." - ".$row['1']."</option>";
}
echo "</select>";
print "<br>Дата создания: <input name='data_create' size='20' type='text'
value='".$password."'>";
print "<br>Версия: <input name='version' size='30' type='text'
value='".$e_mail."'>";
print "<br>Название программы: <input name='name_program' size='30' type='text'
value='".$info."'>";
print "<input type='hidden' name='iq' value='".$id."'> <br>";
print "<input type='hidden' name='id_process' value='2'>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку пользователей </a>";
?>
</body>
</html>
