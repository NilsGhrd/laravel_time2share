@extends('default')

@section('title')
Time2Share - Reviews
@endsection

@section('content')
    @if($reviews == '[]')
        <section class='noReview'>
            <h2>Er zijn nog geen reviews over jou geplaatst</h2>
        </section>
    @else    
        <section class='reviewInfo'>
            <h2 class='reviewInfo__title'>Reviews</h2>
            <p class='reviewInfo__score'>Gemiddelde score: {{$average}}</p>
        </section>
        <table class='table'>
            <tr>
                <th>Datum</th>
                <th>Titel</th>
                <th>Beschrijving</th>
                <th>Score</th>
            </tr>
            @foreach($reviews as $review)
                <tr>
                <td>@php echo substr($review->created_at, 0, 10) @endphp</td>
                <td>{{$review->review_title}}</td>
                <td>{{$review->review_description}}</td>
                <td>{{$review->review_score}}</td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection