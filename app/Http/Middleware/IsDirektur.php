<?php

namespace App\Http\Middleware;

use App\Models\MasterData\MasterPegawai;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsDirektur
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
        $pegawai_role = MasterPegawai::where('id_pegawai', Auth::user()->id_pegawai)->first()->role;
        if($pegawai_role == 'Direktur'){
            return $next($request);
        }

        return redirect('/');
    }
}
