<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produksi_pakan extends Model
{
   	public $table = "produksi_pakan";
    protected $primaryKey = "id_produksi";
    public $fillable = ['jumlah_produksi', 'harga_jual'];
    public $timestamps = false;
    protected $keyType = 'string';

    public function join_pakan(){
        return $this->belongsTo(pakan::class, 'id_pakan', 'id_pakan');
    }
}
