<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // kiểm tra session user admin đăng nhập nếu đúng thì đi tiếp
        if($request->session()->has('user_id')){
            return $next($request);
        }
        
        // ngược lại sẽ về trang đăng nhập
        return response()->view('admin.login');

    }
}
