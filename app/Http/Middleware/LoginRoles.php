<?php

namespace App\Http\Middleware;

use Closure;

class LoginRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$namaRole)
    {
        //$roles = App\Role::all('nama_role');
        // foreach($roles as $role){
        //     if($request->role()->getRoleUser()===$role){
        //         return redirec;
        //     }
            if(!$request->user()->hasRole($namaRole)) {
               
                return redirect ('/home');
            }
        

        return $next($request);
    }
}
