@extends('layouts.admin')

@section('main-content')
    <style>
        .loai{
            cursor: pointer; 
        }
    </style>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Trang chủ</h1>

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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $widget['users'] }}</div>
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
        <div class="col-lg-4 order-lg-2">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">NỮ</h4>
                </div>
                <div class="card-body">

                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn font-weight-bold text-left" style="font-size: 1em; width: 100%;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    ÁO
                                </button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="col">
                                    <a class="loai" href="/filter/0/1" style="color: inherit; text-decoration: none; font-size: 20px; margin-left:15px;">Tất cả áo</a>
                                </div>
                                <div class="col">
                                    <a class="loai" href="/home/0/2" style="color: inherit; text-decoration: none; font-size: 20px;margin-left:15px;">Áo Thun</a>
                                </div>
                                <div class="col">
                                    <a class="loai" href="/home/0/1" style="color: inherit; text-decoration: none; font-size: 20px;margin-left:15px;">Áo Polo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn font-weight-bold text-left" style="font-size: 1em; width: 100%;" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    QUẦN
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                                <div class="col">
                                    <a class="loai" href="/filter/0/0" style="color: inherit; text-decoration: none; font-size: 20px; margin-left:15px;">Tất cả quần</a>
                                </div>
                                <div class="col">
                                    <a class="loai" href="/home/0/4" style="color: inherit; text-decoration: none; font-size: 20px;margin-left:15px;">Quần Short</a>
                                </div>
                                <div class="col">
                                    <a class="loai" href="/home/0/3" style="color: inherit; text-decoration: none; font-size: 20px;margin-left:15px;">Quần Jeans</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Nam</h4>
                </div>
                <div class="card-body">

                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn font-weight-bold text-left" style="font-size: 1em; width: 100%;" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    ÁO
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                <div class="col">
                                    <a class="loai" href="/filter/1/1" style="color: inherit; text-decoration: none; font-size: 20px; margin-left:15px;">Tất cả áo</a>
                                </div>
                                <div class="col">
                                    <a class="loai" href="/home/1/2" style="color: inherit; text-decoration: none; font-size: 20px;margin-left:15px;">Áo Thun</a>
                                </div>
                                <div class="col">
                                    <a class="loai" href="/home/1/1"style="color: inherit; text-decoration: none; font-size: 20px;margin-left:15px;">Áo Polo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0">
                                <button class="btn font-weight-bold text-left" style="font-size: 1em; width: 100%;" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    QUẦN
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                        <div class="card-body">
                                <div class="col">
                                    <a class="loai" href="/filter/1/0" style="color: inherit; text-decoration: none; font-size: 20px; margin-left:15px;">Tất cả quần</a>
                                </div>
                                <div class="col">
                                    <a class="loai" href="/home/1/4" style="color: inherit; text-decoration: none; font-size: 20px;margin-left:15px;">Quần Short</a>
                                </div>
                                <div class="col">
                                    <a class="loai" href="/home/1/3" style="color: inherit; text-decoration: none; font-size: 20px;margin-left:15px;">Quần Jeans</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-8 order-lg-1">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Mẫu đồ</h4>
                </div>
                <div class="card-body">
                @php
                    $clothesArray = $widget['clothes']->toArray();
                @endphp

                @for ($i = 0; $i < count($clothesArray); $i+=3)
                    <div class="row" style="margin-bottom: 20px">
                    @for ($j = 0; $j < 3; $j++)
                        @if (isset($clothesArray[$i + $j]))
                        <div class="col-4">
                            <article class="w4" data-test="product-card-E465601-000">
                                <a class="" style="color: inherit; text-decoration: none;" data-category="ProductCollection-grid" data-action="click" data-label="E465601-000" href="/detail/{{$clothesArray[$i + $j]['id']}}" style=""><div class="fr-product-card default" id="">
                                    <div class="image-section">
                                        <div class="fr-product-image">
                                            <div class="favorite large swiper-no-swiping">
                                                <button aria-label="Favorite" style="border: none;"><span class="fr-icon favorite_large" style="font-size: 24px;" role="img" aria-label="Favorite">
                                                <img src="{{$clothesArray[$i + $j]['image']}}" alt="AIRism Cotton Áo Polo Vải Gân" class="thumb-img" loading="lazy" width="215" height="215">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @if($clothesArray[$i + $j]['sex'])
                                            <div class="col-3 font-weight-bold text-secondary">Nam</div>
                                        @else
                                            <div class="col-3 font-weight-bold text-secondary">Nữ</div>
                                        @endif
                                        @if($clothesArray[$i + $j]['shirt'])
                                            <div class="col text-right font-weight-bold text-secondary" style="margin-right: 10px">Áo</div>
                                        @else
                                            <div class="col text-right font-weight-bold text-secondary" style="margin-right: 10px">Quần</div>
                                        @endif
                                        <div class="col-1 font-weight-bold"></div>
                                    </div>
                                    <div class="title-section" style="margin-right: 10px">
                                        <h5 class="font-weight-bold">{{$clothesArray[$i + $j]['name']}}</h5>
                                    </div>
                                    <div class="price-section" style="margin-right: 10px">
                                        <h6 class="font-weight-bold text-danger">{{$clothesArray[$i + $j]['price']}}.000 VND</h6>
                                    </div>
                                    
                                </a>
                            </article>
                        </div>
                        @endif
                        @endfor
                    </div>
                @endfor
                </div>
                
            </div>
        </div>
    </div>
@endsection
