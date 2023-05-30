<?php

namespace App\Controllers;

class LevelMenu extends BaseController
{
    public function index()
    {
        $Model = model('BaseModel_LevelMenu');
        $data['tampil'] = $Model->view_data();
        return view('LevelMenu/BaseView_LevelMenu',$data);
    }
    public function form_edit($id_level_menu){
        $model = model('BaseModel_LevelMenu');
        $data['tampil'] = $model->find($id_level_menu);
        return view('LevelMenu/form_EditView_LevelMenu',$data);
    }
    public function update($id_level_menu)
    {
        if (! $this->validate([
            'id_level_menu' => 'required',
            'id_level'  => 'required',
            'id_interface'  => 'required',
            'status'  => 'required',
        ])) {
            $data['validation'] = $this->validator;
            return view('form_EditView_LevelMenu', $data);
        } else{
            $model = model('BaseModel_LevelMenu');
            $data = [
                'id_level_menu' => $this->request->getPost('id_level_menu'),
                'id_level' => $this->request->getPost('id_level'),
                'id_interface' => $this->request->getPost('id_interface'),
                'status' => $this->request->getPost('status'),
            ];

            $model->updateLevelMenu($id_level_menu, $data);
        return redirect()->to('levelmenu/index')->with('success', 'Data berhasil dipudate');
    }
}
}
