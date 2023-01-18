<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function home(){
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        return view('menu.home');
    }

    public function show_product(Request $request){
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        $products = Product::where('name','like','%'.$request->search.'%')->simplepaginate(3)->withQueryString();
        return view('products.show-products',['products'=>$products]);
    }

    public function detail_product($id){
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        $product = Product::where('product_id',$id)->first();
        return view('products.detail-product',['product'=>$product]);
    }

    public function view_item(){
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        $products = Product::all();
        return view('products.view-item',['products'=>$products]);
    }

    public function update_item(){
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        return view('products.update-item');
    }

    public function view_add_item(){
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        $categories = Category::all();
        return view('products.add-item',['categories'=>$categories]);
    }

     public function add_item(Request $request){
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

         $request->validate([
             'productID' => ['required', Rule::unique('products', 'product_id')],
             'productName' => ['required','max:20',Rule::unique('products', 'name')],
             'productPrice' => ['numeric','required','min:1000'],
             'productDescription' => ['required','max:20'],
             'category'=>['required','integer','min:1','max:2'],
             'image'=>['required'],
         ]);

         $products = Product::all();
         $path =$request->file('image')->store('public/images');
         $split = explode('/',$path);
        Product::create(['product_id'=>$request->productID,
            'name'=>$request->productName,
            'price'=>$request->productPrice,
            'description'=>$request->productDescription,
            'image'=>'storage/images/'.$split[2],
            'category_id'=>$request->category]);
         return view('products.view-item',['products'=>$products]);
    }

    public function delete_product(Request $request)
    {
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        Product::where('product_id',$request->id)->delete();
        return redirect('view-item');
    }

    public function update_product_view($id)
    {
        if($locale = session('locale')){
            app()->setLocale($locale);
        }
     
        $product = Product::where('product_id',$id)->first();
        $categories = Category::all();
        return view('products.update-item',['product'=>$product,'categories'=>$categories]);
    }

    public function update_product(Request $request)
    {
        if($locale = session('locale')){
            app()->setLocale($locale);
        }

        $request->validate([
            'productID' => ['required'],
            'productName' => ['required','max:20'],
            'productPrice' => ['numeric','required','min:1000'],
            'productDescription' => ['required','max:20'],
            'category'=>['required','integer','min:1','max:2'],
            'image'=>['required'],
        ]);

        $path =$request->file('image')->store('public/images');
        $split = explode('/',$path);
        DB::table('products')->where('product_id',$request->productID)->update(
            [
                'name'=> $request->productName,
                'price' => $request->productPrice,
                'description'=>$request->productDescription,
                'image' => 'storage/images/'.$split[2],
                'category_id' => $request->category,
            ]
        );

        return redirect('view-item');
    }

}
