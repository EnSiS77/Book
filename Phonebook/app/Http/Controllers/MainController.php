<?php

namespace App\Http\Controllers;

use App\Models\Contact;

use Illuminate\Http\Request;

class MainController extends Controller
{
    // Контроллеры к хэдеру
    public function home()
    {
        return view("home");
    }

    public function price()
    {
        return view("price");
    }

    public function faqs()
    {
        return view("faqs");
    }

    public function about()
    {
        return view("about");
    }


    public function review()
    {
        $reviews = new Contact();
        return view("review", ['reviews' => $reviews->all() ]);
    }



}

