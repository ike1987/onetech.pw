<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Wish extends Model
{
    use HasFactory;
    public function wish($category, $id)
    {
        return [
            DB::table($category)->select('id', 'type', 'brand', 'name', 'price', 'image', 'discount', 'arrival')
                ->where('id', '=', $id)->get()
        ];
    }
}
