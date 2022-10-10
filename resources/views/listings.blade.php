{{-- blade is used to clean up the code a little bit --}}
{{-- we use directives --}}
@extends('layout')

@section('content')

<h1>{{$heading}}</h1>


@if (count($listings)==0)
    <p>No Listings found</p>    
@endif

@foreach ($listings as $listing)
<h2>
    <a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a>
</h2>
<p>
    {{$listing['description']}}
</p>
@endforeach

@endsection


