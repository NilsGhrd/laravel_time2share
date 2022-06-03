<a class='productInfo' data-category="{{$product->category}}" data-cost="{{$product->cost}}" href='/product/{{$product->id}}'>
    <article class="productCard">
        <figure class="productCard__figure">
            <img class="productCard__figure__img" src='../../img/products/{{json_decode($product->images)[0]}}' alt="foto van {{$product->title}}">
        </figure>
        <h2 class='productCard__title'>{{$product->title}}</h2>
        <section class='productCard__description'>
            <p>{{$product->description}}</p>
        </section>
        <section class='productCard__costs'>
            <p>€{{$product->cost}} per dag<p>
        </section>
    </article>
</a>