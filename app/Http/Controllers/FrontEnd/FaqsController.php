<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    public function index()
    {
        $title = 'FAQs';
        return view('frontend.faqs.index', compact(['title']));
    }
}
