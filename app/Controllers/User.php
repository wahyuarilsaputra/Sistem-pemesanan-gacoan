<?php

namespace App\Controllers;

class User extends BaseController
{
    // Index Interface User
    public function index()
    {
        $Model = model('BaseModel_User');
        $data['tampil'] = $Model->view_data();
        return view('User/BaseView_User',$data);
    }
    // Form Tambah User
    public function form_tambah()
    {
        $data = [
            'validation' => \config\Services::validation(),
        ];
        return view('User/form_TambahView_User',$data);
    }
    // Insert data User
    public function tambah()
    {
        if (! $this->validate([
            'username' => 'required',
            'password'  => 'required',
            'nama'  => 'required',
            'level'  => 'required',
        ])) {
            $data['validation'] = $this->validator;
            return view('form_TambahView_User', $data);
        } else{
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'nama' => $this->request->getPost('nama'),
            'level' => $this->request->getPost('level'),
        ];
        $formModel = model('BaseModel_User');
        $formModel->insert($data);
        return redirect()->to('User/index')->with('success', 'Data berhasil ditambah');
        }
    }
    // Form Edit user
    public function form_edit($id_user){
        $model = model('BaseModel_User');
        $data['tampil'] = $model->find($id_user);
        $data['users'] = $model->getUserOptions();
        return view('User/form_EditView_User',$data);
    }
    // Update data User
    public function update($id_user)
    {
        if (! $this->validate([
            'username' => 'required',
            'password'  => 'required',
            'nama'  => 'required',
            'level'  => 'required',
        ])) {
            $data['validation'] = $this->validator;
            return view('form_EditView_User', $data);
        } else{
            $model = model('BaseModel_User');
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'nama' => $this->request->getPost('nama'),
                'level' => $this->request->getPost('level'),
            ];

            $model->updateUser($id_user, $data);
        return redirect()->to('User/index')->with('success', 'Data berhasil dipudate');
    }
    }
    // Hapus data User
    public function hapus($id_user)
    {
        $Model = model('BaseModel_User');
        if ($Model->delete_data($id_user)) {
            return redirect()->to('User/index')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->to('User/index')->with('error', 'Data gagal dihapus');
        }
        return view('User/index');
    }
    // View data user
    public function select_data($idUser)
    {
        $model = model('BaseModel_User');
        $data['row'] = $model->select_data($idUser);
        return view('User/ViewDataView_User', $data);
    }
}
