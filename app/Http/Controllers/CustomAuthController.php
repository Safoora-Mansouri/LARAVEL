<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnSelf;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.create');
    }
    ////////////////////////////////////////////////////////////////////////////////
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  return $request;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|max:20'
        ]);
        //if faux redirect()->back()->withErrors()->withInputs()
        $User =  new User;
        $User->fill($request->all());
        $User->password = Hash::make($request->password);
        $User->save();

        // ????????????????????
        //baraye tp2 estefadeh mishe//
        // $e =  new Etudient;
        // $e->fill($request->all());
        // $e->password = Hash::make($request->password);
        // $e->save();


        return redirect(route('login'))->withSuccess(trans('lang.text_success_user'));
    }
    /////////////////////////////////////////////////////////////////////////

    public function authentication(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        // return $credentials;
        if (!Auth::validate($credentials)) {
            //as trans estafadeh mikonim baraye tarjomeh
            // return redirect()->back()->withErrors(trans('auth.failed'));
            return redirect()->back()->withErrors(trans('auth.password'));
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return redirect()->intended(route('etudient.index'));
    }



    /////////////////////////////////////////////////////////////////
    public function logout()
    {
        Auth::logout();
        return redirect()->intended(route('login'));
    }
    ////////////////////////////////////////////////////////////////////
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
    public function userList()
    {

        $users = User::select('id', 'name')
            ->orderby('name')
            ->paginate(5);

        // return $users;  //?????

        return view('auth.user-list', ['users' => $users]);
    }
}
