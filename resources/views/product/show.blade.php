@extends('default')

@section('title')
Time2Share - {{$product->title}}
@endsection

@section('content')
<section class='productShow'>
    <figure class='productShow__figure'>
        <img src='../../img/products/{{json_decode($product->images)[0]}}' alt="foto van {{$product->title}}">
    </figure>
    <section class='productShow__info'>
        <h2 class='productShow__info__title'>{{$product->title}}</h2>
        <p class='productShow__info__description'><b>Beschrijving</b></p>
        <p>{{$product->description}}</p>

        <p class='productShow__info__description'><b>Kosten</b></p>
        <p>Kosten per dag: €{{$product->cost}}</p>
        
        <p class='productShow__info__description'><b>Huurtermijn</b></p>
        <p>Max huur dagen: {{$product->max_borrow_days}}</p>
        
        <p class='productShow__info__description'><b>Eigenaar</b></p>
        <p>{{$owner->name}}</p>
        @auth
            <form action='../product/agreement/create' method='POST'>
                @csrf
                <input name='product_id' type='hidden' value='{{$product->id}}'>
                <input name='owner_id' type='hidden' value='{{$product->owner_id}}'>
                <input name='renter_id' type='hidden' value='{{auth()->user()->id}}'>
                <button class='productShow__info__button' type='submit'>Huur dit product!</button>
            </form>
        @endauth
        @guest
            <button class='productShow__info__button' onclick='location.href="/register"'>Log in om te huren</button>
        @endguest
    </section>
</section>
<section class='container__productGallery'>
    <section class='productGallery'>
        @foreach(json_decode($product->images) as $image)
            <figure class='productGallery__figure'>
                <img class='productGallery__figure__img' src='../../img/products/{{$image}}' alt='foto van {{$product->title}}'>
            </figure>
        @endforeach
    </section>
</section>
@endsection