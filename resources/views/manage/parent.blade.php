@extends('layouts.manage')

@push('nav3')
active
@endpush
@section('content')
<div class="container">
    <div class='col-md-12'>
        @if (session('parents_alert'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('parents_alert') }}
        </div>
        @endif
        <form action="{{ route('manage.parent.update') }}" method='POST'>
            @csrf
            @foreach($parents as $parent)
            <div class='mb-3'>
                <label for="">項目{{$loop->iteration}}</label>
                <input type="text" class='form-control' value="{{ $parent->name }}" name='name[]' required>
            </div>
            @endforeach
            <input type="submit" class='btn btn-success mt-3 col-sm-2' value='変更する'>
        </form>

    </div>
</div>
@endsection