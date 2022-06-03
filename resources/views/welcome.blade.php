@extends('default')

@section('title')
Time2Share
@endsection

@section('content')
<section class="productIndex">
@foreach($products as $product)
    @include('product.card')
@endforeach
</section>
@endsection