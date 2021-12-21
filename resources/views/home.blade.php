@extends('layouts.template')

@section('content')

@foreach($parents as $parent)
<section>
    <div>
        <div class='title'>
            <h2>{{ $parent->name }}</h2>
        </div>
        <ul class='items'>
            @foreach($children as $child)
                @if($child->parent_id === $parent->id)
                    <li>

                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</section>
@endforeach


@endsection