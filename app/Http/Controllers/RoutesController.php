<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Index;
use App\Models\Currency;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Wish;

class RoutesController extends Controller
{
    public function index()
    {
        $index = new Index();
        $currency = new Currency();

        $data = [
            'items' => [
                'trands' => $index->trands(),
                'onSale' => $index->onSale(),
                'bestRated' => $index->bestRated(),
                'weekDeals' => $index->weekDeals(),
                'bestSellers' => $index->bestSellers(),
                'newArrivals' => $index->newArrivals(),
                'promoactions' => $index->promoactions(),
            ],
            'currencies' => $currency->currencies()
        ];

        return view('index', $data);
    }

    public function shop($category = null, $brand = null, $min = null, $max = null, $page = null)
    {
        $shop = new Shop();
        $currency = new Currency();

        $data = [
            'items' => [
                'price' => $shop->price($category),
                'brand' => $shop->brand($category),
                'items' => $shop->items($category, $brand, $min, $max, $page)
            ],
            'category' => $category,
            'currencies' => $currency->currencies()
        ];
        return view('shop', $data);
    }

    public function updateCart()
    {
        $cart = new Cart();

        if (isset($_POST['name'])) {
            if (str_contains($_POST['name'], 'add-')) {
                $name = str_replace('add-', '', $_POST['name']);
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [$name => 1];
                } else {
                    if (array_key_exists($name, $_SESSION['cart'])) {
                        $_SESSION['cart'][$name] = (int)$_SESSION['cart'][$name] + 1;
                    } else {
                        $_SESSION['cart'] = $_SESSION['cart'] + [$name => 1];
                    }
                }
            }

            if (str_contains($_POST['name'], 'remove-')) {
                $name = str_replace('remove-', '', $_POST['name']);
                if (isset($_SESSION['cart'])) {
                    if (array_key_exists($name, $_SESSION['cart'])) {
                        if ((int)$_SESSION['cart'][$name] !== 1) {
                            $_SESSION['cart'][$name] = (int)$_SESSION['cart'][$name] - 1;
                        } else {
                            unset ($_SESSION['cart'][$name]);
                        }
                    }
                }
            }
        }

        if (isset($_SESSION['cart']) && sizeof($_SESSION['cart']) > 0) {
            $items = [];
            $i = 1;
            foreach (array_keys($_SESSION['cart']) as $item) {
                $data = explode('-', $item);
                $category = $data[0];
                $id = $data[2];
                $quantity [$i] = $_SESSION['cart'][$item];
                $items = $items + [$item => $cart->cart($category, $id)];
                ++$i;
            }
            return [$items, $quantity];
        } else {
            return [null, null];
        }
    }

    public function cart()
    {
        $currency = new Currency();

        $data = [
            'items' => $this->updateCart()[0],
            'quantities' => $this->updateCart()[1],
            'currencies' => $currency->currencies()
        ];
        return view('cart', $data);
    }

    public function updateWishlist()
    {
        $wish = new Wish();
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            if (!isset($_SESSION['wish'])) {
                $_SESSION['wish'] = [];
                array_push($_SESSION['wish'], $name);
            } else {
                if (in_array($name, $_SESSION['wish'])) {
                    unset($_SESSION['wish'][array_search($name, $_SESSION['wish'])]);
                } else {
                    array_push($_SESSION['wish'], $name);
                }
            }
            $_SESSION['wish'] = array_values($_SESSION['wish']);
        }

        if (isset($_SESSION['wish']) && sizeof($_SESSION['wish']) > 0) {
            $items = [];
            foreach ($_SESSION['wish'] as $item) {
                $data = explode('-', $item);
                $category = $data[0];
                $id = $data[2];
                $items = $items + [$item => $wish->wish($category, $id)];
            }
            return $items;
        } else {
            return null;
        }
    }


    public function wishlist()
    {
        $currency = new Currency();
        $data = [
            'items' => $this->updateWishlist(),
            'currencies' => $currency->currencies()
        ];
        return view('wishlist', $data);
    }

    public function product($category = null, $brand = null, $id = null)
    {
        $product = new Product();
        $currency = new Currency();

        $data = [
            'items' => $product->product($category, $id),
            'currencies' => $currency->currencies()
        ];
        return view('product', $data);
    }



    public function contact()
    {
        $currency = new Currency();

        $data = [
            'currencies' => $currency->currencies()
        ];

        return view('contact', $data);
    }



    public function dashboard()
    {

        return view('wishlist');
    }

}
