<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chitietdonhang extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'chitietdonhang';

    /**
     * @var array
     */
    protected $fillable = [
        'donhang_id',
        'sanpham_id',
        'tensanpham',
        'soluong',
        'dongia',
        'tong',
        'hinhanhsp',
        'code'
    ];
}
