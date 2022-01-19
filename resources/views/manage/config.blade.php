@extends('layouts.manage')

@push('nav4')
active
@endpush
@section('content')
<div class="container">
    <div class='col-md-12'>
        @if (session('config_alert'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('config_alert') }}
        </div>
        @endif
        <form action="{{ route('manage.money.update') }}" method='POST'>
            @csrf
            <div class='mb-3'>
                <label for="">単価設定</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{ $money[0]->price }}" name='price' autocomplete='off' required>
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <input type="submit" class='btn btn-success mt-3 col-sm-2' value='変更する'>
        </form>
    </div>
</div>
@endsection