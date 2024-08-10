<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Khách Sạn Ponola ÁNH</title>
</head>
<style>
    .custom-dropdown-menu {
        display: none;
        /* Ẩn menu dropdown mặc định */
        position: absolute;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .custom-dropdown-menu.show {
        display: block;
        /* Hiện menu khi có lớp 'show' */
    }

    .custom-dropdown-item {
        color: #212529;
        text-decoration: none;
        padding: 10px 15px;
        display: block;
    }


    .custom-dropdown-toggle {
        /* font-size: 20px; */
        cursor: pointer;
        padding: 10px 15px;
        display: inline-block;
        text-decoration: none;
        color: #000;
    }



    .custom-dropdown-item:last-child {
        border-bottom: none;
        /* Xóa border-bottom cho mục cuối cùng */
    }
</style>

<body>

    <!-- Main Header -->
    <header class="main-header">
        <!-- header-top -->
        <div class="header-top clearfix">
            <div class="left-content">
                <ul class="content-box">
                    <li><a href="#" class="nav-link"><i class="fa fa-envelope"></i>buianh2592003@gmail.com</a>
                    </li>
                    <li><a href="#" class="nav-link"><i class="fa fa-globe"></i>Bản quyền thuộc về Bùi Văn Ánh By
                            IT</a></li>
                </ul>
            </div>
        </div><!-- header-top end -->

        <!-- header-bottom -->
        <div class="header-bottom clearfix">
            <figure class="logo-box"><a href="{{ route('index') }}"><img src="images/logo.png" alt=""></a>
            </figure>
            <div class="menu-area">
                <nav class="main-menu navbar-expand-lg">
                    <div class="navbar-header">
                        <!-- Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">

                            <li class="current dropdown"><a href="{{ route('index') }}">Home</a></li>

                            <li><a href="{{ route('room') }}">Rooms</a></li>

                            <li><a href="">About Us</a></li>

                            <li><a href="#">Pages</a></li>

                            <li><a href="#">News</a> </li>

                            @guest  
                                <li><a href="{{ route('dangkyUser') }}">Đăng Ký / Đăng Nhập</a></li>
                            @else
                                <ul class="navbar-nav" style="position: relative ; top: 17px">
                                    <li class="nav-item dropdown">
                                        <a class="custom-dropdown-toggle" id="customDropdownMenuLink">
                                            <i class="bi bi-person-circle fs-2"></i>
                                        </a>
                                        <ul class="custom-dropdown-menu" id="customDropdownMenu" style="width: 290px">
                                             
                                            <li><a class="custom-dropdown-item" href="{{ route('taikhoan') }}">Thông tin tài
                                                    khoản</a></li>
                                      
                                            <li><a class="custom-dropdown-item" href="{{route('detail-book')}}">Phòng đã đặt</a></li>

                                            <li>
                                                <form action="{{ route('dangxuatUser') }}" method="POST">
                                                    @csrf
                                                    <input type="submit" class="btn custom-dropdown-item"
                                                        style="color: red" value="Đăng xuất">
                                                </form>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            @endguest

                        </ul>
                    </div>
                </nav>
                <div class="link"><a href="{{ route('room') }}" class="theme-btn">Xem Phòng</a></div>
            </div>
        </div><!-- header-bottom end -->

    </header>
    <!-- End Main Header -->
    <script>
        document.getElementById('customDropdownMenuLink').addEventListener('click', function() {
            var menu = document.getElementById('customDropdownMenu');
            menu.classList.toggle('show');
        });

        document.addEventListener('click', function(event) {
            var target = event.target;
            if (!target.closest('#customDropdownMenuLink')) {
                var menu = document.getElementById('customDropdownMenu');
                if (menu.classList.contains('show')) {
                    menu.classList.remove('show');
                }
            }
        });
    </script>
</body>

</html>
