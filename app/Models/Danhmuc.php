<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'danhmuc';

    /**
     * @var array
     */
    protected $fillable = [
        'ten',
        'mota',
        'trangthai'
    ];
}
