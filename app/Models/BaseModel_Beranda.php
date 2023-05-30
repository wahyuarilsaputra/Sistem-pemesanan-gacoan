<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel_Beranda extends Model
{
    protected $tb_user = 'tb_user';
    protected $tb_menu = 'tb_menu';
    protected $tb_pemesanan = 'tb_pemesanan';
    protected $tb_pembayaran = 'tb_pembayaran';
    protected $db;
    public function count_data()
    {
        $db = \Config\Database::connect();
        $count_user = $db->table('tb_user')->countAllResults();
        $count_menu = $db->table('tb_menu')->countAllResults();
        $count_pemesanan = $db->table('tb_pemesanan')->countAllResults();
        $count_pembayaran = $db->table('tb_pembayaran')->countAllResults();
        return [
            'count_user' => $count_user,
            'count_menu' => $count_menu,
            'count_pemesanan' => $count_pemesanan,
            'count_pembayaran' => $count_pembayaran,
        ];
    }
}
