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
            <h2>お問い合わせ</h2>
        </div>

        <p class='caption'>※<span>*</span>がついている項目は必ず入力してください。</p>
        <form action="{{ route('contact.check') }}" method='POST'>
            @csrf
            <div class='unit'>
                <div class='head'>
                    <label for="name">氏名<span class='required'>*</span></label>
                </div>
                <div class='body column'>
                    <input type="text" name='name' id='name' value='{{ old("name") }}' class='short'>
                        @error('name')
                    <span class="error-message">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class='unit'>
                <div class='head'>
                    <label for="tel">電話番号<span class='required'>*</span></label>
                </div>
                <div class='body column'>
                    <input type="tel" name='tel' id='tel' value='{{ old("tel") }}' class='short'>
                    @error('tel')
                <span class="error-message">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
            </div>
            <div class='unit'>
                <div class='head'>
                    <label for="mail">メールアドレス<span class='required'>*</span></label>
                </div>
                <div class='body column'>
                    <input type="mail" name='mail' id='mail' value='{{ old("mail") }}'>
                    @error('mail')
                <span class="error-message">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                </div>
            </div>
            <div class='unit'>
                <div class='head'>
                    <label for="comment">お問い合わせ内容<span class='required'>*</span></label>
                </div>
                <div class='body column'>
                    <textarea name="comment" id="comment" cols="30" rows="10">{{old("comment")}}</textarea>
                    @error('comment')
                <span class="error-message">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
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
                $num = intval(str_replace('項目','',$amount));
                @endphp

                <div class='unit'>
                    <div class='head'>
                        <span>それぞれ何畳？</span>
                    </div>
                    <div class='body'>
                        @if($num === 1)
                        <span>変動項目（1）</span>
                        {{ $session['tatami'] }}
                        <input type="hidden" name='tatami' value='{{ $session["tatami"] }}'>
                        @else
                        @for($i = 1;$i<=$num;$i++) <span>変動項目（{{$i}}）</span>
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
                        <span>変動項目（1）</span>
                        {{ $session['type'] }}
                        <input type="hidden" name='type' value='{{ $session["type"] }}'>
                        @else
                        @for($i = 1;$i<=$num;$i++) <span>変動項目（{{$i}}）</span>
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
                        <span>変動項目（1）</span>
                        {{ $session['closet'] }}
                        <input type="hidden" name='closet' value='{{ $session["closet"] }}'>
                        @else
                        @for($i = 1;$i<=$num;$i++) <span>変動項目（{{$i}}）</span>
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
                        {{ number_format($session['price']) }}円
                        <input type="hidden" name='price' value='{{ $session["price"] }}'>
                    </div>
                </div>
            </div>

            <div class='controls'>
                <button name='back' class='back'><span>お見積もりをやり直す</span></button>
                <button name='submit' class='submit'><span>確認画面へ</span></button>
            </div>
        </form>

    </div>

</section>


@endsection