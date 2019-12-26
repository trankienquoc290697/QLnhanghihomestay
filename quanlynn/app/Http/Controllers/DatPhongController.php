<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DatPhong;
use App\Users;
use App\Phong;
use App\ChiTietDatPhong;
use App\NhaNghi;

class DatPhongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $datphong = DatPhong::all();
         $nhanghi = NhaNghi::all();
        return view('datphong.index',compact('datphong','nhanghi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
      $datphong = DatPhong::all();
        return view('datphong.create',['datphong'=>$datphong]);
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
  $this ->validate ($request,
            [
              


            ],
            [
                'quocgia.required'=>'ban chưa nhập tên quốc gia',
                'quocgia.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'quocgia.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',

                'quanhuyen.required'=>'ban chưa nhập tên quận huyện',
                'quanhuyen.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'quanhuyen.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',

                'thanhpho.required'=>'ban chưa nhập tên thành phố',
                'thanhpho.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'thanhpho.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',
            ]);
        $datphong= new DatPhong;
        $datphong->ten= $request->quocgia;
        $datphong->diachi= $request->quanhuyen;
        $datphong->ngaytra= $request->ngaytra;
        $datphong->ngaynhan= $request->ngaynhan;
        $datphong->trangthai= $request->trangthai;
        $datphong-> save();

        return redirect()->route('datphong.create')->with('thongbao','Đật phòng thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $datphong = DatPhong::findOrFail($id);
        return view('datphong.edit',compact('datphong'));
    }

    public function show($id){
    	$datphong = DatPhong::findOrFail($id);
        $ctdp = ChiTietDatPhong::where('datphong_id',$id)->get();
        $usr = User::findOrFail($datphong->users_id);

        return view('datphong.detail',compact('datphong','ctdp','usr'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request,$id)
    {   
          $datphong= DatPhong::findOrFail($id);
        $this ->validate ($request,
            [
              

            ],
            [
                'quocgia.required'=>'ban chưa nhập tên quốc gia',
                'quocgia.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'quocgia.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',

                'quanhuyen.required'=>'ban chưa nhập tên quận huyện',
                'quanhuyen.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'quanhuyen.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',

                'thanhpho.required'=>'ban chưa nhập tên thành phố',
                'thanhpho.min'=>'tên phải có độ dài từ 3 đến 100 ký tự',
                'thanhpho.max'=>'tên phải có độ dài từ 3 đến 100 ký tự',
            ]);

        $datphong= DatPhong::FindOrFail($id);
        $datphong->ten= $request->quocgia;
        $datphong->diachi= $request->quanhuyen;
        $datphong->ngaytra= $request->ngaytra;
        $datphong->ngaynhan= $request->ngaynhan;
        $datphong->trangthai= $request->trangthai;
        $datphong-> save();

        return redirect()->route('datphong.edit',$id)->with('thongbao','Đặt phòng thành công');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datphong = DatPhong::findOrFail($id);
        $datphong->delete();
        return redirect()->route('datphong.index')->with('thongbao','Đã xóa thành công!');
        // return redirect('admin/san-pham')->with('thongbao','Đã xóa thành công!');
    }
}
