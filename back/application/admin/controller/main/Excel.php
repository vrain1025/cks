<?php

namespace app\admin\controller;
use app\common\controller\Backend;


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel {
public function outdata($name=[], $data=[], $head=[], $keys=[]){

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
// $sheet->setCellValue('A1', 'Hello World !');

// $writer = new Xlsx($spreadsheet);
// $writer->save('hello world.xlsx');



//设置标题行
$sheet->setTitle($head);
//设置表头
$sheet->setCellValueByColumnAndRow(1, 1, $head);

for ($i=1; $i <count($keys); $i++) { 
    # code...

$sheet->setCellValueByColumnAndRow($i, 2,$keys[$i]);

}
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
  
    $row =$data;
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
$filename = "$name .xlsx";
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'. date("Y-m-d h:i:sa").$filename.'"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');






}

}



