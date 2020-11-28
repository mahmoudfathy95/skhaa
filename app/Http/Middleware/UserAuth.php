<?php

namespace App\Http\Middleware;

use App\Models\clients;

use App\Helpers\ApiResponseHelper;

use Closure;

class UserAuth
{
    use ApiResponseHelper;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd($request->bearerToken());
        try {
            $client = clients::where('api_token',$request->bearerToken())->get();
            //dd($client);
            if (count($client) == 0) {
                return $this->setCode(400)->setError('user_not_found')->send();
            }else{
                //$client = $client[0];
                return $next($request);
            }

        }
        catch (\Exception $e){
            return $this->setCode(400)->setError($e)->send();
        }

        //return $next($request);
    }
}
