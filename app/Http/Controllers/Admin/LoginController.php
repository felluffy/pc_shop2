<?php
namespace App\Http\Controllers\Admin;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    //direct admins after login
    //@var string
    protected $redirectTo = '/admin';

    //create new controller instance
    //@return void
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLogin()
    {
        
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt([
            'name' => $request->name,
            'password' => $request->password,
        ], $request->get('remember'))) {
            return redirect()->intended(route('admin.dashboard'));
        };
        return back()->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }
}
