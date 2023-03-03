<?php

namespace App\Http\Controllers;

use App\Models\Phonebook;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $s = $request->s;
        $users = Phonebook::where('name', 'LIKE', "%{$s}%")
                            ->orWhere('phone', 'LIKE', "%{$s}%")
                            ->orWhere('email', 'LIKE', "%{$s}%")
                            ->orderBy('name')->paginate(10);

        return view('book', compact('users'));
    }
}


// ->orderBy('name')->paginate(10);