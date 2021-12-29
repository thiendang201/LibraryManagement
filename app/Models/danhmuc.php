<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    use HasFactory;
    protected $fillable=[
        'tenDanhMuc'
    ];
//    public function saches(){
//        return$this->hasMany(sach::class, 'danhMuc_id', 'id');
//    }
}
