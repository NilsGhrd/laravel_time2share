<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{
    public function show() {
        $renter = \App\Models\ProductLink::select('product_id')->where('renter_id', Auth::user()->id)->get();
        $owner = \App\Models\ProductLink::select('product_id')->where('owner_id', Auth::user()->id)->get();

        $rentArray = [];
        $ownerArray = [];

        for($i = 0; $i < count($renter); $i++) {
            array_push($rentArray, json_decode($renter[$i]['product_id']));
        }

        for($i = 0; $i < count($owner); $i++) {
            array_push($ownerArray, json_decode($owner[$i]['product_id']));
        }

        $index = \App\Models\History::where('renter_id', Auth::user()->id)->get();
        $historyAccounts = [];

        if($index != '[]'){
            for($i = 0; $i < count($index); $i++) {
                array_push($historyAccounts, \App\Models\User::where('id', \App\Models\History::where('renter_id', Auth::user()->id)->get()->first()->owner_id)->get()[0]);
            }
        } else {
            $historyAccounts = [];
        }

        return view('account.account', [
            'account' => \App\Models\User::find(Auth::user()->id),
            'advertisedProducts' => \App\Models\Product::where('owner_id', Auth::user()->id)->where('status', 'AVAILABLE')->get(),
            'lentProducts' => \App\Models\Product::whereIn('id', $ownerArray)->get(),
            'rentedProducts' =>  \App\Models\Product::whereIn('id', $rentArray)->get(),
            'history' => \App\Models\History::where('renter_id', Auth::user()->id)->get(),
            'historyAccounts' => $historyAccounts,
        ]);
    }
    

    public function create(Request $request, \App\Models\ProductLink $link, \App\Models\Product $product) {
        $link->product_id = $request->input('product_id');
        $link->product_title = $product::select('title')->where('id', $request->input('product_id'))->get()->first()->title;
        $link->owner_id = $request->input('owner_id');
        $link->renter_id = $request->input('renter_id');

        try{
            $link->save();
            $product::where('id', $link->product_id)->update(['status' => 'RENTED_OUT']);
            return redirect('/account');
        } catch(Exception $e){
            return redirect('/product');
        }
    }

    public function update(Request $request, \App\Models\Product $product, \App\Models\History $history, \App\Models\ProductLink $link) {
        if($request->input('status_type') == 'RENTED_OUT') {
            try{
                $product::where('id', $request->input('product_id'))->update(['status' => 'RETURNED']);
                return redirect('/account');
            } catch(Exception $e){
                return redirect('/');
            }
        } elseif ($request->input('status_type') == 'RETURNED') {
            $history->product_title = $product::where('id', $request->input('product_id'))->get()->first()->title;
            $history->owner_id = Auth::user()->id;
            $history->renter_id = $link::select('renter_id')->where('owner_id', Auth::user()->id)->where('product_id', $request->input('product_id'))->get()->first()->renter_id;

            try{
                $history->save();
                $delete = $link::where('product_id', $request->input('product_id'))->delete();
                return redirect('/account');
            } catch(Exception $e){
                return redirect('/');
            }
        }  
    }
}
