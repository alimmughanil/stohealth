<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleDetail extends Model
{
    use HasFactory;
    protected $table= 'role_detail';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
