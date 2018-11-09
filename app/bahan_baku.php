<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bahan_baku extends Model
{
    public $table = "bahan_baku";
    protected $primaryKey = "id_bahan_baku";
    public $fillable = ['nama_bahan_baku', 'stok'];
    public $timestamps = false;
    protected $keyType = 'string';

    public function join_history(){
        return $this->hasMany(history_pembelian::class, 'id_bahan_baku', 'id_bahan_baku');
    }
}
