<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function onLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        } else {
            \Log::error('Login failed for username: ' . $request->username);
            $alert = [
                'title' => 'error',
                'icon' => 'error',
                'text' => 'username atau password anda salah!'
            ];
            return back()->with('alert',$alert);
        }
    }

    public function logOut(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function user(Request $request)
    {
        $title = 'Data User';
        if($request->ajax())
        {
            $user = User::all();
            return DataTables::of($user)
            ->make(true);
        }
        return view('user.user',compact('title'));
    }
    
    public function addUser(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required|min:2',
            'username' => 'required|unique:users',
            'password' => 'required',
            'profile' => 'image|mimes:jpg,jpeg,png,svg,webp',
            'role' => 'required',
        ]);
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        if ($request->hasFile('picture')) {
            $file = $request->file('profile');
            $oriname = $file->getClientOriginalName();
            $file->storeAs('public/profil', $oriname);
            $user->profile = $oriname;
        } else {
            $user->profile = 'default_profil.png';
        }
        
        $user->save();
        \Artisan::call('storage:link');
        return response()->json(['status'=>200]);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        if($request->filled('password')){
            $user->password = bcrypt($request->password);
        }
        if($request->hasFile('profile')){
            $path = 'profil/'.$user->profile;
            if(Storage::disk('public')->exists($path)){
                Storage::disk('public')->delete($path);
            }
            $oriname = $request->profile->getClientOriginalName();
            $pict = $request->file('profile')->storeAs('public/profil',$oriname);
            $user->profile = $oriname;
        }
        $user->username = $request->username;
        $user->name = $request->name;
        $user->role = $request->role;
        $user->save();
        return response()->json(['status' => 200]);
    }

    public function deleteUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['status' => 200]);
    }
}
