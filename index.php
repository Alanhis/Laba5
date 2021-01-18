<html>
<head> <title> Сведения о записанных языках </title> </head>
<body>
<?php

 $link = mysqli_connect("localhost", "f0470399_programlanguage","BEpBd03x");

 // установление соединения с сервером
 // тип кодировки
 // подключение к базе данных:
 mysqli_select_db($link,"f0470399_programlanguage") or die("Нет такой таблицы!");


?>
<h2>Записанные языки:</h2>
<table border="1">
<tr> // вывод «шапки» таблицы
 <th> Имя </th> <th> Тип </th>
 <th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result1=mysqli_query($link, "SELECT iq_language, name_language,type_language FROM language"); // запрос на выборку сведений о пользователях
while ($row=mysqli_fetch_array($result1)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row['name_language'] . "</td>";
 echo "<td>" . $row['type_language'] . "</td>";
 echo "<td><a href='edit.php?id_lan=" . $row['iq_language']
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "<td><a href='delete.php?id_lan=" . $row['iq_language']
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result1); // число записей в таблице БД
print("<P>Записанных языков: $num_rows </p>");
?>

<p> <a href="new.php"> Добавить язык </a>

<h2>Записанные разработчики:</h2>
<table border="1">
<tr> // вывод «шапки» таблицы
 <th> Имя разработчика </th> <th> Город </th>
 <th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result2=mysqli_query($link, "SELECT iq_creator, name_creator,city_creator FROM creator"); // запрос на выборку сведений о пользователях
while ($row=mysqli_fetch_array($result2)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row['name_creator'] . "</td>";
 echo "<td>" . $row['city_creator'] . "</td>";
 echo "<td><a href='edit_creator.php?iq_creator=" . $row['iq_creator']
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "<td><a href='delete.php?iq_creator=" . $row['iq_creator']
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result2); // число записей в таблице БД
print("<P>Записанных разработчики: $num_rows </p>");
?>
<p> <a href="new_creator.html"> Добавить разработчика </a>
<h2>Записанные приложения:</h2>
<table border="1">
<tr> // вывод «шапки» таблицы
  <th> Название приложения </th><th> Версия приложения </th> <th> Дата создания </th>
 <th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result3=mysqli_query($link, "SELECT iq, name_program,version,data_create FROM program"); // запрос на выборку сведений о пользователях
while ($row=mysqli_fetch_array($result3)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row['name_program'] . "</td>";
 echo "<td>" . $row['version'] . "</td>";
 echo "<td>" . date("d.m.Y", strtotime($row['data_create'])) . "</td>";
 echo "<td><a href='edit_program.php?id=" . $row['iq']
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "<td><a href='delete.php?iq=" . $row['iq']
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result3); // число записей в таблице БД
print("<P>Записанных Приложения: $num_rows </p>");
?>
<p> <a href="new_program.php"> Добавить приложение </a>
<p> <a href="pdf.php"> Создать pdf  </a>
<p> <a href="xl.php"> Создать xls  </a>
</body> </html>
