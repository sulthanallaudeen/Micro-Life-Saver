<?php

require '../vendor/autoload.php';

// $inputFileName = 'hello world.xlsx';
// $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
// $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
// $spreadsheet = $reader->load($inputFileName);
// $data = $spreadsheet->getActiveSheet()->toArray();

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Ods();
$spreadsheet = $reader->load("hello world.ods");
$data = $spreadsheet->getActiveSheet()->toArray();

$row = $data;

$html = '<table border=1>';
foreach( $row as $coloumn )
{               
    $html.= '<tr">';
    foreach( $coloumn as $cell )
    {
        $html.= '<td>' . $cell . '</td>';
    }
    $html.= '</tr>';
}
$html  .= "</table>";
echo $html;