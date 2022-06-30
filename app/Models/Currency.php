<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable  = [
        'name',
        'code',
        'sign',
        'value'
    ];

    public function currencies()
    {
        return Currency::query()->find(2);
    }

}
