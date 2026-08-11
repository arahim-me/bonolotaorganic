<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Policy_type;

class ContactController extends Controller
{
    public function index()
    {
        $title = 'Contact Us';
        $policies = Policy_type::all();

        return view('frontend.contact.index', compact(['title', 'policies']));
    }
}
