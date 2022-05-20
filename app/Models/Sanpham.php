<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;

     /**
     * @var string
     */
    protected $table = 'sanpham';

    /**
     * @var array
     */
    protected $fillable = [
        'ten',
        'mota',
        'chitiet',
        'gia',
        'hinhanh',
        'soluong',
        'danhmuc_id',
        'thuonghieu_id',
    ];
}
