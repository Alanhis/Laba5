<html>
<head><meta charset="utf-8">
	<title> Добавление нового языка </title> </head>
<body>
<H2>Регистрация на сайте:</H2>
<form action="save_new.php" metod="get">
 Имя: <input name="name_language" size="50" type="text">
<br>Тип:
<?
echo "<select name ='type_language' >";
	echo "<option value='Interpreted '>Интерпретируемый </option>";
	echo "<option value='Compiled '>Компилируемый </option>";
echo "</select>";
?>
<br>Дата: <input name="data_language" size="8" type="date">
<br>Тип работы:
<?
echo "<select name ='typeworking_language' >";
	echo "<option value='Server '>Cерверный </option>";
	echo "<option value='Client'>Клиентский </option>";
echo "</select>";
?>
<br>Автор: <input name="Author" size="65" type="text">
</textarea>
<input type='hidden' name='id_process' value='1'>
<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="index.php"> Вернуться к списку языков </a>
</body>
</html>
