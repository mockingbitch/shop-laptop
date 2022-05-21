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

    public function danhmuc()
    {
        return $this->belongsTo(Danhmuc::class, 'danhmuc_id');
    }

    public function thuonghieu()
    {
        return $this->belongsTo(Thuonghieu::class, 'thuonghieu_id');
    }
}
