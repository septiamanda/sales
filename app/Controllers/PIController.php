<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSales;
use PHPUnit\Util\Json;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PIController extends BaseController
{
    protected $modelSales;
    public function __construct()
    {
        $this->modelSales = new ModelSales();
    }

    public function listPI(): string
    {
        $data['dataPI'] = $this->modelSales->getPI();
        return view('Pages/PI', $data);
    }

    public function tampilChartPI()
    {
        $tahun = $this->request->getVar('tahun');
        $dataChart = $this->modelSales->dataChartPI($tahun);
        $response = [
            'status' => true,
            'data' => $dataChart
        ];
        echo json_encode($response);
    }
    public function export()
    {
        $pi = $this->modelSales->where('status', 'PI')->findAll();
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A2', 'Data PI Telkom Witel Sumbar');
        $sheet->mergeCells('A2:J2'); 
        $sheet->getStyle('A2')->getFont()->setBold(true);
        $sheet->getStyle('A2')->getFont()->setSize(13); 
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER); 
        $sheet->getStyle('A2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER); 

        $sheet->setCellValue('A4', 'No');
        $sheet->setCellValue('B4', 'Tanggal Order');
        $sheet->setCellValue('C4', 'Tanggal Update');
        $sheet->setCellValue('D4', 'Nomor SC');
        $sheet->setCellValue('E4', 'Nama Pengguna');
        $sheet->setCellValue('F4', 'Alamat Instalasi');
        $sheet->setCellValue('G4', 'Datel');
        $sheet->setCellValue('H4', 'Sektor');
        $sheet->setCellValue('I4', 'STO');
        $sheet->setCellValue('J4', 'Status');

        $sheet->getStyle('A4:J4')->getFont()->setBold(true);
        $sheet->getStyle('A4:J4')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFACD');

       
        $column = 5;
        foreach ($pi as $key => $value) {
            $sheet->setCellValue('A'.$column, ($column-4));
            $sheet->setCellValue('B'.$column, $value['tanggal_order']); 
            $sheet->setCellValue('C'.$column, $value['tanggal_update']);
            $sheet->setCellValue('D'.$column, $value['noSC']);
            $sheet->setCellValue('E'.$column, $value['nama_pengguna']); 
            $sheet->setCellValue('F'.$column, $value['alamat_instl']); 
            $sheet->setCellValue('G'.$column, $value['datel']); 
            $sheet->setCellValue('H'.$column, $value['sektor']); 
            $sheet->setCellValue('I'.$column, $value['sto']); 
            $sheet->setCellValue('J'.$column, $value['status']); 
            $column++;
        }  
        
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ];
        $endRow = max($column, 4); 
        $sheet->getStyle('A4:J'.$endRow)->applyFromArray($styleArray);


        $sheet->getColumnDimension('A')->SetAutoSize(true);
        $sheet->getColumnDimension('B')->SetAutoSize(true);
        $sheet->getColumnDimension('C')->SetAutoSize(true);
        $sheet->getColumnDimension('D')->SetAutoSize(true);
        $sheet->getColumnDimension('E')->SetAutoSize(true);
        $sheet->getColumnDimension('F')->SetAutoSize(true);
        $sheet->getColumnDimension('G')->SetAutoSize(true);
        $sheet->getColumnDimension('H')->SetAutoSize(true);
        $sheet->getColumnDimension('I')->SetAutoSize(true);
        $sheet->getColumnDimension('J')->SetAutoSize(true);


        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=Data PI.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
            
    }
}
