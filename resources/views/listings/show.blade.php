
{{-- blade is used to clean up the code a little bit --}}
{{-- we use directives --}}

@extends('layout')

@section('content')

<h1>{{$heading}}</h1>




<h2>
    {{$listing['title']}}
</h2>
<p>
    {{$listing['description']}}
</p>

@endsection

