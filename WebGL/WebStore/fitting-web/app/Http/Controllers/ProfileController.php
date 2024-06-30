<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ]);


        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');

        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = $request->input('new_password');
            } else {
                return redirect()->back()->withInput();
            }
        }

        $user->save();

        return redirect()->route('profile')->withSuccess('Profile updated successfully.');
    }

    public function updateinfo(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->height = $request->input('height');
        $user->weight = $request->input('weight');
        $user->v1 = $request->input('v1');
        $user->v2 = $request->input('v2');
        $user->v3 = $request->input('v3');

        $user->save();

        $userData = [
            'id' => $user->id,
            'height' => $request->input('height'),
            'weight' => $request->input('weight'),
            'v1' => $request->input('v1'),
            'v2' => $request->input('v2'),
            'v3' => $request->input('v3'),
        ];

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
            'height' => $request->input('height'),
            'weight' => $request->input('weight'),
            'v1' => $request->input('v1'),
            'v2' => $request->input('v2'),
            'v3' => $request->input('v3'),
        ];

        $userFound = false;
        // foreach ($existingData as $key => $existingUser) {
        //     if ($existingUser['id'] === $userData['id']) {
        //         $userFound = true;
        //         $existingData[$key] = $userData; 
        //         break; 
        //     }
        // }
        if (!$userFound) {
            $existingData[] = $userData;
        }
        // $newData = [];
        $newData = $userData;

        writeJsonData($jsonPath, $newData);
        // writeJsonData($jsonPath, []);
        // writeJsonData($jsonPath, $existingData);
        // if ($userFound) {
        //     echo "User data updated successfully.";
        // } else {
        //     echo "New user data added.";
        // }
        return redirect()->route('profile')->withSuccess("Số đo đã được cập nhật");
    }
}
