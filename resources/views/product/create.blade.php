@extends('default')

@section('title')
Time2Share - Product Uploaden
@endsection

@section('content')
<form class='form' action='/product' method='POST' enctype="multipart/form-data">
    @csrf
    <h2 class='form__title'>Product adverteren</h2>

    <section>
        <label class='form__label' for='title'>Titel</label>
        <input name='title' id='title' type='text' required>
    </section>

    <section>
        <label class='form__label' for='category'>Categorie</label>
        <select name='category' id='category'>
            @foreach($productCategory as $categories)
                <option value={{$categories->category}}>{{$categories->category}}</option>
            @endforeach
        </select>
    </section>

    <section>
        <label class='form__label' for='description'>Beschrijving</label>
        <textarea name='description' id='description' required></textarea>
    </section>

    <section>
        <label class='form__label' for='cost'>Huurkosten per dag</label>
        <input name='cost' id='cost' type='number' required>
    </section>

    <section>
        <label class='form__label' for='max_days'>Aantal dagen te huur</label>
        <input name='max_days' id='max_days' type='number' required>
    </section>

    <section>
        <label class='form__label' for='images'>Foto's van het product</label>
        <input name='images[]' id='images' type='file' accept='.jpg, .png, .jpeg' multiple required>
    </section>

    <button class='form__button' type='submit'>Upload Product</button>
</form>
@endsection