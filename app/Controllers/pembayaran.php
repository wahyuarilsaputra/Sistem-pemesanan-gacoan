<?php

namespace App\Controllers;
use App\Models\BaseModel_Pemesanan;

class Pembayaran extends BaseController
{
    public function index()
    {
        $cart = session()->get('cart');
        if (!$cart) {
            session()->setFlashdata('success', 'Pesanan Kosong');
            return redirect()->to(base_url('pemesanan/index'));
        }
        $total = 0;
        foreach ($cart as $item) {
            $total += intval($item['harga']) * intval($item['jumlah']);
        }
        $data['cart'] = $cart;
        $data['total'] = $total;
        return view('BaseView_Pembayaran',$data);
    }
    public function bayar(){
        $user = session()->get('id_user');
        $cart = session()->get('cart');
        $model = model('BaseModel_Pemesanan');
        $db = db_connect();

        $jmlh = 0;
        $total = 0;
        foreach ($cart as $item) {
            $total += intval($item['harga']) * intval($item['jumlah']);
            $jmlh += intval($item['jumlah']);
            $tanggal_pemesanan = date("Y-m-d H:i:s");
        }
        $data = [
            'id_user' => $user,
            'tanggal_pemesanan' => $tanggal_pemesanan,
            'jumlah' => $jmlh,
            'total_harga' => $total,
            'status' => 'belum bayar',
        ];
        $builder = $db->table('tb_pemesanan');
        $builder->insert($data);
        // dd($id_terbaru);
        $id_terbaru = $db->insertID();
        foreach ($cart as $item) {
            $menuu = $item['id_menu'];
            $jmlh = intval($item['jumlah']);
            $data2 = [
                'id_pemesanan' => $id_terbaru,
                'id_menu' => $menuu,
                'jumlah' => $jmlh
            ];
            $builder2 = $db->table('tb_detail_pemesanan');
            $builder2->insert($data2);
        }
        unset($_SESSION['cart']);
        return redirect()->to(base_url('pembayaran/index'));
    }
    public function hapus($nama_menu){
        $cart = session()->get('cart');
        foreach ($cart as $key => $item) {
            if ($item['nama_menu'] == $nama_menu) {
                unset($cart[$key]);
            }
        }
        session()->set('cart', $cart);
        return redirect()->to(base_url('pembayaran/index'));
    }

}
