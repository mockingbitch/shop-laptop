<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thuonghieu extends Model
{
    use HasFactory;

     /**
     * @var string
     */
    protected $table = 'thuonghieu';

    /**
     * @var array
     */
    protected $fillable = [
        'ten',
        'mota',
        'trangthai'
    ];
}
