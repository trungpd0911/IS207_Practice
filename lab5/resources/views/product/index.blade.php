@extends('layouts.app')
@section('css')
    <!-- Bootstrap -->
    <link rel="stylesheet" href=" {{ asset('./resources/css/bootstrap.min.css') }}">
    <!-- FontAwsome -->
    <link rel="stylesheet" href=" {{ asset('./resources/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <style>
        .input-group input {
            font-size: 16px !important;
        }

        .input-group {
            position: relative;
            display: table;
            border-collapse: separate;
        }
    </style>
@endsection

@section('content')
    <div id="main">
        <div class="container">
            <form action="{{ route('product.search') }}" method="POST">
                @csrf
                <input type="hidden" name="action" value="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm theo tên sản phẩm..." name="keyword"
                        id="keyword">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
            </form>
        </div>
        <br />
        <!-- Grid system -->
        <div id="search-result" class="row">
            @foreach ($allProduct as $product)
                <div class='col-md-4 col-sm-6 col-xs-12 thumbnail'>
                    <img class='img-responsive' src='{{ $product->ImageLink }}'>
                    <p class='product-id' style='display:none;'>{{ $product->id }}</p>
                    <p class='product-name'>{{ $product->ProductName }}</p>
                    <p class='product-price'> {{ $product->SalePrice }} </p>
                </div>
            @endforeach
        </div>
    </div>
    </div>

    <!-- Footer -->
    <div id="footer">
        <div class="container">
            <p>All rights reserved by RaoVat.Com</p>

        </div>
    </div>
@endsection
