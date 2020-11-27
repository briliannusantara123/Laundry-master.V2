<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporans';
    protected $fillable = ['customer','paket','berat','pesanan','pembayaran','total','created_at'];
}
