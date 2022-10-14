<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Token;

class AuthToken
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
        $acc = $request->header('ACC');
        $token = $request->header('APP-KEY');
        if(empty($acc) || empty($token))
            return response()->json(['message'=>'Token is not exist']);
        else{
            $t = new Token();
            $dataT =$t->getToken($acc);
            $getData = $dataT[0];
            if($token == $getData->Token)
                return $next($request);
            return response()->json(['message'=>'Token is not right']);
        }
    }
}
