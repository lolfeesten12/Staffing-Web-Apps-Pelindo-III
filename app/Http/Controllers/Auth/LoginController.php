<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
   
    // protected $redirectTo = RouteServiceProvider::HOME;
    
    protected function authenticated($request, $user)
    {
       $tes = $user->Pegawai->role;
       if($tes == 'HRD' || $tes == 'Direktur' || $tes == 'Kepala HRD'){
            return redirect('/dashboard');
       }elseif($tes == 'Kepala Unit' || $tes == 'Manager Unit' || $tes == 'Direktur Unit'){
            return redirect('/dashboardunit');
       }else{
            return redirect('/dashboard/pegawai');
       }
    }
  

    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
