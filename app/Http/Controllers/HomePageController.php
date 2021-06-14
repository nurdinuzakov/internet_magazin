<?php


namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;
class HomePageController extends Controller
{
    public function homePage()
    {
//        $categories = DB::table('category')->select('id','name','picture')->get();

        $categories = Category::all();
        $subcategories = Subcategory::all();
        dd($subcategories);

        return view('homePage', [
            'categories' => $categories,
            'subcategories'=>$subcategories
        ]);
    }
}
