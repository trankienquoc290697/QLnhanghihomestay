<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $user=User::all();
        return view('admin.account.index',compact('user'));
    }

    public function create()
    {
        $user = User::all();
        return view('admin.account.create',compact('user'));
    }

    public function store(Request $request)
    {
        
        $this->validate($request,
            [
                'name' => 'required|min:3|max:255',
                'email' => 'required|min:8|max:255',
                'password' => 'required|min:6|max:30',
                'passwordConfirm' => 'required|same:password',
                'phone' => 'required|min:10|max:11',
                'sex' => 'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng!',
                'name.min' => 'Tên người dùng phải có độ dài từ 3 - 255 ký tự!',
                'name.max' => 'Tên người dùng phải có độ dài từ 3 - 255 ký tự!',

                'email.required' => 'Bạn chưa nhập email!',
                'email.min' => 'Email phải có độ dài từ 8 - 255 ký tự!',
                'email.max' => 'Email phải có độ dài từ 8 - 255 ký tự!',

                'password.required' => 'Bạn chưa nhập mật khẩu!',
                'password.min' => 'Mật khẩu phải có độ dài từ 3 - 255 ký tự!',
                'password.max' => 'Mật khẩu phải có độ dài từ 3 - 255 ký tự!',
                'passwordConfirm.required' => 'Bạn chưa xác nhận mật khẩu!',
                'passwordConfirm.same' => 'Mật khẩu xác nhận không đúng!',

                'phone.required' => 'Bạn chưa nhập Số điện thoại!',
                'phone.unique' => 'Số điện thoại đã tồn tại!',
                'phone.min' => 'Số điện thoại không đúng!',
                'phone.max' => 'Số điện thoại không đúng!',

                'sex.required' => 'Hãy chọn giới tính của bạn!',

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

        $user= new User;
       
        $user->name = $request->name;
        $user->sex = $request->sex;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->password=bcrypt($request->passwordConfirm);
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $img = $request->file('image');
            $name = time().'.'.$img->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $img->move($destinationPath, $name);
            $user->image = $name;
        }
        $user->save();
        return redirect()->route('account.create')->with('thongbao','Tạo mới tài khoản thành công!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.account.edit',compact('user'));
    }


    public function update(Request $request, $id)
    {
        
        $this->validate($request,
            [
                'name' => 'required|min:3|max:255',
                'email' => 'required|min:3|max:255',
                'phone' => 'required|min:10|max:11',
                'sex' => 'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng!',
                'name.min' => 'Tên người dùng phải có độ dài từ 3 - 255 ký tự!',
                'name.max' => 'Tên người dùng phải có độ dài từ 3 - 255 ký tự!',

                'email.required' => 'Bạn chưa nhập email!',
                'email.min' => 'Email phải có độ dài từ 3 - 255 ký tự!',
                'email.max' => 'Email phải có độ dài từ 3 - 255 ký tự!',

                'phone.required' => 'Bạn chưa nhập Số điện thoại!',
                'phone.unique' => 'Số điện thoại đã tồn tại!',
                'phone.min' => 'Số điện thoại không đúng!',
                'phone.max' => 'Số điện thoại không đúng!',

                'sex.required' => 'Hãy chọn giới tính của bạn!',

                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

        $user=User::findOrFail(Auth::user()->id);
       
        $user->name = $request->name;
        $user->sex = $request->sex;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = Auth::user()->role;
        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $img = $request->file('image');
            $name = time().'.'.$img->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $img->move($destinationPath, $name);
            $user->image = $name;
        }

        if(isset($request->changePassword))
        {
            $this->validate($request,
                [
                'password' => 'required|same:password',
                'passwordOld' => 'required',
                'passwordNew' => 'required|min:6|max:30',
                'passwordConfirm' => 'required|same:passwordNew',
                ],
                [
                'password.required'=>'Bạn chưa nhập mật khẩu cũ!',
                'password.same'=>'Mật khẩu cũ không đúng!', 
                'passwordNew.required'=>'Bạn chưa nhập mật khẩu mới!', 
                'passwordNew.min'=>'Mật khẩu phải có độ dài từ 6 - 30 ký tự!',
                'passwordNew.max'=>'Mật khẩu phải có độ dài từ 6 - 30 ký tự!',
                'passwordConfirm.required'=>'Bạn chưa xác nhận mật khẩu!', 
                'passwordConfirm.same'=>'Mật khẩu xác nhận không đúng!', 
                ]);
            $user=User::findOrFail(Auth::user()->id);
            $user->password=bcrypt($request->passwordNew);
        }
        $user->save();
        return redirect()->route('account.edit',$id)->with('thongbao','Cập nhật tài khoản thành công!');
    }

    public function blockRole($id)
    {
        $user=User::findOrFail($id);
        if($user->role == 2)
            return redirect()->route('account.index')->with('thongbaoloi','Không thể thay đổi quyền của Admin!');
        else{
        $user->role = 0;
        $user->save();
        return redirect()->route('account.index')->with('thongbao','Block tài khoản thành công!');}
    }

    public function userRole($id)
    {   
        $user=User::findOrFail($id);
        if($user->role == 2)
            return redirect()->route('account.index')->with('thongbaoloi','Không thể thay đổi quyền của Admin!');
        else{
        $user->role = 1;
        $user->save();
        return redirect()->route('account.index')->with('thongbao','Quyền của tài khoản đã được phục hồi thành User!');}
    }

    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route('account.index')->with('thongbao','Xóa tài khoản thành công!');
    }

    public function userUpdate(Request $request, $id)
    {
        
        $this->validate($request,
            [
                'name' => 'required|min:3|max:255',
                'email' => 'required|min:3|max:255',
                'phone' => 'required|min:10|max:11',
                'sex' => 'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng!',
                'name.min' => 'Tên người dùng phải có độ dài từ 3 - 255 ký tự!',
                'name.max' => 'Tên người dùng phải có độ dài từ 3 - 255 ký tự!',

                'email.required' => 'Bạn chưa nhập email!',
                'email.min' => 'Email phải có độ dài từ 3 - 255 ký tự!',
                'email.max' => 'Email phải có độ dài từ 3 - 255 ký tự!',

                'phone.required' => 'Bạn chưa nhập Số điện thoại!',
                'phone.unique' => 'Số điện thoại đã tồn tại!',
                'phone.min' => 'Số điện thoại không đúng!',
                'phone.max' => 'Số điện thoại không đúng!',

                'sex.required' => 'Hãy chọn giới tính của bạn!',

                
            ]);

        $user=User::findOrFail(Auth::user()->id);
       
        $user->name = $request->name;
        $user->sex = $request->sex;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->phone = $request->phone;
        
        if(empty($request->passwordNew)){
            $user->password=bcrypt($request->passwordOld);
            }else{
                $this->validate($request,
                [
                'password' => 'required|same:password',
                'passwordOld' => 'required',
                'passwordNew' => 'required|min:6|max:30',
                'passwordConfirm' => 'required|same:passwordNew',
                ],  
                [
                'password.required'=>'Bạn chưa nhập mật khẩu cũ!',
                'password.same'=>'Mật khẩu cũ không đúng!', 
                'passwordNew.required'=>'Bạn chưa nhập mật khẩu mới!', 
                'passwordNew.min'=>'Mật khẩu phải có độ dài từ 6 - 30 ký tự!',
                'passwordNew.max'=>'Mật khẩu phải có độ dài từ 6 - 30 ký tự!',
                'passwordConfirm.required'=>'Bạn chưa xác nhận mật khẩu!', 
                'passwordConfirm.same'=>'Mật khẩu xác nhận không đúng!', 
                ]);
            $user->password=bcrypt($request->passwordNew);
        }
        
        $user->save();
        return redirect()->route('don-hang.showDonHang',1)->with('thongbaotaikhoan','Cập nhật tài khoản thành công!');
    }
}
