@extends('default')

@section('title')
Time2Share - Admin
@endsection

@section('filter')
<section class='accountFilter'>
    <button class='accountFilter__button' onclick='showSection(0)'>Gebruikers {{(count($users))}}</button>
    <button class='accountFilter__button' onclick='showSection(1)'>Producten {{(count($products))}}</button>
</section>
@endsection
@section('content')
<section class='userInfo'>
   <h1 class='userInfo__welcome'>Welkom {{Auth::user() -> name}}</h1>
    <form class='userInfo__form' action='/logout' method='POST'>
        @csrf
        <button class='userInfo__button' type='submit'>Uitloggen</button>
    </form>
    <h2 class='userInfo__sectionText' id='js--sectionText'>Gebruikers</h2>
</section>

<section id='js--userSection'>
   <table class='table'>
      <tr>
         <th>Naam</th>
         <th>Email</th>
         <th>Status</th>
         <th>Actie</th>
      </tr>
      @foreach($users as $user)
         <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
               @if($user->blocked)
                  Geblokkeerd
               @else
                  Actief
               @endif
            </td>
            <td>
               <form action='/admin/user/block/{{$user->id}}' method='POST'>
                  @csrf
                  @if($user->blocked)
                     <button class='table__button' type='submit'>Deblokkeer</button>
                  @else
                     <button class='table__button' type='submit'>Blokkeer</button>
                  @endif
               </form>
            </td>
         </tr>
      @endforeach
   </table>
</section>
<section id='js--productSection'>
<table class='table'>
      <tr>
         <th>ID</th>
         <th>Naam</th>
         <th>Actie</th>
      </tr>
      @foreach($products as $product)
         <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->title}}</td>
            <td>
               <form action='/admin/product/delete/{{$product->id}}' method='POST'>
                  @csrf
                  <button  class='table__button' type='submit'>Verwijder</button>
               </form>
            </td>
         </tr>
      @endforeach
   </table>
</section> 
@endsection