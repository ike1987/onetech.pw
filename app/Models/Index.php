<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    use HasFactory;
    public function onSale()
    {
        return [
            "Bracelet" => Bracelet::query()->select('id', 'type', 'brand', 'name', 'price', 'image', 'discount')->orderBy('discount', 'DESC')->limit(4)->get(),
            "Cellphone" => Cellphone::query()->select('id', 'type', 'brand', 'name', 'price', 'image', 'discount')->orderBy('discount', 'DESC')->limit(4)->get(),
            "Smartphone" => Smartphone::query()->select('id', 'type', 'brand', 'name', 'price', 'image', 'discount')->orderBy('discount', 'DESC')->limit(4)->get(),
            "Watch" => Watch::query()->select('id', 'type', 'brand', 'name', 'price', 'image', 'discount')->orderBy('discount', 'DESC')->limit(4)->get()
        ];
    }
    public function bestRated()
    {
        return [
            "Bracelet" => Bracelet::query()->select('id', 'type', 'brand','name', 'price', 'image', 'discount')->orderBy('likes', 'DESC')->limit(4)->get(),
            "Cellphone" => Cellphone::query()->select('id', 'type', 'brand','name', 'price', 'image', 'discount')->orderBy('likes', 'DESC')->limit(4)->get(),
            "Smartphone" => Smartphone::query()->select('id', 'type', 'brand','name', 'price', 'image', 'discount')->orderBy('likes', 'DESC')->limit(4)->get(),
            "Watch" => Watch::query()->select('id', 'type', 'brand','name', 'price', 'image', 'discount')->orderBy('likes', 'DESC')->limit(4)->get()
        ];
    }
    public function bestSellers()
    {
        return [
            "Bracelet" => Bracelet::query()->select('id', 'type','brand', 'name', 'price', 'image', 'discount')->orderBy('sales', 'DESC')->limit(5)->get(),
            "Cellphone" => Cellphone::query()->select('id', 'type','brand', 'name', 'price', 'image', 'discount')->orderBy('sales', 'DESC')->limit(5)->get(),
            "Smartphone" => Smartphone::query()->select('id', 'type','brand', 'name', 'price', 'image', 'discount')->orderBy('sales', 'DESC')->limit(5)->get(),
            "Watch" => Watch::query()->select('id', 'type','brand', 'name', 'price', 'image', 'discount')->orderBy('sales', 'DESC')->limit(5)->get()
        ];
    }
    public function newArrivals()
    {
        $date = date('m:y');
        return [
            "Bracelet" => Bracelet::query()->select('id', 'type', 'brand','name', 'price', 'image', 'discount')->where('arrival', 'LIKE', "%{$date}%")->limit(5)->get(),
            "Cellphone" => Cellphone::query()->select('id', 'type', 'brand','name', 'price', 'image', 'discount')->where('arrival', 'LIKE', "%{$date}%")->limit(5)->get(),
            "Smartphone" => Smartphone::query()->select('id', 'type', 'brand','name', 'price', 'image', 'discount')->where('arrival', 'LIKE', "%{$date}%")->limit(5)->get(),
            "Watch" => Watch::query()->select('id', 'type', 'brand','name', 'price', 'image', 'discount')->where('arrival', 'LIKE', "%{$date}%")->limit(5)->get(),
        ];
    }
    public function weekDeals()
    {
        $date = date('m:y');
        return [
            "Bracelet" => Bracelet::query()->select('id', 'type', 'brand','name', 'price', 'image', 'discount', 'sales', 'stock')->where('arrival', 'LIKE', "%{$date}%")->orderBy('discount', 'DESC')->limit(1)->get(),
            "Cellphone" => Cellphone::query()->select('id', 'type', 'brand','name', 'price', 'image', 'discount', 'sales', 'stock')->where('arrival', 'LIKE', "%{$date}%")->orderBy('discount', 'DESC')->limit(1)->get(),
            "Smartphone" => Smartphone::query()->select('id', 'type', 'brand','name', 'price', 'image', 'discount', 'sales', 'stock')->where('arrival', 'LIKE', "%{$date}%")->orderBy('discount', 'DESC')->limit(1)->get(),
            "Watch" => Watch::query()->select('id', 'type', 'brand','name', 'price', 'image', 'discount', 'sales', 'stock')->where('arrival', 'LIKE', "%{$date}%")->orderBy('discount', 'DESC')->limit(1)->get()
        ];
    }
    public function trands()
    {
        $date = date('m:y');
        return  Smartphone::query()->select('id', 'type', 'brand','name', 'price', 'image', 'os', 'cpu', 'frontcam', 'ram', 'rom')->where('arrival', 'LIKE', "%{$date}%")->orderBy('discount', 'DESC')->limit(3)->get();
    }
    public function promoactions()
    {
        return [
            'weekDeals' => Promoaction::query()->select('hotdeals')->find(1),
            'banner1' => Promoaction::query()
                ->select('smartphones.id', 'smartphones.type', 'smartphones.brand','smartphones.name', 'smartphones.price', 'smartphones.image', 'smartphones.discount')
                ->join('smartphones', 'promoactions.banner1', '=', 'smartphones.name')
                ->get(),

            'banner2' => [
                'banner2.1' => Promoaction::query()
                    ->select('watches.id', 'watches.type', 'watches.brand','watches.name', 'watches.price', 'watches.image', 'watches.discount', 'watches.functions')
                    ->join('watches', 'promoactions.banner2_1', '=', 'watches.name')
                    ->get(),
                'banner2.2' => Promoaction::query()
                    ->select('watches.id', 'watches.type', 'watches.brand','watches.name', 'watches.price', 'watches.image', 'watches.discount', 'watches.functions')
                    ->join('watches', 'promoactions.banner2_2', '=', 'watches.name')
                    ->get(),
                'banner2.3' => Promoaction::query()
                    ->select('watches.id', 'watches.type', 'watches.brand','watches.name', 'watches.price', 'watches.image', 'watches.discount', 'watches.functions')
                    ->join('watches', 'promoactions.banner2_3', '=', 'watches.name')
                    ->get(),
            ]
        ];
    }


}
