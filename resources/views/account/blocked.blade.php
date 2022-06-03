@extends('default')

@section('title')
Time2Share - Account
@endsection

@section('content')

<section class='blocked'>
    <h2>Je account is geblokkeerd.</h2>
    <form action='/logout' method='POST'>
        @csrf
        <button class='productShow__info__button' type='submit'>Uitloggen</button>
    </form>
</section>
@endsection