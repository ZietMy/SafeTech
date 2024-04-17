<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    protected $user;
    public function __construct()
    {
        $this->user = new User();
    }
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function index()
    { 
        $title = 'Profile';
        if(Auth::check())
        {
            $userId = Auth::id();
            $user = User::find($userId);
        }
        return view('clients.profile',compact('title','user'));
    }
    public function getEdit()
    {
        $title = 'Update profile';
        if(Auth::check())
        {
            $userId = Auth::id();
            $user = User::find($userId);
        }
        return view('clients.updateProfile',compact('title','user'));
    }
    public function postEdit(Request $request){
       if(Auth::check()){
        $id = Auth::id();
        $request->validate([
            'name' => 'required|min:5',
            'username' => 'required|min:5',
            'email' => 'required',
            'phone_number' => 'required|min:11',
            'address' => 'required'
        ], [
            'name.required' => 'Tên là trường bắt buộc.',
            'name.min' => 'Tên phải có ít nhất 5 ký tự.',
            'username.required' => 'Tên người dùng là trường bắt buộc.',
            'username.min' => 'Tên người dùng phải có ít nhất 5 ký tự.',
            'email.required' => 'Email là trường bắt buộc.',
            'phone_number.required' => 'Số điện thoại là trường bắt buộc.',
            'phone_number.min' => 'Số điện thoại phải có ít nhất 10 ký tự.',
            'address.required' => 'Địa chỉ là trường bắt buộc.'
        ]);
    
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address
        ];
        $user =  DB::table('users')->where('id',$id)->update($data);;
       }
        return redirect()->route('profile.user')->with('msg', 'Cập nhật thành công');
    }
    
}
