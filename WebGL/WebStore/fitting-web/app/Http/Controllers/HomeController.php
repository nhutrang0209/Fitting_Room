<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cloth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
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
        $user = Auth::user();
        function readJsonData($filename) {
            $jsonData = file_get_contents($filename);
            return json_decode($jsonData, true); 
        }

        function writeJsonData($filename, $data) {
            $jsonData = json_encode($data, JSON_PRETTY_PRINT); 
            file_put_contents($filename, $jsonData);
        }

        $jsonPath = base_path('user-data.json');

        $existingData = readJsonData($jsonPath);

        $userData = [
            'id' => $user->id,
            'height' => $user->height,
            'weight' => $user->weight,
            'v1' => $user->v1,
            'v2' => $user->v2,
            'v3' => $user->v3,
        ];

        $userFound = false;
        if (!$userFound) {
            $existingData[] = $userData;
        }

        $newData = $userData;

        writeJsonData($jsonPath, $newData);
        // writeJsonData($jsonPath, []);
        // writeJsonData($jsonPath, $existingData);
        // if ($userFound) {
        //     echo "User data updated successfully.";
        // } else {
        //     echo "New user data added.";
        // }
        // return redirect()->route('profile')->withSuccess("Số đo đã được cập nhật");
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
