<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['customer','paket','berat','pesanan','pembayaran','total','created_at'];
   
    
}
