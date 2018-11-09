<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class history_pembelian extends Model
{
    public $table = "history_pembelian";
    public $primaryKey = "id_history";
    public $fillable = ['id_bahan_baku', 'stok_lama', 'harga_lama', 'beli_baru', 'harga_baru', 'total_stok', 'harga_rata'];
    public $timestamps = false;
    protected $keyType = 'string';

    public function join_bahan_baku(){
        return $this->belongsTo(bahan_baku::class, 'id_bahan_baku', 'id_bahan_baku');
    }

}
