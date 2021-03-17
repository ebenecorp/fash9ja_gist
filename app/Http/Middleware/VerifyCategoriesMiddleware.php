<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Category;

class VerifyCategoriesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( Category::all()->count() === 0){

            session()->flash('message', 'Category must be created before creating a post');

            return redirect(route('category.create'));
        }

        return $next($request);
    }
}
