@extends('default')

@section('title')
Time2Share - Reviews
@endsection

@section('content')
    <form class='form' action='/account/review/create' method='POST'>
        @csrf
        <h2 class='form__title'>Review plaatsen</h2>
        <input name='account_id' type='hidden' value='{{$id}}'>
            <section>
                <label class='form__label' for='title'>Titel</label>
                <input name='title' type='text'>
            </section>

            <section>
                <label class='form__label' for='description'>Beschrijving</label>
                <textarea name='description'></textarea>
            </section>

            <section>
                <label class='form__label' for='score'>Review Score</label>
                <select name='score'>
                    <option>5 - Zeer tevreden</option>
                    <option>4 - Tevreden</option>
                    <option>3 - Gemiddeld</option>
                    <option>2 - Slecht</option>
                    <option>1 - Zeer slecht</option>
                </select>
            </section>
        <button class='form__button' type='submit'>Plaats Review</button>
    </form>
@endsection