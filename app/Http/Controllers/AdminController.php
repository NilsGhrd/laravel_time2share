<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index', [
            'users' => \App\Models\User::where('id' ,'!=', Auth::User()->id)->get(),
            'products' => \App\Models\Product::all(),
        ]);
    }

    public function deleteProduct($id, \App\Models\Product $product) {
        try{
            $delete = $product::where('id', $id)->delete();
            return redirect('/admin');
        } catch(Exception $e){
            return redirect('/');
        }
    }

    public function updateUser($id, \App\Models\User $user) {
        if($user::where('id', $id)->get()->first()->blocked){
            $blocked = FALSE;
        } else {
            $blocked = TRUE;
        }

        try{
            $user::where('id', $id)->update(['blocked' => $blocked]);
            return redirect('/admin');
        } catch(Exception $e){
            return redirect('/');
        }
    }
}
