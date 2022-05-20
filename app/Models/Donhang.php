<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'donhang';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'tenkhachhang',
        'email',
        'diachi',
        'sdt',
        'ghichu',
        'trangthai',
        'tongtien',
        'code'
    ];
}
