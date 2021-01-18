<?php
 // Подключение к базе данных:
 $link = mysqli_connect("localhost", "f0470399_programlanguage","BEpBd03x");
 mysqli_select_db($link,"f0470399_programlanguage") or die("Нет такой таблицы!");
 // Строка запроса на добавление записи в таблицу:
 if ($_GET[id_process]==1){
 	 $sql_add = "INSERT INTO language SET name_language='" . $_GET['name_language']."', type_language='".$_GET['type_language']."', data_language='".$_GET['data_language']."', typeworking_language='".$_GET['typeworking_language']."', Author='".$_GET['Author']. "'";
 	  mysqli_query($link,$sql_add);
 }
 if($_GET[id_process]==2){
 	 $sql_add1 = "INSERT INTO program SET name_program='" . $_GET['name_program']."', iq_language='".$_GET['iq_language']."', iq_creator='".$_GET['iq_creator']."', version='".$_GET['version']."', data_create='".$_GET['data_create']. "'";
 	 mysqli_query($link,$sql_add1);
 }
 if ($_GET[id_process]==3) {
 	$sql_add2 = "INSERT INTO creator SET name_creator='" . $_GET['name_creator']."', city_creator='".$_GET['city_creator']. "'";
 	 mysqli_query($link,$sql_add2);
 }






  // Выполнение запроса
 if (mysqli_affected_rows($link)>0) // если нет ошибок при выполнении запроса
 { print "<p>Спасибо, вы добавили данные  в базу данных.";
 print "<p><a href=\"index.php\"> Вернуться к спискам</a>"; }
 else { print "Ошибка сохранения. <a href=\"index.php\">
Вернуться к спискам </a>"; }
?>