<?php
// if (!empty($_POST['$groupData'])) {

include('../../lib/conn.php');

require '../../../PHP5/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
// $sheet->setCellValue('A1', 'Hello World !');

// $writer = new Xlsx($spreadsheet);
// $writer->save('hello world.xlsx');



//设置标题行
$sheet->setTitle('成品入库名细表');
//设置表头
$sheet->setCellValueByColumnAndRow(1, 1, '成品入库名细表');
$sheet->setCellValueByColumnAndRow(1, 2,'商品ID');
$sheet->setCellValueByColumnAndRow(2, 2, '商品编码');
$sheet->setCellValueByColumnAndRow(3, 2, '产品型号');
$sheet->setCellValueByColumnAndRow(4, 2, '花纹');
$sheet->setCellValueByColumnAndRow(5, 2, '规格');
$sheet->setCellValueByColumnAndRow(6, 2, '条形码');
$sheet->setCellValueByColumnAndRow(7, 2, '废品日期');
$sheet->setCellValueByColumnAndRow(8, 2, '生产日期');
$sheet->setCellValueByColumnAndRow(9, 2, '胶号');

//合并单元格
$sheet->mergeCells('A1:I1');

$styleArray = [
    'font' => [
        'bold' => true
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
];
//设置单元格样式
$sheet->getStyle('A1')->applyFromArray($styleArray)->getFont()->setSize(28);

$sheet->getStyle('A2:I2')->applyFromArray($styleArray)->getFont()->setSize(14);
$spreadsheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
    //读取SESSION传递的数据
    session_start(); 
    $groupData=($_SESSION['dcode']);

 //读取数据
    mysqli_select_db( $conn, 'lplt' );
    if (strlen((end($groupData)))==0) {
  //该操作为删除数组最后一项
 $result=array_pop($groupData);
 }
    $sql = "SELECT id,ordernum,model,figure,tp,code,pd,date,glue FROM cpk where code in (" . implode(',', $groupData) . ")";    
    $retval = mysqli_query( $conn, $sql );
    $row =mysqli_fetch_all($retval,MYSQLI_ASSOC); 
    $len = count($row);
    $j = 0;
    for ($i=0; $i < $len; $i++) { 
        $j = $i + 3;
        $sheet->setCellValueByColumnAndRow(1, $j, $row[$i]['id']);
        $sheet->setCellValueByColumnAndRow(2, $j, $row[$i]['ordernum']);
        $sheet->setCellValueByColumnAndRow(3, $j, $row[$i]['model']);
        $sheet->setCellValueByColumnAndRow(4, $j, $row[$i]['figure']);
        $sheet->setCellValueByColumnAndRow(5, $j, $row[$i]['tp'] );
        $sheet->setCellValueByColumnAndRow(6, $j, $row[$i]['code'] );
        $sheet->setCellValueByColumnAndRow(7, $j, $row[$i]['pd'] );
        $sheet->setCellValueByColumnAndRow(8, $j, $row[$i]['date'] );
        $sheet->setCellValueByColumnAndRow(9, $j, $row[$i]['glue'] );

    } 

    $styleArrayBody = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                'color' => ['argb' => '666666'],
            ],
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
    ];
    $total_rows = $len + 2;
    //添加所有边框/居中
    $sheet->getStyle('A1:I'.$total_rows)->applyFromArray($styleArrayBody);


// 下载   
$filename = '成品入库明细表.xlsx';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'. date("Y-m-d h:i:sa").$filename.'"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');



unset($_SESSION['dcode']);
?>

