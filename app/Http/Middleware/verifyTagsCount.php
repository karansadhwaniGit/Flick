<?php

namespace App\Http\Middleware;

use App\Models\Tag;
use Closure;
use Illuminate\Http\Request;

class verifyTagsCount
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
        if(Tag::count()===0){
            session()->flash('error','Minimum one tag must exist to create a post!');
            return redirect(route('tags.create'));
        }
        return $next($request);
    }
}
