<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    public function index() {
        return view('product.index', [
            'products' => \App\Models\Product::where('status', 'AVAILABLE')->get(),
        ]);
    }

    public function random() {
        return view('welcome', [
            'products' => \App\Models\Product::where('status', 'AVAILABLE')->inRandomOrder()->limit(3)->get(),
        ]);
    }

    public function show($id) {
        $product = \App\Models\Product::find($id);
        return view('product.show', [
            'product' => $product,
            'owner' => \App\Models\User::where('id', $product->owner_id)->get()->first()
        ]);
    }


    public function create() {
        return view('product.create', ['productCategory' => \App\Models\ProductCategory::all()]);
    }


    public function delete(Request $request, \App\Models\Product $product) {
        try{
            $delete = $product::where('id', $request->input('product_id'))->delete();
            return redirect('/account');
        } catch(Exception $e){
            return redirect('/');
        }
    }


    public function store(Request $request, \App\Models\Product $product) {

        $fileIndex = 0;
        foreach($request->file('images') as $file) {

            $file = $request->file('images');
            $filename = date('YmdHis').$fileIndex.$file[$fileIndex]->getClientOriginalName();
            $file[$fileIndex]->move('img/products', $filename);

            $fileIndex++;
            $data[] = $filename;
        }

        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->category = $request->input('category');
        $product->cost = $request->input('cost');
        $product->max_borrow_days = $request->input('max_days');
        $product->owner_id = Auth::user()->id;
        $product->images = json_encode($data);

        try{
            $product->save();
            return redirect('/product');
        } catch(Exception $e){
            return redirect('/account');
        }
    }
}
