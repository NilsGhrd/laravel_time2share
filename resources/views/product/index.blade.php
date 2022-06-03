@extends('default')

@section('title')
Time2Share - Producten
@endsection
@section('filter')
<section class='productFilter'>
    <section class='productFilter__container'>
        <label for="js--minCost">Vanaf €</label>
        <label for="js--maxCost">Tot €</label>
        <label for="js--category">Category</label>

        <input class='productFilter__container__input' id="js--minCost" type="number">
        <input class='productFilter__container__input' id="js--maxCost" type="number">
        <select class='productFilter__container__select' id="js--category">
            <option>Alles</option>
        </select>
    </section>
</section>
@endsection
@section('content')
    
    <section class="productIndex">
        @foreach($products as $product)
            @auth
                @if(auth()->user()->id != $product->owner_id)
                    @include('product.card')
                @endif
            @endauth
            @guest
                @include('product.card')
            @endguest
        @endforeach
    </section>
@endsection