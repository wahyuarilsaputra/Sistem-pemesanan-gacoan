<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel_Pemesanan extends Model
{
    protected $db;
    protected $table = 'tb_pemesanan';
    protected $primaryKey = 'id_pemesanan';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_user','tanggal_pemesanan','jumlah','status'];
    public function view_data()
    {
        $builder = $this->db->table($this->table);
        $builder->select('tb_pemesanan.id_pemesanan, tb_user.nama, tb_pemesanan.tanggal_pemesanan, tb_pemesanan.jumlah, tb_pemesanan.status');
        $builder->join('tb_user', 'tb_pemesanan.id_user = tb_user.id_user');
        $query = $builder->get();
        return $query->getResult();
    }
    public function getPesananByStatus()
    {
        // $query = $this->db->table('tb_pemesanan')->where('status', 'belum bayar')->get();
        $builder = $this->db->table($this->table);
        $builder->select('tb_pemesanan.id_pemesanan, tb_user.nama, tb_pemesanan.tanggal_pemesanan, tb_pemesanan.jumlah, tb_pemesanan.status');
        $builder->join('tb_user', 'tb_pemesanan.id_user = tb_user.id_user');
        $builder->where('status', 'belum bayar');
        $query = $builder->get();
        return $query->getResult();
    }
    public function getPesananById($id_Pemesanan)
    {
        $query = $this->db->table('tb_pemesanan')->where('id_pemesanan', $id_Pemesanan)->get();
        return $query->getRow();
    }
    public function updatePemesanan($id_pemesanan, $data)
    {
        $builder = $this->db->table($this->table);
        $builder->where($this->primaryKey, $id_pemesanan);
        $builder->update($data);
        return true;    
    }  
    public function select_data($id_pemesanan)
    {
        $builder = $this->db->table($this->table);
        $builder->select('tb_detail_pemesanan.id_pemesanan, tb_menu.nama_menu,tb_menu.harga,tb_detail_pemesanan.jumlah');
        $builder->join('tb_detail_pemesanan', 'tb_pemesanan.id_pemesanan = tb_detail_pemesanan.id_pemesanan');
        $builder->join('tb_menu', 'tb_detail_pemesanan.id_menu = tb_menu.id_menu');
        $builder->where('tb_detail_pemesanan.id_pemesanan', $id_pemesanan);
        $query = $builder->get();
        return $query->getResult();
        // return $this->find($id_pemesanan);
    }  
}
