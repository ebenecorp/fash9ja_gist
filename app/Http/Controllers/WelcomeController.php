<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class WelcomeController extends Controller
{
    //
    public function index(){

        return view('welcome')->withCompany(Company::firstOrFail())->withPosts(Post::limit(3)->get());
    }

    public function blog(){
        return view('blog')->withCompany(Company::firstOrFail())->withPosts(Post::all())
            ->withCategories(Category::all())->withTags(Tag::all());
    }

    public function about(){
        return view('about')->withCompany(Company::firstOrFail());
    }
    public function team(){
        return view('team')->withCompany(Company::firstOrFail());
    }
    public function contact(){
        return view('contact')->withCompany(Company::firstOrFail());
    }
}
