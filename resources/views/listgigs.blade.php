




{{-- blade is used to clean up the code a little bit --}}
{{-- we use directives --}}



<h1>{{$heading}}</h1>
@php


@endphp;

@if (count($listings)==0)
    <p>No Listings found</p>
    
@endif

@foreach ($listings as $listing)
<h2>
    {{$listing['title']}}
</h2>
<p>
    {{$listing['description']}}
</p>
@endforeach


{{-- unless directive --}}
@unless (count($listings)==0)
    @foreach ($listings as $listing)
    <h2>
        {{$listing['title']}}
    </h2>
    <p>
        {{$listing['description']}}
    </p>
    @endforeach

    @else
        <p>No listings found</p>
@endunless