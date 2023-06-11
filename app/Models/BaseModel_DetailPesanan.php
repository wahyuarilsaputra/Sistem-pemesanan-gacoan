<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel_DetailPesanan extends Model
{
    protected $table = 'tb_detail_pemesanan';

    public function getMenuTerpopulerPerBulan($bulan)
    {
        $builder = $this->db->table($this->table);
        $builder->select('tb_detail_pemesanan.id_menu, COUNT(*) as total_pesanan,tb_menu.nama_menu');
        $builder->join('tb_pemesanan', 'tb_pemesanan.id_pemesanan = tb_detail_pemesanan.id_pemesanan');
        $builder->join('tb_menu', 'tb_menu.id_menu = tb_detail_pemesanan.id_menu');
        $builder->where("MONTH(tb_pemesanan.tanggal_pemesanan)", $bulan);
        $builder->groupBy('id_menu');
        $builder->orderBy('total_pesanan', 'DESC');
        $builder->limit(4);
        
        $query = $builder->get();

        return $query->getResult();
    }
}
