<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login()
    {

       return view('admin.auth.login');
    }
    public function doLogin(Request $request)
    {
        $data=$request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
          ]);
          //attept return false if not login

          if (! Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']]))
          {
               return back();
          }
          else
          {
                  return redirect(route('admin.home'));
          }
     }

  public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect(route('admin.login'));

    }


}
