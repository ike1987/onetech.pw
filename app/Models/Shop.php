<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shop extends Model
{
    use HasFactory;
    public function price($category)
    {
        if ($category == null)
        {
            return [
                'min' => min([
                    Bracelet::query()->min('price'),
                    Cellphone::query()->min('price'),
                    Smartphone::query()->min('price'),
                    Watch::query()->min('price')
                ]),
                'max' => max([
                    Bracelet::query()->max('price'),
                    Cellphone::query()->max('price'),
                    Smartphone::query()->max('price'),
                    Watch::query()->max('price')
                ])
            ];
        }else{
            return [
                'min' => DB::table($category)->min('price'),
                'max' => DB::table($category)->max('price')
            ];
        }
    }

    public function brand($category)
    {
        if ($category == null) {
            return [
                'Bracelet' => Bracelet::query()->select('brand')->distinct()->get(),
                'Smartphone' =>Smartphone::query()->select('brand')->distinct()->get(),
                'Cellphone' =>Cellphone::query()->select('brand')->distinct()->get(),
                'Watch' =>Watch::query()->select('brand')->distinct()->get()
            ];
        }else{
            return [
                'brand' => DB::table($category)->select('brand')->distinct()->get()
            ];
        }
    }
    public function items($category, $brand, $min, $max, $page)
    {
        if ($category == null) {
            return [
                Bracelet::query()->select('id', 'type', 'brand', 'name', 'price', 'image', 'discount', 'arrival')->get(),
                Smartphone::query()->select('id', 'type', 'brand', 'name', 'price', 'image', 'discount', 'arrival')->get(),
                Cellphone::query()->select('id', 'type', 'brand', 'name', 'price', 'image', 'discount', 'arrival')->get(),
                Watch::query()->select('id', 'type', 'brand', 'name', 'price', 'image', 'discount', 'arrival')->get()
            ];
        }else{
            if (!$brand == null && (!$min== null || !$max== null))
            {
                return [
                    DB::table($category)->select('id', 'type', 'brand', 'name', 'price', 'image', 'discount', 'arrival')
                        ->where('brand', '=', $brand)
                        ->whereBetween('price', [$min, $max])->get()
                ];
            }elseif ($brand == null && (!$min== null || !$max== null)){
                return [
                    DB::table($category)->select('id', 'type', 'brand', 'name', 'price', 'image', 'discount', 'arrival')
                        ->whereBetween('price', [$min, $max])->get()
                ];
            }elseif (!$brand == null && $min== null && $max== null){
                return [
                    DB::table($category)->select('id', 'type', 'brand', 'name', 'price', 'image', 'discount', 'arrival')
                        ->where('brand', '=', $brand)->get()
                ];
            }else{
                return [
                    DB::table($category)->select('id', 'type', 'brand', 'name', 'price', 'image', 'discount', 'arrival')->get()
                ];
            }
        }
    }
}
