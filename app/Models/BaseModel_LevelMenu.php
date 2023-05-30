<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel_LevelMenu extends Model
{
    protected $db;
    protected $table = 'tb_level_menu';
    protected $primaryKey = 'id_level_menu';
    protected $allowedFields = ['id_level','id_interface','status'];
    public function view_data()
    {
        $builder = $this->db->table($this->table);
        $builder->select('tb_level_menu.id_level_menu, tb_level.nama_level, tb_interface.nama_interface,tb_level_menu.status');
        $builder->join('tb_level', 'tb_level.id_level = tb_level_menu.id_level');
        $builder->join('tb_interface', 'tb_interface.id_interface = tb_level_menu.id_interface');
        $query = $builder->get();
        return $query->getResult();
    }
    public function updateLevelMenu($id_level_menu, $data)
    {
        $builder = $this->db->table($this->table);
        $builder->where($this->primaryKey, $id_level_menu);
        $builder->update($data);
        return true;    
    }  
}
