<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPemeriksaan extends Model
{
    use HasFactory;
    protected $table= 'data_pemeriksaan';
    protected $guarded = [];
}
