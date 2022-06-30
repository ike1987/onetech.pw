<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    public function product($category, $id)
    {
        return [
            DB::table($category)->select('*')->where('id', '=', $id)->get()
        ];
    }
}
