<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $fillable = ['nota', 'kasir', 'tanggal', 'mulai','ahir','total'];
}
