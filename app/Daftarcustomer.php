<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daftarcustomer extends Model
{
	 protected $table = 'daftarcustomer';
     protected $fillable = ['email','nama','no_hp','alamat']; 
}
