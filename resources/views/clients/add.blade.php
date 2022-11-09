@extends('layouts.client')
@section('title')
    {{$title}}
@endsection

@section('content')
    <h1>Thêm sản phẩm</h1>
    <form action="{{route('post-add')}}" method="POST" id="product-form">
        
        @error('msg')
            <div class="alert alert-danger text-center">{{$message}}</div>
        @enderror
        <div class="mb-3">
            <label for="">Tên sản phẩm</label>
            <input type="text" class="form-control" name="product_name" placeholder="Tên sản phẩm..."
            value="{{old('product_name')}}">
            @error('product_name')
                <span style="color: red">
                    {{$message}}
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Giá sản phẩm</label>
            <input type="text" class="form-control" name="product_price" placeholder="Giá sản phẩm..." value="{{old('product_price')}}">
            @error('product_price')
                <span style="color: red">
                    {{$message}}
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm mới</button>
        @csrf

    </form>
@endsection

@section('css')
    
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('#product-form').on('submit', function(e){
                e.preventDefault();

                let productName = $('input[name="product_name"]').val().trim();

                let productPrice = $('input[name="product_price"]').val().trim();

                let actionUrl = $(this).attr('action');

                let csrfToken = $(this).find('input[name="_token"]').val();


                $.ajax({
                    url: actionUrl,
                    type: 'POST',
                    data: {
                        productName: productName,
                        productPrice: productPrice,
                        _token: csrfToken

                    },
                    dataType: 'text',
                    success: function(response){
                        console.log(response);
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endsection