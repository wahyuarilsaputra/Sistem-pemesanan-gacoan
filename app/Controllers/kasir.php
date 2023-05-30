<?php

namespace App\Controllers;

use App\Models\BaseModel_Pemesanan;

class Kasir extends BaseController
{
    public function index()
    {
        $Model = model('BaseModel_Pemesanan');
        $data['tampil'] = $Model->getPesananByStatus();
        return view('BaseView_Kasir',$data);
    }
    public function detail_pesanan($id_pemesanan)
    {
        $model = model('BaseModel_Pemesanan');
        $data['row'] = $model->select_data($id_pemesanan);
        return view('ViewDataView_Pemesanan', $data);
    }
    public function bayar($id_pemesanan)
    {
        $user = session()->get('id_user');
        $pesan = session()->get('pesan');
        // dd($pesan);
        $Model = model('BaseModel_Pemesanan');
        $data_pesanan = $Model->getPesananById($id_pemesanan);
        $pesan[$id_pemesanan] = [
            'id_user' => $data_pesanan->id_user,
            'tanggal_pemesanan' => $data_pesanan->tanggal_pemesanan,
            'jumlah' => $data_pesanan->jumlah,
            'total_harga' => $data_pesanan->total_harga,
            'status' => $data_pesanan->status,
        ];
        session()->set('pesan', $pesan);
        $data['tampil'] = $Model->find($id_pemesanan);
        $data['user'] = $user;
        return view('form_bayar',$data);
    }
    public function insert_bayar($id_pemesanan)
    {
        $pesan = session()->get('pesan');
        $user = session()->get('id_user');
        $db = db_connect();
        $tanggal_pembayaran = date("Y-m-d H:i:s");
        $jmlh = 0;
        $total_harga = 0;
        foreach ($pesan as $item) {
            $jmlh += intval($item['jumlah']);
            $total_harga = intval($item['total_harga']);
            $pelanggan = $item['id_user'];
        }
        $bayar = intval($this->request->getPost('bayar'));
        if ($bayar < $total_harga) {
            return redirect()->to(base_url('Kasir/index'));
        }else{
        $kembalian = $bayar - $total_harga;
        $data = [
            'id_pemesanan' => $id_pemesanan,
            'id_user' => $pelanggan,
            'id_kasir' => $user,
            'tanggal_pembayaran' => $tanggal_pembayaran,
            'jumlah' => $jmlh,
            'total_harga' => $total_harga,
            'bayar' => $bayar,
            'kembalian' => $kembalian,
        ];
        $builder = $db->table('tb_pembayaran');
        $builder->insert($data);
        $id_terbaru = $db->insertID();
        $builder2 = $db->table('tb_pemesanan');
        $builder2->where('id_pemesanan', $id_pemesanan)->set(['status' => 'sudah bayar'])->update();
        $id_nota = ['id_pembayaran' => $id_terbaru];
        // dd($id_nota);
        return redirect()->to(base_url("laporan/nota/{$id_nota['id_pembayaran']}"));
        }
    }
}
