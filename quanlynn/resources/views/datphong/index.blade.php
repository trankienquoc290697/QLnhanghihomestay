@extends('admin.layout1.index')
@section('content')


<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đặt Phòng
                    <small>Danh sách</small>
                    <form action="{{ route('datphong.create') }}" method="GET" style="">
                        @csrf
                        <button class="btn btn-success">Xóa Đặt Phòng</button>
                    </form>
                </h1>
            </div>
            <!-- /.col-lg-12 -->

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                       
                        <th>Phòng ID</th>
                        <th>Tên phòng</th>
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                        <th>Đơn giá</th>
                        <th>Ngày trả</th>
                        <th>Ngày nhận</th>
                     <!--    <th>Trạng thái</th> -->
                        
                    </tr>
                </thead>
                <tbody>
                                @foreach ($datphong as $dp)
                                    <tr class="no-b" style="color: black">
                                        <td>{{$dp->id}}</td>
                                        
                                        <td>{{$dp->phong['id']}}</td>
                                        @if($dp->phong['tenphong'] == 0)
                                        <td>Phòng đơn</td>
                                        @elseif($dp->phong['tenphong'] == 1)
                                        <td>Phòng đôi</td>
                                        @elseif($dp->phong['tenphong'] == 2)
                                        <td>Phòng 3 người</td>
                                        @else
                                        <td>Phòng 4 người</td>
                                        @endif
                                    
                                        <td>{{$dp->ten}}</td>
                                        <td>{{$dp->diachi}}</td>
                                        <td>{{$dp->dongia}}/Đêm</td>
                                        <td>{{$dp->ngaytra}}</td>
                                        <td>{{$dp->ngaynha}}</td>


                                       <!--  @if($dp->trangthai == 1)
                                        <td>
                                            Đã Thanh toán 
                                        </td>
                                        @elseif($dp->trangthai == 2)
                                        <td>
                                            Chưa Thanh toán 
                                        </td>
                                        @endif -->

                                       <!--  <td >
                                            <i class="icon icon-data_usage"></i>{{$dp->created_at}}</td>
                                        </td> -->
                                        <td align="center">
                                            <form action="{{ route('datphong.show',$dp->phong['id']) }}" method="GET">
                                            @csrf
                                                <button class="btn-fab btn-fab-sm btn-primary shadow text-white icon-eye"></i></button> 
                                            </form>
                                            <!-- <i class="icon-eye mr-3"></i> -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection