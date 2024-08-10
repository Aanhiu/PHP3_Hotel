@extends('layouts.app')
@section('content')
<style>
   

    .single-room-list:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }


    .left-content {
        padding: 15px;
    }

    .right-content {
        text-align: right;
        padding: 15px;
    }

    .price {
        font-size: 24px;
        color: #28a745;
        font-weight: bold;
    }

    .rating i {
        color: #f39c12;
    }

   

    .theme-btn:hover {
        background-color: #0056b3;
    }

   
    
</style>
    <!-- page-title -->
    <section class="page-title centred" style="background-image: url(images/background/page-title.jpg);">
        <div class="container">
            <div class="content-box">
                <div class="title">Rooms List View</div>
                <ul class="bread-crumb">
                    <li><i class="bi bi-house-door"></i><a href="{{route('index')}}">Home</a></li>
                    <li>Rooms List View</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->

    <section class="room-list overlay-style-one sec-pad-2">
        <div class="container">
            @foreach ($allRooms as $R)
            <div class="single-room-list inner-box">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 img-column">

                        <img src="{{asset('storage/' . $R->image)}}" alt="" style="width: 370px ; height: 295px;">
                        <!--Overlay Box-->
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 content-column ">
                        <div class="content-box clearfix">
                            <div class="left-content" style="width: 800px">
                                <ul class="rating">
                                    <li><i class="bi bi-star"></i></i></i></li>
                                    <li><i class="bi bi-star"></i></i></i></li>
                                    <li><i class="bi bi-star"></i></i></i></li>
                                    <li><i class="bi bi-star"></i></i></i></li>
                                    <li><i class="bi bi-star"></i></i></i></li>

                                </ul>
                                <h3><a href="">{{$R->name}}</a></h3>
                                <h5>{{$R->KindRoom_name}}</h5>
                                <div class="text">{{$R->description}}</div>
                                <ul class="info-box">
                                    <li><i class="bi bi-wifi"></i></li>
                                    <li><i class="bi bi-telephone"></i></li>
                                    <li><i class="bi bi-cup"></i></li>
                                </ul>
                            </div>
                            <div class="right-content">
                                <div class="price">{{$R->price}}<span>/ Đêm</span></div>
                                <div class="link"><a href="{{route('room-detail' ,$R->id)}}" class="theme-btn">Xem chi tiết</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </section>

@endsection
