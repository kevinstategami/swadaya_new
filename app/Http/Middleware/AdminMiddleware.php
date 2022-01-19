<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next){
      if (Auth::check() && Auth::user()->type == 'ADMIN') {
          return $next($request);
          return redirect(route('backoffice'));
      }else{
        Session::flash('info', 'Gagal');
        Session::flash('colors', 'red');
        Session::flash('icons', 'fas fa-times');
        Session::flash('alert', 'Anda tidak memiliki akses!');
        return back();
    }
}
}
