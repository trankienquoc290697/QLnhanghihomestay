<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhaNghi;
use App\DiaDiem;
use App\Phong;
use App\TienNghi;
use App\DatPhong;
use App\ChiTietDatPhong;
use Illuminate\Support\Facades\Input;
class ChitietphongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function getChitiet($id){
        $phong = Phong::where('id',$id)->first();
        $nhanghi = NhaNghi::all();
        $tiennghi= TienNghi::all();
        return view('chitietphong.chitietphong',['nhanghi'=>$nhanghi,'phong'=>$phong,'tiennghi'=>$tiennghi]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          
    }

    public function showChitiet(Request $request){
        return view('chitietphong.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ctphong = new DatPhong();
        $ctphong->phong_id = $request->phong ;
        $ctphong->dongia = $request->dongia;
        $ctphong->ten = $request->ten;
        $ctphong->diachi = $request->diachi;
        $ctphong->ngaynha = $request->ngaynhan;
        $ctphong->ngaytra =$request->ngaytra;
        $ctphong->users_id = null;
        $ctphong->trangthai = null;
        $ctphong->save();
        // dd($ctphong);
        return redirect(route('datphong.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
