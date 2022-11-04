{{-- <h1>Trang chủ 2</h1> --}}
{{-- <h2>{{$welcome}}</h2> --}}
{{-- <h2>{{!empty(request()->keyword)?request()->keyword:'Không có gì'}}</h2>
<div class="container">
    {!! !empty($content)?$content:false !!}
</div>
<hr> --}}

{{-- @for ($i=1; $i<=10; $i++)
<p>Phần tử thứ: {{$i}}<p>
@endfor --}}

{{-- @while ($index<=10)
    <p>Phần tử thứ: {{$index}}</p>
    @php
        $index++;
    @endphp
@endwhile --}}

{{-- @foreach ($dataArr as $key =>  $item)
    <p>Phần tử: {{$item}} - {{$key}}</p>
@endforeach --}}

{{-- @forelse ($dataArr as $key =>  $item)
    <p>Phần tử: {{$item}} - {{$key}}</p>
@empty
    <p>Không có phần tử nào</p>
@endforelse --}}

{{-- @if ($number>=10)
<p>Đây là giá trị hợp lệ</p>
@else
<p>Giá trị không hợp lệ</p>
@endif --}}

{{-- @if ($number<0)
<p>Số âm</p>
@elseif($number>=0 && $number<5)
<p>Số siêu nhỏ</p>
@elseif($number>=5 && $number<10)
<p>Số trung bình</p>
@else
<p>Số lớn</p>
@endif --}}

{{-- @switch($number)
    @case(1)
        <p>Số thứ nhất</p>
        @break
    @case(2)
        <p>Số thứ hai</p>
        @break
    @default
        <p>Số còn lại</p>
@endswitch --}}

{{-- @for($i=1; $i<=10; $i++)
    <p>Phần tử thứ: {{$i}}</p>
    @if($i==5)
        @break
    @endif
@endfor --}}


{{-- @for($i=1; $i<=10; $i++)
    @if($i==5)
        @continue
    @endif
    <p>Phần tử thứ: {{$i}}</p>
@endfor --}}

{{-- @php
   $number = 5;
   if($number>=10){
       $total = $number + 20;
   }else{
       $total = $number + 10;
   }
@endphp

<h1>Kết quả: {{$number}} - {{$total}}</h1> --}}

{{-- @php
// $message="Đặt hàng thành công"    
@endphp
@include('parts.notice') --}}

@extends('layouts.client')
@section('title')
    {{$title}}
@endsection

@section('sidebar')
    @parent
    <h3>Home Sidebar</h3>
@endsection

@section('content')
    <h1>Trang chủ</h1>
    @datetime('2022-12-12 15:00:00')
    @include('clients.contents.slide')
    @include('clients.contents.about')
    @datetime('2022-11-11 17:00:00') 

    @env('production')
    <p>Môi trường production</p>
    @elseenv('test')
    <p>môi trường test</p>
    @else
    <p>môi trường dev</p>
    @endenv    


    <x-alert  type="info" :content="$message" data-icon="facebook" />

    {{-- <x-input.button/> --}}

    {{-- <x-form-button/> --}}
    {{-- <x-forms.button/> --}}

    <p><img src="https://znews-photo.zingcdn.me/w860/Uploaded/qhj_yvobvhfwbv/2018_07_18/Nguyen_Huy_Binh1.jpg" alt=""></p>

    {{-- <p><a href="{{route('download-image').'?image=https://znews-photo.zingcdn.me/w860/Uploaded/qhj_yvobvhfwbv/2018_07_18/Nguyen_Huy_Binh1.jpg'}} " class="btn btn-primary">Download ảnh</a></p> --}}

    <p><a href="{{route('download-image').'?image='.public_path('storage/Screenshot 2022-07-06 134816.png')}} " class="btn btn-primary">Download ảnh</a></p>

    <p><a href="{{route('download-doc').'?file='.public_path('storage/Screenshot 2022-07-06 134816.png')}} " class="btn btn-primary">Download tài liệu</a></p>
@endsection

@section('css')
    <style>
        img {
            width: 100%;
            height: auto;
        }
    </style>
@endsection

@section('js')

@endsection