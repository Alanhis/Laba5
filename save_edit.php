
<?php
$link=mysqli_connect("localhost", "f0470399_programlanguage","BEpBd03x");
 mysqli_select_db($link,"f0470399_programlanguage") or die("Нет такой таблицы!");
 if ($_GET[id_process]==1){
 $zapros=("UPDATE `language` SET `name_language`='".$_GET['name_language']. "', `type_language`='".$_GET['type_language']."', `data_language`='".$_GET['data_language']."', `typeworking_language`='".$_GET['typeworking_language']. "', `Author`='".$_GET['Author']."' WHERE iq_language=".$_GET['id_lan']);
 mysqli_query($link,$zapros);
}
if ($_GET[id_process]==2){
  $zapros=("UPDATE `program` SET `iq_language`='".$_GET['iq_language']. "', `iq_creator`='".$_GET['iq_creator']."', `data_create`='".$_GET['data_create']."', `version`='".$_GET['version']. "', `name_program`='".$_GET['name_program']."' WHERE 	iq=".$_GET['iq']);
 mysqli_query($link,$zapros);
}
if ($_GET[id_process]==3){
  $zapros=("UPDATE `creator` SET `iq_creator`='".$_GET['iq_creator']. "', `name_creator`='".$_GET['name_creator']."', `city_creator`='".$_GET['city_creator']."' WHERE iq_creator=".$_GET['iq_creator']);
 mysqli_query($link,$zapros);
}
 if (mysqli_affected_rows($link)>0) {
 echo 'Все сохранено. <a href="index.php"> Вернуться к спискам </a>'; }
 else { echo 'Ошибка сохранения. <a href="index.php"> Вернуться к спискам</a> '; }
?>
