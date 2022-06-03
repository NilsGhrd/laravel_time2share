<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ReviewController extends Controller
{
    public function show() {
        $reviews = \App\Models\Review::where('account_id', Auth::user()->id)->get();
        $total = 0;
        for($i = 0; $i < count($reviews); $i++) {
            $total += $reviews[$i]->review_score;
        }

        if(!$total == 0){
            $average = $total / count($reviews);
        } else {
            $average = null;
        }

        return view('account.review', [
            'reviews' => $reviews,
            'average' => round($average),
        ]);
    }

    public function create($id) { 
        return view('account.create', [
            'id' => $id,
        ]);
    }

    public function store(Request $request, \App\Models\Review $review) {
        $review->account_id = $request->input('account_id');
        $review->reviewer_id = Auth::user()->id;
        $review->review_title = $request->input('title');
        $review->review_description = $request->input('description');
        $review->review_score = intval($request->input('score'));
        
        try{
            $review->save();
            return redirect('/account');
        } catch(Exception $e){
            return redirect('/');
        }
    }
}
