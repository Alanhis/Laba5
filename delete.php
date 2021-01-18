<?php
 $connect=mysqli_connect("localhost", "f0470399_programlanguage","BEpBd03x");
 mysqli_select_db($connect,"f0470399_programlanguage") or die("Нет такой таблицы!");
 $zapros="DELETE FROM language WHERE iq_language=" .$_GET['id_lan'];
  $zapros2="DELETE FROM creator WHERE iq_creator=" .$_GET['iq_creator'];
   $zapros3="DELETE FROM program WHERE iq=" .$_GET['iq'];
 mysqli_query($connect,$zapros);
 mysqli_query($connect,$zapros2);
 mysqli_query($connect,$zapros3);
 header("Location: index.php");
 exit;