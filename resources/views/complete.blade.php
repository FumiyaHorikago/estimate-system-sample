@extends('layouts.template')

@push('css')
<link rel='stylesheet' href='{{ asset("css/contact.css") }}'>
@endpush
@push('js')
<script src="{{ asset('js/odometer.js') }}"></script>
@endpush
@section('content')

<section id='contact'>

    <div id='form' class='complete'>
        <div class='title'>
            <h2>お問い合わせ</h2>
        </div>
        <h2>お問い合わせが送信されました。</h2>
        <p>
            お問い合わせいただきありがとうございます。<br>
        </p>
        <div class='btn'>
        <a href="{{ route('home') }}"><span>再度お見積もりをする</span></a>
        </div>
    </div>

</section>


@endsection