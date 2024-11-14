<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    const PATH_VIEW = "admin/users";
    public function index()
    {
        $data = User::latest('id')->paginate(2);
        return view(self::PATH_VIEW . '.' . __FUNCTION__, compact('data'));
    }
    public function create()
    {
        return view(self::PATH_VIEW . '.' . __FUNCTION__);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'username' => ['required', 'min:3', 'unique:users'],
            'fullname' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users'],
            'role' => ['required'],
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
            return redirect()->route('users.index')->with('message', 'đăng ký thành công');
        } catch (\Throwable $th) {
            //case fail thêm mới thì xóa ảnh trong app/public/storage/....
            if (!empty($data['avatar']) && Storage::exists($data['avatar'])) {
                Storage::delete($data['avatar']);
            }
            dd($th->getMessage());
        }
    }
    // Display the specified resource.
    public function show(User $user)
    {
        // Code to show a specific user
        return view(self::PATH_VIEW . '.' . __FUNCTION__, compact('user'));
    }
    public function edit(User $user)
    {
        return view(self::PATH_VIEW . '.' . __FUNCTION__, compact('user'));
    }
    public function update(Request $request, User $user)
    {
        // dd(Auth::user()->id);
        $data = $request->validate([
            'username' => ['required', 'min:3', Rule::unique('users')->ignore($user->id)],
            'fullname' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'avatar' => 'nullable|image|max:4048',
        ]);
        try {
            // xử lý hình ảnh
            if ($request->hasFile('avatar')) {
                // $data['avatar'] = Storage::put('users', $request->file('avatar'));
                $data['avatar'] = $request->file('avatar')->store('users');
            }
            $currentAvatar = $user->avatar;
            // cập nhật đối tượng ấy
            if ($request->hasFile('avatar') && !empty($currentAvatar) && Storage::exists($currentAvatar)) {
                Storage::delete($currentAvatar);
            }
            // Auth::user()->update($data);
            $user->update($data);
            return redirect()->back()->with('message', 'thao tác thành công');
        } catch (\Throwable $th) {
            //case fail thêm mới thì xóa ảnh trong app/public/storage/....
            if (!empty($data['avatar']) && Storage::exists($data['avatar'])) {
                Storage::delete($data['avatar']);
            }
            dd($th->getMessage());
        }
    }
    // Update the specified resource in storage.
    public function deactived(Request $request, User $user)
    {
        //  dd($request->all());
        $data = $request->except('_token', '_method');
        //  dd($data);
        $user->update($data);
        return redirect()->route('users.index')->with('message', 'thao tác thành công');
    }
    public function actived(Request $request, User $user)
    {
        //  dd($request->all());
        $data = $request->except('_token', '_method');
        //  dd($data);
        $user->update($data);
        return redirect()->route('users.index')->with('message', 'thao tác thành công');
    }
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with('message', 'thao tác thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('message', $th->getMessage());
        }
    }
}
