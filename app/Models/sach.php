<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sach extends Model
{
    use HasFactory;
    protected $fillable=[
        'tenSach',
        'moTa',
        'soLuong',
        'tacGia',
        'NXB',
        'gia',
        'anhBia',
        'danhMuc_id'
    ];
    public function danhmuc(){
        return $this->hasOne(danhmuc::class, 'id', 'danhMuc_id');
    }
}
