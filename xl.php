<?php
function mysqli_field_name($result, $field_offset)
{
    $properties = mysqli_fetch_field_direct($result, $field_offset);
    return is_object($properties) ? $properties->name : null;
}
/*******EDIT LINES 3-8*******/
$DB_Server = "localhost"; //MySQL Server
$DB_Username = "f0470399_programlanguage"; //MySQL Username
$DB_Password = "BEpBd03x";             //MySQL Password
$DB_DBName = "f0470399_programlanguage";         //MySQL Database Name
//MySQL Table Name
$filename = "Hismatullin_nakonets";         //File Name
/*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/
//create MySQL connection
$sql = "SELECT program.iq,program.name_program,DATE_FORMAT(data_create, '%d.%m.%Y') AS data_create,creator.name_creator,creator.city_creator,language.name_language,language.type_language,language.typeworking_language from program JOIN language ON program.iq_language=language.iq_language JOIN creator on program.iq_creator=creator.iq_creator
";
$Connect = @mysqli_connect($DB_Server, $DB_Username, $DB_Password) or die("Couldn't connect to MySQL:<br>" . mysqli_error($Connect ) . "<br>" . mysqli_errno($Connect ));
mysqli_set_charset($Connect,"windows-1251");//select database
$Db = @mysqli_select_db( $Connect,$DB_DBName) or die("Couldn't select database:<br>" . mysqli_error($Connect ). "<br>" . mysqli_errno($Connect ));

//execute query
$result = @mysqli_query($Connect,$sql) or die("Couldn't execute query:<br>" . mysqli_error($Connect ). "<br>" . mysqli_errno($Connect ));
 require_once 'PHPExcel/Classes/PHPExcel.php';

$objPHPExcel = new PHPExcel();
// Set the active Excel worksheet to sheet 0
$objPHPExcel->setActiveSheetIndex(0);
// Initialise the Excel row number
$rowCount = 1;
// Iterate through each result from the SQL query in turn
// We fetch each database result row into $row in turn
$objPHPExcel->getActiveSheet()->SetCellValue('A1',"ID");
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'name_program');
$objPHPExcel->getActiveSheet()->SetCellValue('C1','data_create');
$objPHPExcel->getActiveSheet()->SetCellValue('D1','name_creator');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'city_creator');
$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'type_language');
$objPHPExcel->getActiveSheet()->SetCellValue('G1','typeworking_language');
$objPHPExcel->getActiveSheet()->SetCellValue('H1','name_language');
while($row = mysqli_fetch_array($result)){
    // Set cell An to the "name" column from the database (assuming you have a column called name)
    //    where n is the Excel row number (ie cell A1 in the first row)
    $objPHPExcel->getActiveSheet()->SetCellValue('A'.($rowCount+1), $row['iq']);
    // Set cell Bn to the "age" column from the database (assuming you have a column called age)
    //    where n is the Excel row number (ie cell A1 in the first row)
 $objPHPExcel->getActiveSheet()->SetCellValue('B'.($rowCount+1), $row['name_program']);
    $objPHPExcel->getActiveSheet()->SetCellValue('C'.($rowCount+1), date("d.m.Y", strtotime($row['data_create'])));
    $objPHPExcel->getActiveSheet()->SetCellValue('D'.($rowCount+1), $row['name_creator']);
    $objPHPExcel->getActiveSheet()->SetCellValue('E'.($rowCount+1), $row['city_creator']);
    $objPHPExcel->getActiveSheet()->SetCellValue('F'.($rowCount+1), $row['type_language']);
    $objPHPExcel->getActiveSheet()->SetCellValue('G'.($rowCount+1), $row['typeworking_language']);
    $objPHPExcel->getActiveSheet()->SetCellValue('H'.($rowCount+1), $row['name_language']);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
    // Increment the Excel row counter
    $rowCount++;
}


// Instantiate a Writer to create an OfficeOpenXML Excel .xlsx file
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
// Write the Excel file to filename some_excel_file.xlsx in the current directory
// We'll be outputting an excel file
header('Content-type: application/vnd.ms-excel');

// It will be called file.xls
header('Content-Disposition: attachment; filename="Hismatullin_nakonets.xls"');

// Write file to the browser
$objWriter->save('php://output');
?>
