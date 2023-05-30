<?php

namespace App\Controllers;

use App\Models\BaseModel_Menu;

class Pemesanan extends BaseController
{
    public function index()
    {
        $Model = model('BaseModel_Menu');
        $data['tampil'] = $Model->view_data();
        return view('BaseView_MenuPemesanan',$data);
    }
    public function pesan($id_menu){
        $model = new BaseModel_Menu();
        $menu = $model->getMenuById($id_menu);
        $cart = session()->get('cart');
        if (isset($cart[$id_menu])) {
            $cart[$id_menu]['jumlah'] += 1;
        } else {
        $cart[$id_menu] = [
            'id_menu' => $menu->id_menu,
            'nama_menu' => $menu->nama_menu,
            'harga' => $menu->harga,
            'jumlah' => 1
        ];
        }
        session()->set('cart', $cart);
        session()->setFlashdata('success', 'Menu berhasil ditambahkan.');
        return redirect()->to(base_url('pembayaran/index'));
    }
}
