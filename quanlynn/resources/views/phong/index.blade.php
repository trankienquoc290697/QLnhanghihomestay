@extends('admin.layout1.index')
@section('content')


<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Phòng
                    <small>Danh sách</small>
                    <form action="{{ route('phong.create') }}" method="GET" style="">
                        @csrf
                        <button class="btn btn-success">Thêm Phòng</button>
                    </form>
                </h1>
            </div>
            <!-- /.col-lg-12 -->

            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Nhà nghỉ ID</th>
                        <th>Tên phòng</th>
                        <th>Chiều dài</th>
                        <th>Chiều rộng</th>
                        <th>Trạng thái</th>
                        <th>Hình ảnh</th>     
                        <th>Đơn giá</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($phong as $p)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $p -> id }}</td>
                        <td>{{ $p -> nhanghi_id }}</td>
                        
                         @if($p->tenphong == 0)
                            <td>Phòng đơn</td>
                            @elseif($p->tenphong == 1)
                            <td>Phòng đôi</td>
                            @elseif($p->tenphong == 2)
                            <td>Phòng 3 người</td>
                            @else
                            <td>Phòng 4 người</td>
                            @endif

                        <td>{{ $p -> chieudai }}m</td>
                        <td>{{ $p -> chieurong }}m</td>
                        
                            @if($p->trangthai == 0)
                            <td>Phòng trống</td>
                            @elseif($p->trangthai == 1)
                            <td>Đã thanh toán</td>
                            @else
                            <td>Chưa thanh toán</td>
                            @endif
                        
                        <td>{{ $p -> hinhanh }}</td>
                        <td>{{ $p -> dongia }} VND</td>
                        
                        <td class="center">
                            <form action="{{ route('phong.destroy',$p->id) }}" method="POST">
                                @csrf
                                @method('delete') 
                                <button class="btn-fab btn-fab-sm btn-danger shadow text-white icon-trash">Xóa</button>       
                            </form>&nbsp;
                        </td>

                        <td class="center">
                            <form action="{{ route('phong.edit',$p->id) }}" method="GET">
                                @csrf
                                <button class="btn-fab btn-fab-sm btn-primary shadow text-white icon-pencil">Sửa</button> 
                            </form>
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