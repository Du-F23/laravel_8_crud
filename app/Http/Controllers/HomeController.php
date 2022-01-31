<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\Images;
use App\Models\Article;

class HomeController extends Controller
//{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//      $this->middleware('auth');
//    }
//
//    /**
//     * Show the application dashboard.
//     *
//     * @return \Illuminate\View\View
//     */
//    public function index()
//    {
//        return view('index');
//    }
//}
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /* obtenemos nuestros usuarios con el metodo count */
        $users = User::count();
        $categoryes = Category::count();
        $images = Images::count();
        // $articles = Article::count();
        //dd ($articles);
        //dd(User::count());
        //dd ($images);
        return view('index', [
            'users' => $users,
            'categoryes' => $categoryes,
            'images' => $images,
            // 'articles' => $articles

        ]);
    }

    /* obtener cuanto usuarios hay dentro de base de datos */


}
