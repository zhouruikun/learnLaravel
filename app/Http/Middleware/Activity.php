<?php
 namespace  App\Http\Middleware;
 class Activity
 {

     public function handle($request ,\Closure $next)
     {
         if (time()<strtotime('2018-03-15'))
         {
             return redirect('activity0');
         }
         return $next($request);
     }
 }