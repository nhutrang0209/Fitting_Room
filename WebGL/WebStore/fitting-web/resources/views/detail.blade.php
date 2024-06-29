@extends('layouts.admin')

@section('main-content')
    <style>
        .loai{
            cursor: pointer; 
        }
        /* Màu sắc và kích thước mặc định của nút chuyển */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 40px; /* Kích thước chiều rộng */
            height: 40px; /* Kích thước chiều cao */
        }

        /* Thay đổi màu và kích thước khi hover */
        .carousel-control-prev:hover .carousel-control-prev-icon,
        .carousel-control-next:hover .carousel-control-next-icon {
            background-color: #808080; /* Màu xám */
            width: 50px; /* Kích thước chiều rộng tăng lên */
            height: 50px; /* Kích thước chiều cao tăng lên */
        }

        .color-swatch {
            width: 20px !important;
            height: 40px !important;
            margin: 0 5px;
            cursor: pointer;
        }

        /* Define colors for each swatch */
        .color-swatch-1 { background-color: #e6e6e6; }
        .color-swatch-2 { background-color: #dcdcdc; }
        .color-swatch-3 { background-color: #cccccc; }
        .color-swatch-4 { background-color: #bbb3b3; }
        .color-swatch-5 { background-color: #a9a9a9; }
        .color-swatch-6 { background-color: #999999; }
        .color-swatch-7 { background-color: #8a8a8a; }
        .color-swatch-8 { background-color: #777777; }

    </style>
    <!-- Page Heading -->

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Số tài khoản</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="row">

        <div class="col-lg-6 order-lg-2">
            @php
                $cloth = $widget['cloth'];
            @endphp
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h2 class="m-0 font-weight-bold">{{$cloth['name']}}</h2>
                    <div class="price-section row" style="margin-top: 20px;">
                        <h3 class="font-weight-bold text-danger col-5" style="font-size: 30px">{{$cloth['price']}}.000 VND</h3>
                        @if($cloth["shirt"])
                            <div class="col text-right font-weight-bold text-secondary" style="font-size: 30px">Áo</div>
                        @else
                            <div class="col text-right font-weight-bold text-secondary" style="font-size: 30px">Quần</div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <label id="LbMs"for="MsSelect" class="font-weight-bold" style="font-size: 1em; width: 30%;">MÀU SẮC</label>
                    <div id="MsSelect">
                        <div class="color-picker row">
                            <div class="col-1 color-swatch color-swatch-1" data-mau="Light Silver"></div>
                            <div class="col-1 color-swatch color-swatch-2" data-mau="Gainsboro"></div>
                            <div class="col-1 color-swatch color-swatch-3" data-mau="Silver"></div>
                            <div class="col-1 color-swatch color-swatch-4" data-mau="LightGray"></div>
                            <div class="col-1 color-swatch color-swatch-5" data-mau="DarkGray"></div>
                            <div class="col-1 color-swatch color-swatch-6" data-mau="DimGray"></div>
                            <div class="col-1 color-swatch color-swatch-7" data-mau="SlateGray"></div>
                            <div class="col-1 color-swatch color-swatch-8" data-mau="DarkSlateGray"></div>
                        </div>
                    </div>
                    <div class="card" style="margin-top: 30px">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <button class="btn font-weight-bold text-center" style="font-size: 1em; width: 100%;">
                                    THỬ ĐỒ
                                </button>
                            </h5>
                        </div>
                    </div>
                    <div style="margin-top: 30px">
                        <label for="SlSelect" class="font-weight-bold" style="font-size: 1em; width: 30%;">SỐ LƯỢNG</label>
                        <select id="SlSelect" class="form-control font-weight-bold" style="font-size: 1em; width: 30%;">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="card" style="margin-top: 30px">
                        <div class="card-header" style="background-color: #ff0000; ">
                            <h5 class="mb-0">
                                <button class="btn font-weight-bold text-center" style="font-size: 1em; width: 100%;color: #ffffff;">
                                    THÊM VÀO GIỎ HÀNG
                                </button>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 order-lg-1">
            <div class="card shadow mb-4">

                <div class="card-body">
                    <div id="carouselExampleControls" style="width: 100%;" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="{{str_replace('?width=320', '?width=750', $cloth['image'])}}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="{{$cloth['image2']}}" alt="Second slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="row" style="margin-bottom: 20px">
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <script>
        const colorSwatches = document.querySelectorAll('.color-swatch');

        colorSwatches.forEach(swatch => {
            swatch.addEventListener('click', () => {
                mau = swatch.getAttribute('data-mau');
                const element = document.getElementById('LbMs');
                element.textContent = "MÀU SẮC: " + mau;
                console.log(mau);
            });
        });
    </script>
@endsection
