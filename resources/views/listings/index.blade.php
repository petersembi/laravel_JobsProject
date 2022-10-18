{{-- blade is used to clean up the code a little bit --}}
{{-- we use directives --}}
@extends('layout')

@section('content')
<form action="/">
    <div class="relative border-2 border-gray-100 m-4 rounded-lg">
      <div class="absolute top-4 left-3">
        <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
      </div>
      <input type="text" name="search" class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
        placeholder="Search Laravel Gigs..." />
      <div class="absolute top-2 right-2">
        <button type="submit" class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600">
          Search
        </button>
      </div>
    </div>
  </form>

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">


@if (count($listings)==0)
    <p>No Listings found</p>    
@endif

@foreach ($listings as $listing)
<h2>
    <a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a>
</h2>
<p>
    {{$listing['description']}};
</p>

    @php
        $listingsCsv = $listing['tags'];
        $tags = explode(',',  $listingsCsv);


    @endphp
    <ul>
        @foreach($tags as $tag)
        <li><a href="/?tag={{$tag}}">{{$tag}}</a></li>
        @endforeach
    </ul>
@endforeach

</div>

@endsection


