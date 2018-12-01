<?php

namespace App\Http\Controllers;

use App\newsletter;
use Illuminate\Http\Request;


class NewsletterMayoristaController extends Controller
{
    public function index()
    {
        $cpro= newsletter::all();
        return view('admin.newsletter.index',compact('cpro'));
    }
}
