@extends('layouts.app')
@section('content')
    <section class="page-title centred" style="background-image: url(images/background/page-title.jpg);">
        <div class="container">
            <div class="content-box">
                <div class="title">Room Details</div>
                <ul class="bread-crumb">
                    <li><i class="bi bi-house-door"></i><a href="{{ route('index') }}">Home</a></li>
                    <li>Room Details</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- room-details -->
    <section class="room-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12 column">
                    <div class="room-details-content">

                        <div class="contnt-style-one">
                            <h2>Tên phòng : {{ $roomDetailID->name }} </h2>

                            <div class="single-item-carousel">
                                {{-- <figure class="img-box"><img src="{{ asset('storage/' . $roomDetailID->image) }}" alt="anh room"></figure> --}}
                                <img src="{{ asset('storage/' . $roomDetailID->image) }}" alt="Image"
                                    style="width: 700px;">

                            </div>

                            <div class="text">
                                <h5>Giá : {{ $roomDetailID->price }} / đêm</h5>
                                <h5>Loại Phòng : {{ $roomDetailID->KindRoom_name }} </h5>
                                <p>Mô tả : {{ $roomDetailID->description }} </p>
                            </div>
                        </div>

                        <div class="content-style-two">
                            <h3>Tiện nghi có sẵn : </h3>
                            <div class="text">Exercittion ullamco laboris nisi ut aliquip excepteur.sint occaecat cuidatat
                                non proident sunt in culpa qui officia deserunt.mollit anim id est laborum.</div>
                            <div class="table-outer">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="icon-box"><i class="flaticon-television"></i></div>
                                                <div class="table-text">Telivision</div>
                                            </td>
                                            <td>
                                                <div class="icon-box"><i class="flaticon-wifi-connection-signal-symbol"></i>
                                                </div>
                                                <div class="table-text">Wifi</div>
                                            </td>
                                            <td>
                                                <div class="icon-box"><i class="flaticon-mug"></i></div>
                                                <div class="table-text">Breakfast</div>
                                            </td>
                                            <td>
                                                <div class="icon-box"><i class="flaticon-bathtub"></i></div>
                                                <div class="table-text">Bathtub</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="icon-box"><i class="flaticon-journal"></i></div>
                                                <div class="table-text">Newspaper</div>
                                            </td>
                                            <td>
                                                <div class="icon-box"><i class="flaticon-spa"></i></div>
                                                <div class="table-text">Spa</div>
                                            </td>
                                            <td>
                                                <div class="icon-box"><i class="flaticon-cocktail"></i></div>
                                                <div class="table-text">Mini bar</div>
                                            </td>
                                            <td>
                                                <div class="icon-box"><i class="flaticon-gym"></i></div>
                                                <div class="table-text">Gymnasium</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 column">
                    <div class="room-sidebar">
                        <div class="filter-content">
                            <div class="title">
                                <h3>Thông tin BOOK</h3>
                            </div>
                            <form action="{{ route('bookRoom') }}" method="post" class="content">
                                @csrf
                                <input type="text" value="{{ $roomDetailID->id }}" hidden name="Room_id">
                                <div class="single-item">
                                    <div class="form-group">
                                        <label>Họ và tên</label>
                                        <input type="text" name="fullname" placeholder="Họ & tên" required="">
                                    </div>
                                </div>

                                <div class="single-item">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" placeholder="Email" required="">
                                    </div>
                                </div>
                                <div class="single-item">
                                    <div class="form-group">
                                        <label>Số điên thoại</label>
                                        <input type="numbers" name="phone" placeholder="Email" required="">
                                    </div>
                                </div>
                                <div class="single-item">
                                    <div class="form-group">
                                        <label>Ngày Đến</label>
                                        <i class="fa fa-angle-down"></i>
                                        <input type="date" name="check_in" id="check_in" placeholder="Arrival date"
                                            required>
                                    </div>
                                </div>
                                <div class="single-item">
                                    <div class="form-group">
                                        <label>Ngày đi</label>
                                        <i class="fa fa-angle-down"></i>
                                        <input type="date" name="check_out" id="check_out" placeholder="Departure date"
                                            required>
                                    </div>
                                </div>
                                <div class="single-item">
                                    <div class="form-group select-box">
                                        <label>Số người</label>
                                        <select class="custom-select-box" name="number_person">
                                            <option>Chọn số người ở</option>
                                            <option value="1 người">1 người</option>
                                            <option value="2 người">2 người</option>
                                            <option value="1 người lớn 1 trẻ em">1 người lớn 1 trẻ em</option>
                                            <option value="2 người lớn 1 trẻ em">2 người lớn 1 trẻ em</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="single-item">
                                    <div class="form-group select-box">
                                        <label>Số người</label>
                                        <select class="custom-select-box" name="pay">
                                            <option>Phương thức thanh toán</option>
                                            <option value="Thanh toán khi đến khách sạn">Thanh toán khi đến khách sạn
                                            </option>
                                           
                                        </select>
                                    </div>
                                </div>
                            @if (Auth::check())
                            <div class="single-item">
                                <div class="form-group">
                                    <div class="link"><button type="submit" class="theme-btn" >Đặt Phòng</button>
                                    </div>
                                </div>
                            </div>
                            @else
                            <p style="color: red">Vui lòng <a href="{{ route('dangnhap') }}">Đăng Nhập</a> để đặt phòng.</p>
                            @endif
                               
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <div class="similar-room room-section overlay-style-one">
                <div class="sec-title left">Similar Rooms</div>
                <div class="row">

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="single-item inner-box">
                            <figure class="image-box">
                                <img src="images/resource/4.jpg" alt="">
                                <!--Overlay Box-->
                                <div class="overlay-box">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="room-details.html" class="link"><i
                                                    class="icon fa fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                            <div class="lower-content">
                                <div class="price">$150<span>Per Night</span></div>
                                <ul class="rating">
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                </ul>
                                <h3><a href="room-details.html">Single Room</a></h3>
                                <div class="text">Lorem ipsum dolor sit amet constur adip isicing elit sed do eiusmtem
                                    por incid.</div>
                                <ul class="info-box">
                                    <li class="link"><a href="#" class="theme-btn-three">Book Now</a></li>
                                    <li><i class="flaticon-television"></i></li>
                                    <li><i class="flaticon-wifi-connection-signal-symbol"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- room-details end -->
 <script>
     document.addEventListener('DOMContentLoaded', function () {
        var checkInInput = document.getElementById('check_in');
        var checkOutInput = document.getElementById('check_out');

        // Thiết lập giá trị min cho ngày đến là ngày hiện tại
        var today = new Date().toISOString().split('T')[0];
        checkInInput.setAttribute('min', today);

        checkInInput.addEventListener('change', function () {
            // Khi người dùng chọn ngày đến, thiết lập giá trị min cho ngày đi
            checkOutInput.setAttribute('min', checkInInput.value);
        });
    });
 </script>
@endsection
