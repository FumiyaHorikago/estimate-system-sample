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
            <div class='logo'>
                <img src="{{ asset('images/mv_icon.png') }}" alt="ハウスmuch?">
            </div>
            <h2>お見積もり内容でお問い合わせ</h2>
        </div>
        <h2>お問い合わせが送信されました。</h2>
        <p>
            お問い合わせいただきありがとうございます。<br>
            確認のため、お客様に自動返信メールをお送りしております。<br><br>
            お問い合わせいただいた内容につきましては、<br>
            後日担当者より連絡させていただきます。<br>
            今しばらくお待ちください。
        </p>
        <div class='btn'>
        <a href="{{ route('home') }}"><span>再度お見積もりをする</span></a>
        <a href=""><span>（株）タカケンのホームページへ</span></a>
        </div>
    </div>

</section>


@endsection