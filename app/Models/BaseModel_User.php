<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel_User extends Model
{
    protected $db;
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password','nama','level'];
    public function view_data()
    {
        $builder = $this->db->table($this->table);
        $builder->select('tb_user.id_user, tb_user.username, tb_user.password, tb_user.nama, tb_level.nama_level');
        $builder->join('tb_level', 'tb_level.id_level = tb_user.level');
        $builder->orderBy('level', 'asc');
        $query = $builder->get();
        return $query->getResult();
    }
    public function updateUser($id_user, $data)
    {
        $builder = $this->db->table($this->table);
        $builder->where($this->primaryKey, $id_user);
        $builder->update($data);
        return true;    
    }
    public function getUserOptions()
    {
        $query = $this->db->table($this->table)
                          ->select('tb_user.level, tb_level.*')
                          ->join('tb_level', 'tb_level.id_level = tb_user.level')
                          ->groupBy('tb_user.level')
                          ->get();

        return $query->getResult();
    }
    public function delete_data($id_user)
    {
        return $this->db->table($this->table)->where('id_user', $id_user)->delete();
    }
    public function select_data($id_user)
    {
        return $this->find($id_user);
    }
}
