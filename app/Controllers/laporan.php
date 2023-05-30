<?php

namespace App\Controllers;
use Dompdf\Dompdf;

class Laporan extends BaseController
{
    public function index(){
        $model = model('BaseModel_Pembayaran');
        $data['tampil'] = $model->view_data();
        return view('BaseView_Laporan',$data);
    }
    public function nota($id_pembayaran)
    {
        $model = model('BaseModel_Pembayaran');
        $data['nota'] = $model->select_data($id_pembayaran);
        $data['user'] = $model->pelanggan($id_pembayaran);
        $data['kasir'] = $model->kasir($id_pembayaran);
        $data['menu'] = $model->menu($id_pembayaran);
        $data['pembayaran'] = $model->pembayaran($id_pembayaran);
        $dompdf = new Dompdf();
        $html = view('nota', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $filename = 'nota(' . $id_pembayaran . ').pdf';
        $dompdf->stream($filename, ['Attachment' => 0]);
        return redirect()->to(base_url('laporan/index'));
    }
    public function cetak()
    {
        $model = model('BaseModel_Pembayaran');
        $dompdf = new Dompdf();
        $data['tampil'] = $model->view_data();
        $html = view('cetak_laporan', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('laporan', ['Attachment' => 0]);
        return redirect()->to(base_url('laporan/index'));
    }
}
