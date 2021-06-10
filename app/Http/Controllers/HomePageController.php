<?php


namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
class HomePageController extends Controller
{
    public function homePage()
    {
//        $categories = DB::table('category')->select('id','name','picture')->get();
        $categories = Category::all();

        return view('homePage', [
            'categories' => $categories
        ]);
    }
}
