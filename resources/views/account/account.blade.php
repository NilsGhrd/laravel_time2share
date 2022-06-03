@extends('default')

@section('title')
Time2Share - Account
@endsection

@section('filter')
<section class='accountFilter'>
    <button class='accountFilter__button' onclick='showSection(0)'>Geadverteerd {{(count($advertisedProducts))}}</button>
    <button class='accountFilter__button' onclick='showSection(1)'>Verhuurd {{(count($lentProducts))}}</button>
    <button class='accountFilter__button' onclick='showSection(2)'>Gehuurd {{(count($rentedProducts))}}</button>
    <button class='accountFilter__button' onclick='showSection(3)'>Geschiedenis {{(count($history))}}</button>
</section>
@endsection
@section('content')
@if($account->role == 'Admin')
    <script>window.location = '/admin';</script> 
@endif
<section class='userInfo'>
    <h1 class='userInfo__welcome'>Welkom {{$account -> name}}</h1>
    <form class='userInfo__form' action='/logout' method='POST'>
        @csrf
        <button class='userInfo__button' type='submit'>Uitloggen</button>
    </form>
    <button class='userInfo__button' onclick='location.href = "../account/review"'>Bekijk je reviews</button>
    <h2 class='userInfo__sectionText' id='js--sectionText'>Geadverteerde Items</h2>
</section>

<!-- geadverteerde producten -->
<section id='js--advertisedSection'>
    <section class="productIndex">
        @foreach($advertisedProducts as $product)
            <section>
                @include('account.card')
                <form action='../product/delete' method='POST'>
                    @csrf
                    <input name='product_id' type='hidden' value='{{$product->id}}'>
                    <button class='productIndex__delete_button' type='submit'>Verwijder afvertentie</button>
                </form>
            </section>
        @endforeach
    </section>
</section>

<!-- Uitgeleende producten -->
<section id='js--lentSection'>
    @foreach($lentProducts as $product)
        @if($product->status == 'RENTED_OUT')
            <section class="productIndex">
                <section>
                    @include('account.card')
                    <button class='productIndex__button' disabled>Dit product is bij de huurder</button>
                <secion>
            </section>
        @endif
        @if($product->status == 'RETURNED')
            <section class="productIndex">
                <section>
                    @include('account.card')
                    <form action='../product/agreement/update' method='POST'>
                        @csrf
                        <input name='product_id' type='hidden' value='{{$product->id}}'>
                        <input name='status_type' type='hidden' value='RETURNED'>
                        <button class='productIndex__button' type='submit'>Bevestig dat product terug is</button>
                    <form>
                </section>
            </section>
        @endif
    @endforeach
</section>

<!-- Gehuurde producten -->
<section id='js--rentedSection'>
    @foreach($rentedProducts as $product)
        @if($product->status == 'RENTED_OUT')
            <section class="productIndex">
                <section>
                    @include('account.card')
                    <form action='../product/agreement/update' method='POST'>
                        @csrf
                        <input name='product_id' type='hidden' value='{{$product->id}}'>
                        <input name='status_type' type='hidden' value='RENTED_OUT'>
                        <button class='productIndex__button' type='submit'>Product teruggebracht - Nog {{$product->max_borrow_days}} dagen</button>
                    </form>
                <section>
            </section>
        @endif
        @if($product->status == 'RETURNED')
            <section class="productIndex">
                <section>
                    @include('account.card')
                    <button class='productIndex__button' disabled>Wachten op goedkeuring</button>
                </section>
            </section>
        @endif
    @endforeach
</section>

<!-- Eerder gehuurde producten -->
<section id='js--historySection'>
    <table class='table'>
        <tr>
            <th>Datum</th>
            <th>Productnaam</th>
            <th>Eigenaar</th>
            <th>Review</th>
        </tr>
        @for($i = 0; $i < count($history); $i++)
            <tr>
                <td>@php echo substr($history[$i]->created_at, 0, 10) @endphp</td>
                <td>{{$history[$i]->product_title}}</td>
                <td>{{$historyAccounts[$i]->name}}</td>
                <td><button class='table__button' onclick='location.href="../account/review/create/{{$historyAccounts[$i]->id}}"'>Schrijf een review</button></td>
            </tr>
        @endfor
    </table>
</section>


@endsection