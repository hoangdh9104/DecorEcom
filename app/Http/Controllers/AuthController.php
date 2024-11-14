<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    const PATH_VIEW = "auth/";
    public function login()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }
    public function postLogin(Request $request)
    {
        // dd($request->except('_token'));
        $data = $request->except('_token');
        // Auth::attempt($data) là một phương thức trong Laravel được sử dụng để xác thực người dùng
        // sdung lớp use Illuminate\Support\Facades\Auth;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1])) {
            return redirect()->route('homeClient')->with('message', 'Đăng nhập thành công');
        } else {
            return redirect()->back()->with('message', 'Đăng nhập không thành công');
        }
        // Xử lý đăng nhập
    }
    public function register()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }
    public function postRegister(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'username' => ['required', 'min:3', 'unique:users'],
            'fullname' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:6'],
            'confirm_password' => ['required', 'same:password'],
            'avatar' => 'nullable|image|max:4048',
        ]);
        // Mã hóa mật khẩu
        $data['password'] = bcrypt($data['password']);
        try {
            // xử lý hình ảnh
            if ($request->hasFile('avatar')) {
                $data['avatar'] = Storage::put('users', $request->file('avatar'));
            }
            // dd($data);
            User::query()->create($data);
            return redirect()->route('login')->with('message', 'đăng ký thành công');
        } catch (\Throwable $th) {
            //case fail thêm mới thì xóa ảnh trong app/public/storage/....
            if (!empty($data['avatar']) && Storage::exists($data['avatar'])) {
                Storage::delete($data['avatar']);
            }
            dd($th->getMessage());
        }
    }
    public function logout(Request $request)
    {
        // Laravel built-in auth logout
        Auth::logout();

        // Xóa session để đảm bảo đăng xuất hoàn toàn
        $request->session()->invalidate();

        // Tạo lại session để tránh session fixation attack
        $request->session()->regenerateToken();

        // Chuyển hướng người dùng về trang login hoặc trang chủ
        return redirect('/login')->with('message', 'đăng xuất thành công');
    }
    public function dashboard()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }
    public function edit()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }
    public function changePassword()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }
    public function changedPassword(Request $request)
    {

        $request->validate([
            'new_password' => ['required', 'min:6', 'different:current_password'],
            'confirm_password' => ['required', 'same:new_password'],
        ]);
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            // Nếu mật khẩu hiện tại không đúng, trả về lỗi
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.']);
        }
        try {
            $data['password'] = bcrypt($request['new_password']);
            User::query()->where('id', Auth::user()->id)->update($data);
            return redirect()->back()->with('message', 'thao tác thành công');
        } catch (\Throwable $th) {
            //throw $th;
        }
        // dd($data);
        // return view(self::PATH_VIEW . __FUNCTION__);
    }
    public function update(Request $request)
    {
        // dd(Auth::user()->id);
        $data = $request->validate([
            'username' => ['required', 'min:3', Rule::unique('users')->ignore(Auth::user()->id)],
            'fullname' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id)],
            'avatar' => 'nullable|image|max:4048',
        ]);
        try {
            // xử lý hình ảnh
            if ($request->hasFile('avatar')) {
                // $data['avatar'] = Storage::put('users', $request->file('avatar'));
                $data['avatar'] = $request->file('avatar')->store('users');
            }
            $currentAvatar = Auth::user()->avatar;
            // cập nhật đối tượng ấy
            if ($request->hasFile('avatar') && !empty($currentAvatar) && Storage::exists($currentAvatar)) {
                Storage::delete($currentAvatar);
            }
            // Auth::user()->update($data);
            User::query()->where('id', Auth::user()->id)->update($data);
            return redirect()->back()->with('message', 'thao tác thành công');
        } catch (\Throwable $th) {
            //case fail thêm mới thì xóa ảnh trong app/public/storage/....
            if (!empty($data['avatar']) && Storage::exists($data['avatar'])) {
                Storage::delete($data['avatar']);
            }
            dd($th->getMessage());
        }
    }
}
