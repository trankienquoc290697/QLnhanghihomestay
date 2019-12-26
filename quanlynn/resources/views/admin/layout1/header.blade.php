 <!-- Navigation -->
 
 <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #337ab7" >
    
    <div class="navbar-header" >
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html" style="color: white"></a>
    </div>

    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"  style="color: white">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>

            <ul class="dropdown-menu dropdown-user"  >
                 <li><a href=http://localhost:8888/quanlynn1/quanlynn/public/homepage"><i class="fa fa-user fa-fw"></i> Home</a>
                </li>
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>

                <li class="divider"></li>
                <li>
                   @if(Auth::check())
                   <div class="btn-group pull-right theme-container animated tada">
                    <a class="btn btn-de" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="hidden-sm hidden-xs">Đăng xuất</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form>
         </div>
         @endif
     </li>
 </ul>
 <!-- /.dropdown-user -->
</li>
<!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->

@include('admin.layout1.menu')
<!-- /.navbar-static-side -->

</nav>
