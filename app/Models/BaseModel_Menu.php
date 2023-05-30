<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel_Menu extends Model
{
    protected $db;
    protected $table = 'tb_menu';
    protected $primaryKey = 'id_menu';
    protected $allowedFields = ['id_menu','nama_menu','harga','status','gambar'];
    public function view_data()
    {
        $query = $this->db->table($this->table)->get();
        return $query->getResult();
    }
    public function getMenuById($id_menu)
    {
        $query = $this->db->table('tb_menu')->where('id_menu', $id_menu)->get();
        return $query->getRow();
    }
    public function updateMenu($id_menu, $data)
    {
        $builder = $this->db->table($this->table);
        $builder->where($this->primaryKey, $id_menu);
        $builder->update($data);
        return true;    
    }   
    public function delete_data($id_menu)
    {
        return $this->db->table($this->table)->where('id_menu', $id_menu)->delete();
    }
    public function select_data($idMenu)
    {
        return $this->find($idMenu);
    }
}
