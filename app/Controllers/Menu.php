<?php

namespace App\Controllers;

class Menu extends BaseController
{
    public function index()
    {
        $Model = model('BaseModel_Menu');
        $data['tampil'] = $Model->view_data();
        return view('Menu/BaseView_Menu',$data);
    }
    // form tambah menu
    public function form_tambah()
    {
        $data = [
            'validation' => \config\Services::validation(),
        ];
        return view('Menu/form_TambahView_Menu',$data);
    }
    // insert data menu
    public function tambah()
    {
        if (! $this->validate([
            'nama_menu' => 'required',
            'harga'  => 'required',
            // 'gambar'  => 'required',
        ])) {
            $data['validation'] = $this->validator;
            return view('form_TambahView_Menu', $data);
        } else{
        $gambar = $this->request->getFile('gambar');
        if ($gambar->isValid() && !$gambar->hasMoved())
        {
            $newName = $gambar->getRandomName();
            $gambar->move('template/img', $newName);
        }
        $data = [
            'nama_menu' => $this->request->getPost('nama_menu'),
            'harga' => $this->request->getPost('harga'),
            'status' => $this->request->getPost('status'),
            'gambar' => $newName,
        ];
        $formModel = model('BaseModel_Menu');
        $formModel->insert($data);
        return redirect()->to('menu/index')->with('success', 'Data berhasil ditambah');
        }
    }
    public function form_edit($id_menu){
        $model = model('BaseModel_Menu');
        $data['tampil'] = $model->find($id_menu);
        return view('Menu/form_EditView_Menu',$data);
    }
    public function update($id_menu)
    {
        $model = model('BaseModel_Menu');
        $gambar = $this->request->getFile('gambar');
        $input_gambar = $this->request->getPost('lama');

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $newName = $gambar->getRandomName();
            $gambar->move('template/img', $newName);
            $input_gambar = $newName;
        }

        $data = [
            'nama_menu' => $this->request->getPost('nama_menu'),
            'harga' => $this->request->getPost('harga'),
            'status' => $this->request->getPost('status'),
            'gambar' => $input_gambar,
        ];

        $model->updateMenu($id_menu, $data);
        return redirect()->to('menu/index')->with('success', 'Data berhasil diupdate');

    }
    public function hapus($id_menu)
    {
        $Model = model('BaseModel_Menu');
        if ($Model->delete_data($id_menu)) {
            return redirect()->to('menu/index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->to('menu/index')->with('error', 'Data gagal dihapus');
        }
        return  redirect()->to('menu/index');
    }
}
