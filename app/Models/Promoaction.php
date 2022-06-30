<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promoaction extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'hotdeals',
        'banner1',
        'banner2'
    ];

    public function promoactions()
    {
        return Promoaction::query()->find(1);
    }
}
