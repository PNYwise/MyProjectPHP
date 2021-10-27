<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable =['nm_product','type','jumlah','harga','foto'];
}
