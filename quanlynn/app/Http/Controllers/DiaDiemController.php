<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DiaDiem;
use App\NhaNghi;
use App\Phong;

class DiaDiemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diadiem = DiaDiem::all();
        $nhanghi = NhaNghi::all();
        return view('diadiem.index',['diadiem'=>$diadiem,'nhanghi'=>$nhanghi]);
    }

    public function get_diadiem(Request $request)
    {
        $diadiem1 = DiaDiem::find($request->diadiem);
         // $phong= Phong::find($request->people);

          $diadiem = DiaDiem::where('id', $diadiem1->id)->get();
          $nhanghi = NhaNghi::all();
          $phong = Phong::all();
         // $diadiem= DiaDiem::where('diadiem_id')->get();
        return view('nhanghi.index',compact('diadiem1','diadiem','nhanghi','phong'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diadiem = DiaDiem::all();
        return view('diadiem.create',['diadiem'=>$diadiem]);
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
        $diadiem= new DiaDiem;
        $diadiem->quocgia= $request->quocgia;
        $diadiem->quanhuyen= $request->quanhuyen;
        $diadiem->thanhpho= $request->thanhpho;
        $diadiem-> save();

        return redirect()->route('diadiem.create')->with('thongbao','Thêm thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diadiem = DiaDiem::findOrFail($id);
        return view('diadiem.edit',compact('diadiem'));
        
    }

    public function show($id){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(request $request,$id)
    {   
        $diadiem= DiaDiem::findOrFail($id);
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

        $diadiem= DiaDiem::FindOrFail($id);
        $diadiem->quocgia= $request->quocgia;
        $diadiem->quanhuyen= $request->quanhuyen;
        $diadiem->thanhpho= $request->thanhpho;
        $diadiem-> save();

        return redirect()->route('diadiem.edit',$id)->with('thongbao','Sửa thành công');

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
        $diadiem = DiaDiem::findOrFail($id);
        $diadiem->delete();
        return redirect()->route('diadiem.index')->with('thongbao','Đã xóa thành công!');
        // return redirect('admin/san-pham')->with('thongbao','Đã xóa thành công!');
    }
}
