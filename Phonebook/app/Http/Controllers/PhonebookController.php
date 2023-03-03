<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Models\Phonebook;

class PhonebookController extends Controller
{
    

    public function book()
    {
        // $users = Phonebook::all();

        // $users = Phonebook::where('user_id', Auth::id())->get();

        $users = Phonebook::orderBy('name')->paginate(10);
        return view('book', compact('users'));
    }

    public function create()
    {

        return view('phonebook.create');
        
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|min:5|max:100',
            'phone' => 'required|min:5|max:20', 'regex:/^[0-9]$/',
        ], [
            'phone.regex' => 'Номер телефона не может быть меньше 8 или больше 20 элементов и может иметь только чилсовое значение.'
        ]);


        $users = new Phonebook();
        $users->user_id = Auth::id();
        $users->name = $validatedData['name'];
        $users->email = $validatedData['email'];
        $users->phone = $validatedData['phone'];
        $users->save();



    }

    public function edit($id)
    {

        $users = Phonebook::find($id);


        if (!$users || $users->id != Auth::id()) {
            abort(404);
        }


        return view('phonebook.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {

        $users = Phonebook::find($id);


        if (!$users || $users->id != Auth::id()) {
            abort(404);
        }


        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|min:5|max:100',
            'phone' => 'required|min:8|max:20',
        ]);


        $users->name = $validatedData['name'];
        $users->email = $validatedData['email'];
        $users->phone = $validatedData['phone'];
        $users->save();


        $users = Phonebook::create($validatedData);

        if ($users) {
            return redirect()->route('book')->with('success', 'Контакт был успешно создан!');
        } else {
            return redirect()->route('phonebook.create')->with('error', 'Failed to create contact.');
        }

        return redirect()->route('book');

        
    }

    public function destroy($id)
    {

        $users = Phonebook::find($id);


        if (!$users || $users->id != Auth::id()) {
            abort(404);
        }


        $users->delete();


        return redirect()->route('book');
    }
}
