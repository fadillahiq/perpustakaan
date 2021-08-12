<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
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
        return view('home');
    }

    public function profile_get($id)
    {
        $user = User::find($id);

        return view('profile', compact('user'));
    }

    public function profile_post(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required|max:64',
            'email' => 'unique:users,email,'.$user->id
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->bio = $request->bio;
        $user->update();

        return redirect()->back()->withSuccess('Profile berhasil diperbarui!');
    }

    public function change_password_view()
    {
        return view('changepassword');
    }

    public function change_password_post(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password']
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        return redirect()->back()->withSuccess('Password berhasil diperbarui!');
    }

    public function change_avatar_view($id)
    {
        $user = User::find($id);
        return view('changeavatar', compact('user'));
    }

    public function change_avatar_post(Request $request, $id)
    {

        $user = User::find($id);

        $nm = $request->avatar;
        $this->validate($request, [
            'avatar' => 'required|image|max:2048|mimes:png,jpg,svg'
        ]);

        $namaFile = time().rand(100,999).".".$nm->getClientOriginalExtension();

        $user->avatar = $namaFile;

        $nm->move(public_path().'/avatars', $namaFile);
        $user->update();

        return redirect()->back()->withSuccess('Avatar berhasil diperbarui!');
    }
}
