<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pakan extends Model
{
    public $table = "pakan";
    protected $primaryKey = "id_pakan";
    public $fillable = ['jenis_pakan', 'nama_pakan', 'stok_pakan', 'harga'];
    public $timestamps = false;
    protected $keyType = 'string';

    public function join_produksi_pakan(){
        return $this->hasMany(produksi_pakan::class, 'id_pakan', 'id_pakan');
    }
}
