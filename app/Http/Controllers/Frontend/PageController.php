<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;

class PageController extends BaseController
{
    public function home()
    {
        $latest_news = Article::latest()->first();
        $articles = Article::latest()->skip(1)->limit(5)->get();
        $trending_articles = Article::where('trending', true)->latest()->limit(7)->get();
        return view('frontend.home', compact('latest_news', 'articles', 'trending_articles'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $articles = $category->articles()->latest()->paginate(8);
        $page_advertises = Advertise::where("expire_date", ">=", date('Y-m-d'))->where('ad_position', 'pages')->get();
        return view('frontend.category', compact('category', 'articles', 'page_advertises'));
    }

    public function search(Request $request)
    {
        $q = $request->q;
        $articles = Article::where('title', "like", "%$q%")->get();
        $page_advertises = Advertise::where("expire_date", ">=", date('Y-m-d'))->where('ad_position', 'pages')->get();
        return view('frontend.search', compact('q', 'articles', 'page_advertises'));
    }

    public function article($slug)
    {
        $article = Article::where('slug', $slug)->first();

        $id = Cookie::get($article->id);
        if(!$id){
            $article->increment('views');
            Cookie::queue($article->id, $article->id);
        }

        // Related news: shares at least one category, exclude current article, latest 5
        $categoryIds = $article->categories->pluck('id');
        $related_news = Article::whereHas('categories', function($q) use ($categoryIds) {
                $q->whereIn('categories.id', $categoryIds);
            })
            ->where('id', '!=', $article->id)
            ->latest()
            ->limit(5)
            ->get();

        $page_advertises = Advertise::where("expire_date", ">=", date('Y-m-d'))->where('ad_position', 'pages')->get();
        return view('frontend.article', compact('article', 'page_advertises', 'related_news'));
    }

    public function province($slug)
    {
        $provinceNames = [
            'koshi' => 'कोशी प्रदेश',
            'madhesh' => 'मधेश प्रदेश',
            'bagmati' => 'बागमती प्रदेश',
            'gandaki' => 'गण्डकी प्रदेश',
            'lumbini' => 'लुम्बिनी प्रदेश',
            'karnali' => 'कर्णाली प्रदेश',
            'sudurpashchim' => 'सुदूरपश्चिम प्रदेश',
        ];

        if (!array_key_exists($slug, $provinceNames)) {
            abort(404);
        }

        $provinceName = $provinceNames[$slug];
        
        $articles = Article::where('province', $slug)
            ->where('visible', true)
            ->latest()
            ->paginate(8);

        $page_advertises = Advertise::where("expire_date", ">=", date('Y-m-d'))->where('ad_position', 'pages')->get();
        return view('frontend.province', compact('slug', 'provinceName', 'articles', 'page_advertises'));
    }
}
