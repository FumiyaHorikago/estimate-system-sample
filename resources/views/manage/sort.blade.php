@extends('layouts.manage')

@push('nav2')
active
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 bg-light">

                <div class="card-body">
                    <div class="alert alert-success d-none" role="alert" id='true'>
                    </div>
                    <div class="alert alert-danger d-none" role="alert" id='false'>
                    </div>
                    <form action="{{ route('manage.child.order') }}" method='post'>
                        @csrf
                        <ul class='order-list list-unstyled'>
                                @foreach($parents as $parent)
                                <li>
                                    <span>
                                        {{ $parent->name }}
                                    </span>
                                    <div class='children-list'>
                                        <ol class='list-unstyled'>
                                            @php $count = 1; @endphp
                                            @foreach($children as $child)
                                            @if($child->prefix === $parent->prefix)
                                            <li>
                                                <div class='index'>
                                                    {{ $count }}
                                                </div>
                                                <div class='item'>
                                                    {{ $child->title }}
                                                    <input type="hidden" name='child_id[]' value='{{ $child->id }}' class='child_id'>
                                                </div>
                                                <div class='delete'>
                                                    <a href="{{ route('manage.child.destroy',['id'=>$child->id]) }}" class='text-danger' onclick="return confirm('{{$child->title}}を削除しますか？')">×</a>
                                                </div>
                                            </li>
                                            @php $count++; @endphp
                                            @endif
                                            @endforeach
                                        </ol>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection