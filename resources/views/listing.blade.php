
{{-- blade is used to clean up the code a little bit --}}
{{-- we use directives --}}



<h1>{{$heading}}</h1>


@if (count($listing)==0)
    <p>No Listings found</p>
    
@endif

@foreach ($listing as $list)
<h2>
    {{$listing['title']}}
</h2>
<p>
    {{$listing['description']}}
</p>
@endforeach


