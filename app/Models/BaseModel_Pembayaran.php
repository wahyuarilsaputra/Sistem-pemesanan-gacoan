<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel_Pembayaran extends Model
{
    protected $db;
    protected $table = 'tb_pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_pemesanan','nama_menu','jumlah'];
    public function view_data()
    {
        $builder = $this->db->table($this->table);
        $builder->select('tb_pembayaran.id_pembayaran,tb_pembayaran.id_pemesanan,tb_user.id_user, tb_user.nama as nama_user,tb_kasir.nama as nama_kasir, tb_pembayaran.tanggal_pembayaran, tb_pembayaran.jumlah, tb_pembayaran.total_harga,tb_pembayaran.bayar,tb_pembayaran.kembalian');
        $builder->join('tb_user', 'tb_pembayaran.id_user = tb_user.id_user');
        $builder->join('tb_user AS tb_kasir', 'tb_pembayaran.id_kasir = tb_kasir.id_user');
        $query = $builder->get();
        return $query->getResult();
    }
    public function data_bulan()
    {
        $query = $this->select("DATE_FORMAT(tanggal_pembayaran, '%Y-%m') as bulan, count(id_pembayaran) as total")
                ->groupBy('bulan')
                ->orderBy('bulan', 'ASC')
                ->findAll();
        return $query;
    }
    public function getDatabyBulan($bulan)
    {
    $builder = $this->db->table($this->table);
        $builder->select('tb_pembayaran.id_pembayaran,tb_pembayaran.id_pemesanan,tb_user.id_user, tb_user.nama as nama_user,tb_kasir.nama as nama_kasir, tb_pembayaran.tanggal_pembayaran, tb_pembayaran.jumlah, tb_pembayaran.total_harga,tb_pembayaran.bayar,tb_pembayaran.kembalian');
        $builder->join('tb_user', 'tb_pembayaran.id_user = tb_user.id_user');
        $builder->join('tb_user AS tb_kasir', 'tb_pembayaran.id_kasir = tb_kasir.id_user');
        $builder->where('MONTH(tb_pembayaran.tanggal_pembayaran)', $bulan);
        $query = $builder->get();
        return $query->getResult();
    }
    public function select_data($id_pembayaran)
    {
        return $this->find($id_pembayaran);
    }
    public function pelanggan($id_pembayaran)
    {
        $builder = $this->db->table($this->table);
        $builder->select('tb_user.nama');
        $builder->join('tb_user', 'tb_pembayaran.id_user = tb_user.id_user');
        $builder->where('tb_pembayaran.id_pembayaran', $id_pembayaran);
        $query = $builder->get();
        $hasil = $query->getRow();
        return $hasil->nama;
    }
    public function kasir($id_pembayaran)
    {
        $builder = $this->db->table($this->table);
        $builder->select('tb_user.nama');
        $builder->join('tb_user', 'tb_pembayaran.id_kasir = tb_user.id_user');
        $builder->where('tb_pembayaran.id_pembayaran', $id_pembayaran);
        $query = $builder->get();
        $hasil = $query->getRow();
        return $hasil->nama;
    }
    public function menu($id_pembayaran)
    {
        $builder = $this->db->table($this->table);
        $builder->select('tb_menu.nama_menu,tb_detail_pemesanan.jumlah,tb_menu.harga,tb_pemesanan.jumlah as jumlah_pesanan');
        $builder->join('tb_pemesanan', 'tb_pembayaran.id_pemesanan = tb_pemesanan.id_pemesanan');
        $builder->join('tb_detail_pemesanan', 'tb_detail_pemesanan.id_pemesanan = tb_pemesanan.id_pemesanan');
        $builder->join('tb_menu', 'tb_detail_pemesanan.id_menu = tb_menu.id_menu');
        $builder->where('tb_pembayaran.id_pembayaran', $id_pembayaran);
        $query = $builder->get();
        $hasil = $query->getResult();
        return $hasil;
    }
    public function pembayaran($id_pembayaran)
    {
        $builder = $this->db->table($this->table);
        $builder->select('tb_pemesanan.jumlah,tb_pemesanan.total_harga,tb_pembayaran.kembalian,tb_pembayaran.bayar');
        $builder->join('tb_pemesanan', 'tb_pembayaran.id_pemesanan = tb_pemesanan.id_pemesanan');
        $builder->where('tb_pembayaran.id_pembayaran', $id_pembayaran);
        $query = $builder->get();
        $hasil = $query->getResult();
        return $hasil;
    }
}
