<?php

namespace imake\Http\Controllers\Auth;

use imake\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use imake\Factories\ActivationFactory;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
    protected $activationFactory;
    protected $redirectTo = '/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ActivationFactory $activationFactory)
    {
        $this->redirectTo = '/'.LaravelLocalization::getCurrentLocale().'/account';
        $this->activationFactory = $activationFactory;
        $this->middleware('guest')->except('logout');
    }

    //Add method `activateUser()`:
    public function activateUser($token)
    {
        if ($user = $this->activationFactory->activateUser($token)) {
            auth()->login($user);
            return redirect($this->redirectPath());
        }
        abort(404);
    }




    public function authenticated(Request $request, $user)
    {
        if (!$user->activated) {
            $this->activationFactory->sendActivationMail($user);
            auth()->logout();
            return back()->with('activationWarning', true);
        }
        return redirect()->intended($this->redirectPath());
    }
}
