@extends('layouts.template')

@push('css')
<link rel='stylesheet' href='{{ asset("css/contact.css") }}'>
@endpush
@push('js')
<script src="{{ asset('js/odometer.js') }}"></script>
@endpush
@section('content')

<section id='contact'>

    <div id='form'>
        <div class='title'>
            <div class='logo'>
                <img src="{{ asset('images/mv_icon.png') }}" alt="ハウスmuch?">
            </div>
            <h2>お見積もり内容でお問い合わせ</h2>
        </div>

        <form action="{{ route('contact.store') }}" method='POST'>
            @csrf
            <div class='unit'>
                <div class='head'>
                    <span>氏名</span>
                </div>
                <div class='body'>
                    {{$session['name']}}
                    <input type="hidden" name='name' id='name' value='{{ $session["name"] }}'>
                </div>
            </div>
            <div class='unit'>
                <div class='head'>
                    <span>電話番号</span>
                </div>
                <div class='body'>
                    {{$session['tel']}}
                    <input type="hidden" name='tel' id='tel' value='{{ $session["tel"] }}'>
                </div>
            </div>
            <div class='unit'>
                <div class='head'>
                    <span>メールアドレス</span>
                </div>
                <div class='body'>
                    {{$session['mail']}}
                    <input type="hidden" name='mail' id='mail' value='{{ $session["mail"] }}'>
                </div>
            </div>
            <div class='unit'>
                <div class='head'>
                    <span>お問い合わせ内容</span>
                </div>
                <div class='body'>
                    {!! nl2br(e($session['comment'])) !!}
                    <input type="hidden" name='comment' id='comment' value='{{ $session["comment"] }}'>
                </div>
            </div>
            <div class='choose'>
                <div class='unit'>
                    <div class='head'>
                        <span>建物の形式は？</span>
                    </div>
                    <div class='body'>
                        {{ $session['format'] }}
                        <input type="hidden" name='format' value='{{ $session["format"] }}'>
                    </div>
                </div>
                <div class='unit'>
                    <div class='head'>
                        <span>リビングの広さは？</span>
                    </div>
                    <div class='body'>
                        {{ $session['living'] }}
                        <input type="hidden" name='living' value='{{ $session["living"] }}'>
                    </div>
                </div>
                <div class='unit'>
                    <div class='head'>
                        <span>ダイニングの広さは？</span>
                    </div>
                    <div class='body'>
                        {{ $session['dining'] }}
                        <input type="hidden" name='dining' value='{{ $session["dining"] }}'>
                    </div>
                </div>
                <div class='unit'>
                    <div class='head'>
                        <span>DK以外の希望部屋数は？</span>
                    </div>
                    <div class='body'>
                        {{ $session['amount'] }}
                        <input type="hidden" name='amount' value='{{ $session["amount"] }}'>
                    </div>
                </div>
                @php
                $amount = $session['amount'];
                $num = intval(str_replace('部屋','',$amount));
                @endphp

                <div class='unit'>
                    <div class='head'>
                        <span>それぞれ何畳？</span>
                    </div>
                    <div class='body'>
                        @if($num === 1)
                        <span>部屋（1）</span>
                        {{ $session['tatami'] }}
                        <input type="hidden" name='tatami' value='{{ $session["tatami"] }}'>
                        @else
                        @for($i = 1;$i<=$num;$i++) <span>部屋（{{$i}}）</span>
                            {{ $session['tatami'][$i-1] }}
                            <input type="hidden" name='tatami[]' value='{{ $session["tatami"][$i-1] }}'>
                            @endfor
                            @endif
                    </div>
                </div>
                <div class='unit'>
                    <div class='head'>
                        <span>それぞれの部屋タイプは？</span>
                    </div>
                    <div class='body'>
                        @if($num === 1)
                        <span>部屋（1）</span>
                        {{ $session['type'] }}
                        <input type="hidden" name='type' value='{{ $session["type"] }}'>
                        @else
                        @for($i = 1;$i<=$num;$i++) <span>部屋（{{$i}}）</span>
                            {{ $session['type'][$i-1] }}
                            <input type="hidden" name='type[]' value='{{ $session["type"][$i-1] }}'>
                            @endfor
                            @endif
                    </div>
                </div>

                <div class='unit'>
                    <div class='head'>
                        <span>それぞれの部屋の収納は？</span>
                    </div>
                    <div class='body'>
                        @if($num === 1)
                        <span>部屋（1）</span>
                        {{ $session['closet'] }}
                        <input type="hidden" name='closet' value='{{ $session["closet"] }}'>
                        @else
                        @for($i = 1;$i<=$num;$i++) <span>部屋（{{$i}}）</span>
                            {{ $session['closet'][$i-1] }}
                            <input type="hidden" name='closet[]' value='{{ $session["closet"][$i-1] }}'>
                            @endfor
                            @endif
                    </div>
                </div>
                <div class='unit'>
                    <div class='head'>
                        <span>お見積もり金額</span>
                    </div>
                    <div class='body'>
                        {{ $session['price'] }}円
                        <input type="hidden" name='price' value='{{ $session["price"] }}'>
                    </div>
                </div>
            </div>

            <div class='controls'>
                <button name='back' class='back'><span>戻る</span></button>
                <button name='submit' class='submit'><span>送信する</span></button>
            </div>
        </form>

    </div>

</section>


@endsection