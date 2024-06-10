<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cloth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $clothes = Cloth::all();
        $widget = [
            'users' => $users,
            'clothes' => $clothes
        ];
        return view('home', compact('widget'));
    }

    public function filter_full($sex, $shirt){
        $users = User::count();
        $clothes = Cloth::where([
            ['shirt', $shirt],
            ['sex', $sex]
        ])->get();
        $widget = [
            'users' => $users,
            'clothes' => $clothes
        ];
        return view('home', compact('widget'));
    }

    public function filter($sex, $type)
    {
        $users = User::count();
        $clothes = Cloth::where([
            ['type', $type],
            ['sex', $sex]
        ])->get();
        $widget = [
            'users' => $users,
            'clothes' => $clothes
        ];
        return view('home', compact('widget'));
    }

    public function detail($id)
    {
        $cloth = Cloth::findOrFail($id);
        $widget = [
            'cloth' => $cloth,
        ];
        
        return view('detail', compact('widget'));
    }
}
