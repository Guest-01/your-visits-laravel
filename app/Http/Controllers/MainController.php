<?php

namespace App\Http\Controllers;

use App\Models\Ip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index()
    {
        // process present IP
        $ip = Ip::firstOrNew(
            ['ip' => request()->ip()],
            ['count' => 0]
        );

        $ip->count += 1;

        if (auth()->check()) {
            $ip->user_id = auth()->id();
        }
        $ip->save();

        $ips = null; // get all IPs if logged in
        if (auth()->check()) {
            $ips = Ip::where('user_id', auth()->id())->get();
        }

        return view('home', ['ip' => $ip, 'ips' => $ips]);
    }

    public function login()
    {
        return view('login');
    }

    public function login_post(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($request->only('name', 'password'))) {
            return back()->with('status', '이름 혹은 패스워드가 틀렸습니다');
        }

        return redirect()->route('index');
    }

    public function signup()
    {
        return view('signup');
    }

    public function signup_post(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);

        auth()->attempt($request->only('name', 'password'));

        return redirect()->route('index');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('index');
    }
}
