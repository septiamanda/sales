<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSales;
use App\Models\SektorModel;
use App\Models\STOModel;
use App\Models\ModelDatel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class SalesController extends BaseController
{
    protected $modelSales;
    protected $modelSTO;
    protected $modelSektor;
    protected $modelDatel;

    public function __construct()
    {
        $this->modelSales = new ModelSales();
        $this->modelSTO = new STOModel();
        $this->modelSektor = new SektorModel();
        $this->modelDatel = new ModelDatel();
    }

    public function listSales(): string
    {
        $data['salesData'] = $this->modelSales->getSales();
        $data['sd'] = ['id_sales' => 0];

        $data['stos'] = $this->modelSTO->getformSTO();
        $data['sektors'] = $this->modelSektor->getformSektor();
        $data['datels'] = $this->modelDatel->getDatel();

        $date = $this->request->getGet('tanggal_order');

        if (!empty($date)) {
            $data = $this->modelSales->where('tanggal_order', $date)->findAll();
            return view('Pages/SALES', ['salesData' => $data]);
        }
        return view('Pages/SALES', $data);
    }

    public function simpanSales()
    {
        // var_dump($this->request->getPost()); // Check if form data is received

        $validationRules = [
            'inputNomorSC' => 'required',
            'namaPel' => 'required',
            'alamatInt' => 'required',
            'tanggal_sales' => 'required',
            'datelsales' => 'required',
            'sektorsales' => 'required',
            'stosales' => 'required',
            'status' => 'required'
        ];

        // Set custom error messages
        $validationMessages = [
            'inputNomorSC' => [
                'required' => 'Kolom Nomor SC harus diisi'
            ],
            'namaPel' => [
                'required' => 'Kolom Nama Pelanggan harus diisi'
            ],
            'alamatInt' => [
                'required' => 'Kolom Alamat Instalasi harus diisi'
            ],
            'tanggal_sales' => [
                'required' => 'Kolom Tanggal Order harus diisi'
            ],
            'datelsales' => [
                'required' => 'Kolom Datel harus diisi'
            ],
            'sektorsales' => [
                'required' => 'Kolom Sektor harus diisi'
            ],
            'stosales' => [
                'required' => 'Kolom STO harus diisi'
            ],
            'status' => [
                'required' => 'Kolom Status harus diisi'
            ]
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            // Simpan pesan-pesan kesalahan dalam session flashdata
            session()->setFlashdata('errors', $this->validator->getErrors());

            // Kembali ke halaman sebelumnya dengan data input yang dikirim
            return redirect()->back()->withInput();
        }

        $nosc = $this->request->getVar('inputNomorSC');
        $namapel = $this->request->getVar('namaPel');
        $almatint = $this->request->getVar('alamatInt');
        $tanggalder = $this->request->getVar('tanggal_sales');
        $datelles = $this->request->getVar('datelsales');
        $sektorles = $this->request->getVar('sektorsales');
        $stoles = $this->request->getVar('stosales');
        $status = $this->request->getVar('status');
        $id_sales = $this->request->getVar('id_sales');

        if ($status == 'RE') {
            $tanggal_order = $tanggalder;
            $tanggal_update = $tanggal_order;
        } else {
            $tanggal_order = $tanggalder;
            $tanggal_update = date('Y-m-d');
        }

        $data = [
            'id_sales' => $id_sales,
            'noSC' => $nosc,
            'nama_pengguna' => $namapel,
            'alamat_instl' => $almatint,
            'tanggal_order' => $tanggal_order,
            'tanggal_update' => $tanggal_update,
            'datel' => $datelles,
            'sektor' => $sektorles,
            'sto' => $stoles,
            'status' => $status
        ];

        $this->modelSales->save($data);

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan.');

        return redirect()->to('listSales');
    }

    public function editSales()
    {

        # code...
        $id = $this->request->getVar('id_sales');

        $nosc = $this->request->getVar('inputNomorSC');
        $namapel = $this->request->getVar('namaPel');
        $almatint = $this->request->getVar('alamatInt');
        $tanggalder = $this->request->getVar('tanggal_sales');
        $datelles = $this->request->getVar('datelsales');
        $sektorles = $this->request->getVar('sektorsales');
        $stoles = $this->request->getVar('stosales');
        // $status = $this->request->getVar('status');

        $data = [
            'id_sales' => $id,
            'noSC' => $nosc,
            'nama_pengguna' => $namapel,
            'alamat_instl' => $almatint,
            'tanggal_order' => $tanggalder,
            'datel' => $datelles,
            'sektor' => $sektorles,
            'sto' => $stoles,
            // 'status' => $status
        ];


        $successs = $this->modelSales->save($data);

        if ($successs) {
            session()->setFlashdata('success', 'Data Berhasil Diubah.');
            return redirect()->to('listSales');
        } else {
            session()->setFlashdata('gagal', 'Data tidak diubah');
            return redirect()->back()->withInput();
        }
    }

    public function deleteSales($id_sales)
    {

        $successs = $this->modelSales->deleteSales($id_sales);

        if ($successs) {
            session()->setFlashdata('success', 'Data Berhasil Dihapus.');
            return redirect()->to('listSales');
        } else {
            session()->setFlashdata('gagal', 'Terdapat kesalahan dalam penghapusan data');
            return redirect()->back()->withInput();
        }
    }

    public function search()
    {
        $keyword = $this->request->getVar('carisales');

        // Ambil data penjualan berdasarkan kata kunci pencarian
        $data['salesData'] = $this->modelSales->searchSales($keyword);
        $data['sd'] = ['id_sales' => 0];

        // Ambil data STO dan sektor untuk dropdown
        $data['stos'] = $this->modelSTO->getformSTO();
        $data['sektors'] = $this->modelSektor->getformSektor();

        // Kirim data hasil pencarian ke view
        return view('Pages/SALES', $data);
    }

    public function updateStatus($id_sales)
    {
        $newStatus = $this->request->getVar('status');

        // Check if status can be updated based on current status
        $currentStatus = $this->modelSales->getStatus($id_sales);

        if (($currentStatus == 'FCC' || $currentStatus == 'PI' || $currentStatus == 'PS') && $newStatus == 'RE') {
            // Status cannot be changed back to RE from FCC, PI, or PS
            session()->setFlashdata('gagal', 'Status tidak dapat kembali ke RE.');
            return redirect()->back();
        }

        if ($currentStatus == 'PS') {
            // Status PS cannot be updated again
            session()->setFlashdata('gagal', 'Status PS tidak dapat diupdate lagi.');
            return redirect()->back();
        }

        // Update the status of the sales data
        $success = $this->modelSales->updateStatus($id_sales, $newStatus);

        if ($success) {
            // Tampilkan pesan sukses
            session()->setFlashdata('success', 'Status Data Berhasil Diperbarui.');
            return redirect()->to('listSales');
        } else {
            // Tampilkan pesan gagal
            session()->setFlashdata('gagal', 'Gagal Memperbarui Status Data.');
            return redirect()->back();
        }
    }



    public function import()
    {
        $file = $this->request->getFile('file_excel');
        $extension = $file->getClientExtension();

        // Validasi ekstensi file
        if ($extension == 'xlsx' || $extension == 'xls') {
            // Pilih pembaca berdasarkan ekstensi file
            if ($extension == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            // Load file spreadsheet
            $spreadsheet = $reader->load($file);

            // Ambil data dari sheet aktif
            $contacts = $spreadsheet->getActiveSheet()->toArray();

            $contacts = array_slice($contacts, 4);

            // Loop untuk setiap baris data
            foreach ($contacts as $key => $value) {

                // Validasi apakah ada nilai yang kosong
                for ($i = 3; $i <= 7; $i++) {
                    if (empty($value[$i])) {
                        $errors[] = 'Kolom ' . $i . ' kosong pada baris ' . ($key + 5);
                    }
                }
                if (!empty($value[1])) {
                    $date = date_create_from_format('m/d/Y', $value[1]);
                    if (!$date) {
                        // Konversi ke format tanggal yyyy-mm-dd jika format tidak sesuai
                        $date = date_create_from_format('Y-m-d', $value[1]);
                        if ($date) {
                            $value[1] = $date->format('Y-m-d');
                        } else {
                            $errors[] = 'Format tanggal tidak sesuai pada baris ' . ($key + 5);
                        }
                    } else {
                        $value[1] = $date->format('Y-m-d');
                    }
                }

                $validStatus = ['RE', 'FCC', 'PI', 'PS'];
                if (!in_array($value[8], $validStatus)) {
                    $errors[] = 'Nilai status tidak valid pada baris ' . ($key + 5);
                }
                // Jika ada pesan error, lanjutkan ke baris data berikutnya
                if (!empty($errors)) {
                    continue;
                }

                // Simpan data ke dalam array
                $data = [
                    'tanggal_order' => $value[1], // Sesuaikan dengan indeks kolom yang sesuai
                    'noSC' => $value[2],
                    'nama_pengguna' => $value[3],
                    'alamat_instl' => $value[4],
                    'datel' => $value[5],
                    'sektor' => $value[6],
                    'sto' => $value[7],
                    'status' => $value[8],
                    'tanggal_update' => date('Y-m-d'), // Tanggal hari ini
                ];

                $this->modelSales->insert($data);
            }

            if (!empty($errors)) {
                session()->setFlashdata('errors', $errors);
            } else {
                session()->setFlashdata('success', 'Data berhasil ditambah');
            }
            return redirect()->to('listSales');
        } else {
            // Set pesan flash gagal jika format file tidak sesuai
            session()->setFlashdata('gagal', 'Format File tidak sesuai');
            return redirect()->back()->withInput();
        }
    }

    public function exampleFile()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A2', 'Data Sales Telkom Witel Sumbar');
        $sheet->mergeCells('A2:J2');
        $sheet->getStyle('A2')->getFont()->setBold(true);
        $sheet->getStyle('A2')->getFont()->setSize(13);
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A2')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

        $sheet->setCellValue('A4', 'No');
        $sheet->setCellValue('B4', 'Tanggal Order');
        $sheet->setCellValue('C4', 'Nomor SC');
        $sheet->setCellValue('D4', 'Nama Pengguna');
        $sheet->setCellValue('E4', 'Alamat Instalasi');
        $sheet->setCellValue('F4', 'Datel');
        $sheet->setCellValue('G4', 'Sektor');
        $sheet->setCellValue('H4', 'STO');
        $sheet->setCellValue('I4', 'Status');



        $sheet->setCellValue('A3', '1');
        $sheet->setCellValue('B3', 'yyyy-mm-dd');
        $sheet->setCellValue('F3', 'Datel BKT');
        $sheet->setCellValue('G3', 'Hero BKT');
        $sheet->setCellValue('H3', 'BKT');
        $sheet->setCellValue('I3', 'RE/FCC/PI/PS');


        $sheet->getStyle('A3:I3')->getFont()->setItalic(true);
        $sheet->getStyle('A4:I4')->getFont()->setBold(true);
        $sheet->getStyle('A4:I4')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFACD');


        $sheet->getColumnDimension('A')->SetAutoSize(true);
        $sheet->getColumnDimension('B')->SetAutoSize(true);
        $sheet->getColumnDimension('C')->SetAutoSize(true);
        $sheet->getColumnDimension('D')->SetAutoSize(true);
        $sheet->getColumnDimension('E')->SetAutoSize(true);
        $sheet->getColumnDimension('F')->SetAutoSize(true);
        $sheet->getColumnDimension('G')->SetAutoSize(true);
        $sheet->getColumnDimension('H')->SetAutoSize(true);
        $sheet->getColumnDimension('I')->SetAutoSize(true);


        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename= examaple_sales.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function export()
    {
        $sales = $this->modelSales->findAll();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A2', 'Data Sales Telkom Witel Sumbar');
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
        foreach ($sales as $key => $value) {
            $sheet->setCellValue('A' . $column, ($column - 4));
            $sheet->setCellValue('B' . $column, $value['tanggal_order']);
            $sheet->setCellValue('C' . $column, $value['tanggal_update']);
            $sheet->setCellValue('D' . $column, $value['noSC']);
            $sheet->setCellValue('E' . $column, $value['nama_pengguna']);
            $sheet->setCellValue('F' . $column, $value['alamat_instl']);
            $sheet->setCellValue('G' . $column, $value['datel']);
            $sheet->setCellValue('H' . $column, $value['sektor']);
            $sheet->setCellValue('I' . $column, $value['sto']);
            $sheet->setCellValue('J' . $column, $value['status']);
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
        $sheet->getStyle('A4:J' . $endRow)->applyFromArray($styleArray);


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
        header('Content-Disposition: attachment;filename=sales.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }
}
