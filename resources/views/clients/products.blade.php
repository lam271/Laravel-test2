@extends('layouts.client')
@section('title')
    {{$title}}
@endsection

{{-- @section('sidebar')
    @parent
    <h3>Product Sidebar</h3>
@endsection --}}

@section('content')
    <h1>Sản Phẩm</h1>
    <x-package-alert />
    @push('scripts')
        <script>
            console.log('push lần hai');
        </script>
    @endpush
@endsection

@section('css')
    
@endsection

@section('js')
    
@endsection

@prepend('scripts')
    <script>
        console.log('push lần một');
    </script>
@endprepend

