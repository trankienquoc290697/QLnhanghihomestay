<div id="page">
        <nav class="colorlib-nav" role="navigation">
            <div class="top-menu">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-2">
                            <div id="colorlib-logo"><a href="index.html">Tour</a></div>
                        </div>
                        <div class="col-xs-10 text-right menu-1">
                            <ul>
                                <div id="colorlib-logo"><a href="http://localhost:8888/quanlynn1/quanlynn/public/login">Đăng nhập</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>  
            </div>
        </nav>
        <aside id="colorlib-hero">
            <div class="flexslider">
                <ul class="slides">
                <li style="background-image: url(images/dl.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner text-center">
                                    <h2>Tour du lịch 2 ngày</h2>
                                    <h1>Maldives Tour</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(images/dl.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner text-center">
                                    <h2>Tour 10 ngày</h2>
                                    <h1>Từ Hy Lạp đến Tây Ban Nha</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(images/dl.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluids">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner text-center">
                                    <h2>Black Friday</h2>
                                    <h1>Giảm giá 30%</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(images/dl.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner text-center">
                                    <h2>Experience the</h2>
                                    <h1>Best Trip Ever</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>       
                </ul>
            </div>
        </aside>
        <div id="colorlib-reservation">
    <!-- <div class="container"> -->
        <div class="row">
            <div class="search-wrap">
                <div class="container">
                    <ul class="nav nav-tabs">
                        
                        
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="flight" class="tab-pane fade in active">
                        <form method="get" action="{{route('get_diadiem')}}">
                            {!! csrf_field() !!}
                          <div class="row">
                           <div class="col-md-3">
                              <div class="form-group">
                              <label for="date">Địa điểm:</label>
                              <div class="form-field">
                               <select name="diadiem" id="diadiem_id" class="form-control">
                                 @foreach($diadiem as $diadiem)
                                 <option value="{{$diadiem->id}}">{{$diadiem->thanhpho}}</option>
                                 @endforeach 
                                </select>
                              </div>
                            </div>
                           </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="date">Nhận phòng:</label>
                              <div class="form-field">
                                <i class="icon icon-calendar2"></i>
                                <input type="text" id="date" name="" class="form-control date" placeholder="Ngày nhận">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label for="date">Trả phòng:</label>
                              <div class="form-field">
                                <i class="icon icon-calendar2"></i>
                                <input type="text" id="date" class="form-control date" placeholder="Ngày trả">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="guests">Khách</label>
                              <div class="form-field">
                                <i class="icon icon-arrow-down3"></i>
                                <select name="people" id="people" class="form-control">
                                  <option value="#">1 người</option>
                                  <option value="#">2 người</option>
                                  <option value="#">3 người</option>
                                  <option value="#">4 người</option>
                                  <option value="#">5 người</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <input type="submit" name="submit" id="submit" value="Tìm kiếm" class="btn btn-primary btn-block">
                          </div>
                        </div>
                    </form>
                 </div>
                   <div id="car" class="tab-pane fade">
                    <form method="post" class="colorlib-form">
                        <div class="row">
                         <div class="col-md-4">
                            <div class="form-group">
                            <label for="date">Where:</label>
                            <div class="form-field">
                              <input type="text" id="location" class="form-control" placeholder="Search Location">
                            </div>
                          </div>
                         </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="date">Start Date:</label>
                            <div class="form-field">
                              <i class="icon icon-calendar2"></i>
                              <input type="text" id="date" class="form-control date" placeholder="Check-in date">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label for="date">Return Date:</label>
                            <div class="form-field">
                              <i class="icon icon-calendar2"></i>
                              <input type="text" id="date" class="form-control date" placeholder="Check-out date">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <input type="submit" name="submit" id="submit" value="Find Car" class="btn btn-primary btn-block">
                        </div>
                      </div>
                    </form>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>