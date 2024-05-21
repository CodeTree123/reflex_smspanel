<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use App\Models\doctor;
use App\Models\subscription;
use Carbon\Carbon;

class SubCheck
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
        $doc =  User::where('email','=',$request->email)->first();
        if($doc != null){
            if($doc->role == '0'){
                $doc_id = $doc->id;
                $sub_info = subscription::where('d_id',$doc_id)->first();
                $today = Carbon::today();
                $formatted_today = Carbon::createFromFormat('Y-m-d H:i:s',$today);
                $sub_check = $sub_info->end;
                if($sub_check != null){
                    $formatted_subcheck = Carbon::createFromFormat('Y-m-d H:i:s',$sub_check);
                    if($sub_info->status != '0'){
                        if($formatted_today->gt($formatted_subcheck)){
                            $sub_info->status = 0;
                            $sub_info->update();
                            return $next($request);
                        }else{
                            return $next($request);
                        }
                    }else{
                        return $next($request);
                    }
                }else{
                    return $next($request);
                }
            }else{
                return $next($request);
            }
        }else{
            return $next($request);
        }
    }
}
