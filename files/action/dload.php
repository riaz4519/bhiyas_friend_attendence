<?php

require 'vendor/autoload.php';
require 'Connection.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


$course_id = $_GET['course_id'];
$semester_id = $_GET['semester_id'];
$teacher_id = $_GET['teacher_id'];
$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];



$query = "select * from attendance_taken where semester_id = '$semester_id' and course_id = '$course_id' and teacher_id = '$teacher_id' and  date between '$start_date' and '$end_date'";
$connection = new Connection();

$data = $connection->connect()->query($query);


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValueByColumnAndRow(1,1,'Student Name');
$sheet->setCellValueByColumnAndRow(2,1,'Student ID');

for ($i = 3; $i<$data->num_rows +3;$i++){
    $sheet->setCellValueByColumnAndRow($i,1,$data->fetch_object()->date);

}

//select all the student

$select_student = "select student.id as id ,student.name as name ,student.student_id from student join course_student on student.id = course_student.student_id where course_id = '$course_id' and semester_id='$semester_id'and teacher_id = '$teacher_id'";

$select_student_data = $connection->connect()->query($select_student);

for ($i = 2;$i<=$select_student_data->num_rows + 1; $i++){

    $single_student = $select_student_data->fetch_object();
    $student_name = $single_student->name;
    $student_id = $single_student->student_id;

    //primary id
    $primary_id = $single_student->id;
    $sheet->setCellValueByColumnAndRow(1,$i,$single_student->name);
    $sheet->setCellValueByColumnAndRow(2,$i,$single_student->student_id);

    for ($col = 3 ; $col < $data->num_rows + 3;$col++){

        $date_from_sheet = $sheet->getCellByColumnAndRow($col,1);

        $query_present_absent = "select present from attendance where course_id = '$course_id' and semester_id = '$semester_id' and teacher_id ='$teacher_id' and student_id = '$primary_id'  and date='$date_from_sheet' limit 1";

        $absent_result = $connection->connect()->query($query_present_absent);

        $sheet->setCellValueByColumnAndRow($col,$i,$absent_result->fetch_object()->present);

    }

}


$filename = 'sample-'.time().'.xlsx';
// Redirect output to a client's web browser (Xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header('Pragma: public'); // HTTP/1.
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

?>