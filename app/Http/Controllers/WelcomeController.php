<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class WelcomeController extends Controller
{
    //
    public function index(){

        return view('index')->withCompany(Company::firstOrFail())->withPosts(Post::limit(3)->get());
    }

    public function blog(){
        return view('blog')->withCompany(Company::firstOrFail())->withPosts(Post::simplePaginate(4))
            ->withCategories(Category::all())->withTags(Tag::all());
    }

    public function about(){
        return view('about')->withCompany(Company::firstOrFail());
    }
    public function team(){
        return view('team')->withCompany(Company::firstOrFail())->withUsers(User::limit(4)->get());
    }
    public function contact(){
        return view('contact')->withCompany(Company::firstOrFail())->withUsers(User::limit(4)->get());
    }

    public function blogDetail($id){
        return view('blogDetails')->withPost(Post::findorfail($id))->withCompany(Company::firstOrFail());
    }
}
