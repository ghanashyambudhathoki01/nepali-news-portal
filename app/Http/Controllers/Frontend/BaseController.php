<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{

    public function __construct()
    {
        $categories = Category::orderBy('position', 'asc')->where('visible', true)->get();
        $header_advertises = Advertise::where("expire_date", ">=", date('Y-m-d'))->where('ad_position', 'header')->get();
        $footer_advertises = Advertise::where("expire_date", ">=", date('Y-m-d'))->where('ad_position', 'footer')->get();
        View::share([
            'categories' => $categories,
            'header_advertises' => $header_advertises,
            'footer_advertises' => $footer_advertises,
        ]);
    }
}
