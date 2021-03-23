<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Post;

class WelcomeController extends Controller
{
    //
    public function index(){

        return view('welcome')->withCompany(Company::firstOrFail())->withPosts(Post::limit(3)->get());
    }

}
