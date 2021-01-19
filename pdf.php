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
$pdf->Table($link,"SELECT program.iq,program.name_program,DATE_FORMAT(data_create, '%d.%m.%Y') AS data_create,creator.name_creator,creator.city_creator,language.name_language,language.type_language,language.typeworking_language from program JOIN language ON program.iq_language=language.iq_language JOIN creator on program.iq_creator=creator.iq_creator
");
$pdf->AddPage();
// Second table: specify 3 columns

$pdf->Output();
?>
