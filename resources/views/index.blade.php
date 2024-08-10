<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .content {
        padding: 10px;
    }

    .title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .text p {
        font-size: 0.9rem;
    }

    .img-box img {
        width: 100%;
        height: auto;
    }
</style>
@extends('layouts.app')

@section('content')
    <div class="col-sm-12">
       
        <!-- Main slider -->
        <div class="">
           
                <li class="slider-wrapper">
                    <div class="image"><img src="{{ asset('images/main-slider/1.jpg') }}" alt=""></div>
                    
                </li>
           
        </div>
        <!-- main-slider end -->

        
        <!-- filter-section -->
        <section class="filter-section">
           
            <div class="container">
                
                <form method="post" action="#" class="filter-content clearfix">
                   
                    <div class="single-item">
                        <div class="form-group">
                            <p>Khách sạn làm việc từ 6h00 sáng đến 12h00 Tối</p>
                           
                        </div>
                    </div>

                    {{-- <div class="single-item">
                        <div class="form-group">
                            <label>Ngày đến</label>
                            <i class="fa fa-angle-down"></i>
                            <input type="date" name="date">
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="form-group">
                            <label>Ngày Đi</label>
                            <i class="fa fa-angle-down"></i>
                            <input type="date" name="date">
                        </div>
                    </div> --}}
                    <div class="single-item">
                        <div class="form-group select-box">
                            <label>Chọn loại Phòng</label>
                            <select class="custom-select-box">
                                <option selected="selected">Chọn loại Phòng</option>
                                <option>P 1</option>
                                <option>P 2</option>
                               
                            </select>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="form-group">
                            <div class="link"><button type="submit" class="theme-btn">Tìm Phòng</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- filter-section end -->

        <!-- about-section -->
        <section class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="about-content">
                            <div class="sec-title left">Panola Hotel</div>
                            <div class="text">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                deserunt mollit anim id est laborum. sed ut perspiciatis unde omnis natus error.</div>
                            <div class="text">Inventore veritatis et quasi architebeatae vitae dicta sunt explicabo. Nemo
                                enim ipsam voluptatem.</div>
                            <div class="link"><a href="about.html" class="theme-btn-two">About Us</a></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 clearfix">
                        <div class="img-box">
                            <figure class="img-three wow zoomIn animated"><img src="images/resource/3.jpg" alt="">
                            </figure>
                            <figure class="img-two wow slideInRight" data-wow-delay="0ms" data-wow-duration="1500ms"><img
                                    src="images/resource/2.jpg" alt=""></figure>
                            <figure class="img-one wow slideInLeft" data-wow-delay="0ms" data-wow-duration="1500ms"><img
                                    src="images/resource/1.jpg" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-section end -->


        <!-- room-section -->
        <section class="room-section overlay-style-one gray-bg sec-pad">
            <div class="container">
                <div class="top-title">
                    <div class="sec-title">Phòng yêu thích của chúng tôi</div>
                </div>
                <div class="row">
                    @foreach ($getallRoomHome as $Rhome)
                    <div class="col-lg-4 col-md-6 col-sm-12 pt-3" >
                        <div class="single-item inner-box">
                            <figure class="image-box">
                                <img src="{{ asset('storage/'. $Rhome->image) }}" alt="Image" style="height: 250px;">
                                <!--Overlay Box-->
                            </figure>
                            <div class="lower-content">
                                <div class="price">{{$Rhome->price}}<span>Đêm</span></div>
                                <ul class="rating">
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                </ul>
                                <h4>Phòng : {{$Rhome->name}}</h4>
                                <h6>Loại Phòng : {{$Rhome->KindRoom_name}}</h6>
                                <div class="text">Mô tả : {{$Rhome->description}}</div>
                                <ul class="info-box">
                                
                                    <li class="link"><a href="{{route('room-detail' , $Rhome->id)}}" class="theme-btn-three">Xem chi tiết</a></li>
                                 
                                    <button class="btn" ><i class="bi bi-wifi">Wifi</i></button>
                                    <button class="btn" ><i class="bi bi-telephone-fill">Phone</i></button>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="link-btn centred"><a href="{{route('room')}}" class="theme-btn-two">Xem thêm</a></div>
            </div>
        </section>
        <!-- room-section end -->


        <!-- service-section -->
        <section class="service-section sec-pad">
            <div class="container">
                <div class="top-title">
                    <div class="sec-title">Dịch vụ của chúng tôi</div>
                </div>
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="img-box">
                                            <img src="images/resource/7.jpg" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="content">
                                            <div class="title">Restaurant</div>
                                            <div class="text">
                                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia
                                                    deserunt mollit anim id est laborum. sed ut perspiciatis unde omnis
                                                    natus error.Inventore veritatis et quasi architebeatae vitae dicta sunt
                                                    explicabonemo enim ipsam voluptatem quia voluptassit.aspernatur aut odit
                                                    aut fugit, sed quia consequuntur</p>
                                                <p>Magni dolores eos qui ratione voluptatem sequi nesciunt.neque porro
                                                    quisquam est qui dolore ipsum quia dolor sit amet, consectetur adipisci
                                                    velit sed quia.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="img-box">
                                            <img src="images/resource/service-2.jpg" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="content">
                                            <div class="title">Health & Beauty</div>
                                            <div class="text">
                                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia
                                                    deserunt mollit anim id est laborum. sed ut perspiciatis unde omnis
                                                    natus error.Inventore veritatis et quasi architebeatae vitae dicta sunt
                                                    explicabonemo enim ipsam voluptatem quia voluptassit.aspernatur aut odit
                                                    aut fugit, sed quia consequuntur</p>
                                                <p>Magni dolores eos qui ratione voluptatem sequi nesciunt.neque porro
                                                    quisquam est qui dolore ipsum quia dolor sit amet, consectetur adipisci
                                                    velit sed quia.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="img-box">
                                            <img src="images/resource/service-3.jpg" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="content">
                                            <div class="title">Swimming Pool</div>
                                            <div class="text">
                                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia
                                                    deserunt mollit anim id est laborum. sed ut perspiciatis unde omnis
                                                    natus error.Inventore veritatis et quasi architebeatae vitae dicta sunt
                                                    explicabonemo enim ipsam voluptatem quia voluptassit.aspernatur aut odit
                                                    aut fugit, sed quia consequuntur</p>
                                                <p>Magni dolores eos qui ratione voluptatem sequi nesciunt.neque porro
                                                    quisquam est qui dolore ipsum quia dolor sit amet, consectetur adipisci
                                                    velit sed quia.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <div class="img-box">
                                            <img src="images/resource/service-4.jpg" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="content">
                                            <div class="title">Conference Room</div>
                                            <div class="text">
                                                <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia
                                                    deserunt mollit anim id est laborum. sed ut perspiciatis unde omnis
                                                    natus error.Inventore veritatis et quasi architebeatae vitae dicta sunt
                                                    explicabonemo enim ipsam voluptatem quia voluptassit.aspernatur aut odit
                                                    aut fugit, sed quia consequuntur</p>
                                                <p>Magni dolores eos qui ratione voluptatem sequi nesciunt.neque porro
                                                    quisquam est qui dolore ipsum quia dolor sit amet, consectetur adipisci
                                                    velit sed quia.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service-section end -->


        <!-- video-section -->
        <section class="video-section" style="background-image: url(images/background/1.jpg);">
            <div class="title centred">Chúc Bạn Một Ngày Nghỉ Tuyệt Vời</div>
            <div class="video-gallery">
                <div class="overlay-gallery">
                    
                      
                            <a class="html5lightbox" title="Video" href="https://youtu.be/yVb0mfmMV9w"></a>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- video-section end -->


        <!-- news-section -->
        <section class="news-section sec-pad">
            <div class="container">
                <div class="top-title clearfix">
                    <div class="sec-title">Latest News</div>
                    <div class="title-text">Excepteur sint occaecat cupidatat</div>
                    <div class="top-link"><a href="#">Find More News</a></div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 news-column">
                        <div class="single-item">
                            <div class="image">
                                <img src="images/resource/news-1.jpg" alt="">
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <div class="content">
                                            <a class="link-btn" href="blog-details.html">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="blog-details.html">Electric Feel And Of Other Things</a></h3>
                                <ul class="meta-content">
                                    <li>by <a href="#">admin</a></li>
                                    <li>on <span>2 Sep, 2018</span></li>
                                </ul>
                                <div class="text">Excepteur sint occaecat cupidatat non proi dent sunt in culpa qui
                                    officia dese runt mollit anim id est.</div>
                                <div class="link"><a href="blog-details.html" class="theme-btn-three">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 news-column">
                        <div class="single-item">
                            <div class="image">
                                <img src="images/resource/news-2.jpg" alt="">
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <div class="content">
                                            <a class="link-btn" href="blog-details.html">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="blog-details.html">Lacinia eget consecte sed convallis.</a></h3>
                                <ul class="meta-content">
                                    <li>by <a href="#">admin</a></li>
                                    <li>on <span>2 Sep, 2018</span></li>
                                </ul>
                                <div class="text">Excepteur sint occaecat cupidatat non proi dent sunt in culpa qui
                                    officia dese runt mollit anim id est.</div>
                                <div class="link"><a href="blog-details.html" class="theme-btn-three">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 news-column">
                        <div class="single-item">
                            <div class="image">
                                <img src="images/resource/news-3.jpg" alt="">
                                <div class="overlay">
                                    <div class="overlay-content">
                                        <div class="content">
                                            <a class="link-btn" href="blog-details.html">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3><a href="blog-details.html">Cras Ultricies Ligula Sed Magna.</a></h3>
                                <ul class="meta-content">
                                    <li>by <a href="#">admin</a></li>
                                    <li>on <span>2 Sep, 2018</span></li>
                                </ul>
                                <div class="text">Excepteur sint occaecat cupidatat non proi dent sunt in culpa qui
                                    officia dese runt mollit anim id est.</div>
                                <div class="link"><a href="blog-details.html" class="theme-btn-three">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- news-section -->

    </div>
@endsection
