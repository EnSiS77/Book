<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
        // Контроллер к отзывам
        public function review_check(Request $request) 
        {
            $valid = $request->validate([
                'email' => 'required|min:4|max:100',
                'subject' => 'required|min:4|max:100',
                'message' => 'required|min:10|max:500',
            ]);
    
            $review = new Contact();
            $review->email = $request->input('email');
            $review->subject = $request->input('subject');
            $review->message = $request->input('message');
    
            $review->save();
    
            return redirect()->route('review');
    
        }
}
