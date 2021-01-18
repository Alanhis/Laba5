<?php
require('mysql_table.php');


class PDF extends PDF_MySQL_Table
{
function Header()
{
    // Title

    $this->Cell(0,6,'Хисматуллин Алан',0,1,'C');
    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}
}

// Connect to database
$link = mysqli_connect('localhost','f0470399_programlanguage','BEpBd03x','f0470399_programlanguage');

$pdf = new PDF();
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);
$pdf->AddPage();

// First table: output all columns
$pdf->Table($link,"SELECT iq,name_program,DATE_FORMAT(data_create, '%d.%m.%Y') AS data_create,name_creator,city_creator,type_language,typeworking_language FROM program  , creator  , language  WHERE 1");
$pdf->AddPage();
// Second table: specify 3 columns

$pdf->Output();
?>