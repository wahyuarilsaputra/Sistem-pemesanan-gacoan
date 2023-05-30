<?php

namespace App\Controllers;

class Beranda extends BaseController
{
    public function index()
    {
        $Model = model('BaseModel_Beranda');
        $data = $Model->count_data();
        return view('Beranda/BaseView_Beranda',$data);
    }
}
