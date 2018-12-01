<?php

namespace App\Http\Controllers;

use App\newsletters_mayorista;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $cpro= newsletters_mayorista::all();
        return view('admin.newsletter.index',compact('cpro'));
    }
}
