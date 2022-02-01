
        <div class='parent' id="{{ $parents[0]->prefix }}">
            <div class='title'>
                <h2>{{ $parents[0]->name }}</h2>
            </div>

            <div class="swiper-container slider1 items">
                <ul class="swiper-wrapper list-unstyled">
                    @php $count = 1; @endphp
                    @foreach($children as $child)
                    @if($child->prefix === $parents[0]->prefix)
                    <div class='swiper-slide'>
                    <label for="child{{ $child->id }}" class='mobile'>
                        <li class='child'>
                            <div class="img">
                                <img src="{{ asset('uploads/'.$child->file_name) }}" alt="{{ $child->title }}">
                            </div>
                            <div class='child-info'>
                                <strong><input type="radio" value='{{ $child->coefficient }}' name='{{ $parents[0]->prefix }}' id="child{{ $child->id }}" class='radio' required @if($count===1) checked @endif>{{ $child->title }}</strong>
                                <p>
                                    {{ $child->text }}
                                </p>
                            </div>
                        </li>
                    </label>
                    </div>
                    @php

                    if($count === 1){
                    $normal_0 = $child->title;
                    }
                    $count++

                    @endphp
                    @endif
                    @endforeach
                </ul>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            </div>
        <!--▲ 項目1 ////////////////////////////////////////////////////////▲-->


        <!--▼ 項目2 ////////////////////////////////////////////////////////▼-->
        <div class='parent' id="{{ $parents[1]->prefix }}">
            <div class='title'>
                <h2>{{ $parents[1]->name }}</h2>
            </div>
            <div class="swiper-container slider2 items">
                <ul class="swiper-wrapper list-unstyled">
                    @php $count = 1; @endphp
                    @foreach($children as $child)
                    @if($child->prefix === $parents[1]->prefix)
                    <div class='swiper-slide'>
                    <label for="child{{ $child->id }}" class='mobile'>
                        <li class='child'>
                            <div class="img">
                                <img src="{{ asset('uploads/'.$child->file_name) }}" alt="{{ $child->title }}">
                            </div>
                            <div class='child-info'>
                                <strong><input type="radio" value='{{ $child->coefficient }}' name='{{ $parents[1]->prefix }}' id="child{{ $child->id }}" class='radio' required @if($count===1) checked @endif>{{ $child->title }}</strong>
                                <p>
                                    {{ $child->text }}
                                </p>
                            </div>
                        </li>
                    </label>
                    </div>
                    @php

                    if($count === 1){
                    $normal_1 = $child->title;
                    }
                    $count++

                    @endphp
                    @endif
                    @endforeach
                </ul>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        <!--▲ 項目2 ////////////////////////////////////////////////////////▲-->


        <!--▼ 項目3 ////////////////////////////////////////////////////////▼-->
        <div class='parent' id="{{ $parents[2]->prefix }}">
            <div class='title'>
                <h2>{{ $parents[2]->name }}</h2>
            </div>
            <div class="swiper-container slider3 items">
                <ul class="swiper-wrapper list-unstyled">
                    @php $count = 1; @endphp
                    @foreach($children as $child)
                    @if($child->prefix === $parents[2]->prefix)
                    <div class='swiper-slide'>
                    <label for="child{{ $child->id }}" class='mobile'>
                        <li class='child'>
                            <div class="img">
                                <img src="{{ asset('uploads/'.$child->file_name) }}" alt="{{ $child->title }}">
                            </div>
                            <div class='child-info'>
                                <strong><input type="radio" value='{{ $child->coefficient }}' name='{{ $parents[2]->prefix }}' id="child{{ $child->id }}" class='radio' required @if($count===1) checked @endif>{{ $child->title }}</strong>
                                <p>
                                    {{ $child->text }}
                                </p>
                            </div>
                        </li>
                    </label>
                    </div>
                    @php

                    if($count === 1){
                    $normal_2 = $child->title;
                    }
                    $count++

                    @endphp
                    @endif
                    @endforeach
                </ul>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        <!--▲ 項目3 ////////////////////////////////////////////////////////▲-->


        <!--▼ 項目4 ////////////////////////////////////////////////////////▼-->
        <div class='parent' id="{{ $parents[3]->prefix }}">
            <div class='title'>
                <h2>{{ $parents[3]->name }}</h2>
            </div>
            <div class="swiper-container slider4 items">
                <ul class="swiper-wrapper list-unstyled">
                    @php $count = 1; @endphp
                    @foreach($children as $child)
                    @if($child->prefix === $parents[3]->prefix)
                    <div class='swiper-slide'>
                    <label for="child{{ $child->id }}" class='mobile amount-item'>
                        <li class='child'>
                            <div class="img">
                                <img src="{{ asset('uploads/'.$child->file_name) }}" alt="{{ $child->title }}">
                            </div>
                            <div class='child-info'>
                                <strong><input type="radio" value='{{ $child->coefficient }}' name='{{ $parents[3]->prefix }}' id="child{{ $child->id }}" class='radio' required @if($count===1) checked @endif>{{ $child->title }}</strong>
                                <p>
                                    {{ $child->text }}
                                </p>
                            </div>
                        </li>
                    </label>
                    </div>
                    @php

                    if($count === 1){
                    $normal_3 = $child->title;
                    }
                    $count++

                    @endphp
                    @endif
                    @endforeach
                </ul>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        <!--▲ 項目4 ////////////////////////////////////////////////////////▲-->


        <!--▼ 項目5 ////////////////////////////////////////////////////////▼-->
        <div class='parent' id="{{ $parents[4]->prefix }}">
            <div class='title'>
                <h2>{{ $parents[4]->name }}</h2>
            </div>
            @for($i = 1; $i <= $amount; $i ++)
            <div class='variable{{$i}} @if($i !== 1) hide @endif'>
                <div class='subtitle @if($i%2 == 0) even @else odd @endif'>
                    <h3>変動項目({{$i}})</h3>
                </div>
                <div class="swiper-container slider5-{{$i}} items">
                <ul class="swiper-wrapper list-unstyled">
                    @php $count = 1; @endphp
                    @foreach($children as $child)
                    @if($child->prefix === $parents[4]->prefix)
                    <div class='swiper-slide'>
                    <label for="child{{ $child->id }}-{{$i}}" class='mobile'>
                        <li class='child'>
                            <div class="img">
                                <img src="{{ asset('uploads/'.$child->file_name) }}" alt="{{ $child->title }}">
                            </div>
                            <div class='child-info'>
                                <strong><input type="radio" value='{{ $child->coefficient }}' name='{{ $parents[4]->prefix }}-{{$i}}' id="child{{ $child->id }}-{{$i}}" class='radio variable-input-{{$i}}' required @if($i !==1) disabled @endif @if($count===1 && $i===1) checked @endif>{{ $child->title }}</strong>
                                <p>
                                    {{ $child->text }}
                                </p>
                            </div>
                        </li>
                    </label>
                    </div>
                    @php

                    if($count === 1){
                    $normal_4 = $child->title;
                    }
                    $count++

                    @endphp
                    @endif
                    @endforeach
                </ul>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            </div>
            @endfor
    </div>
    <!--▲ 項目5 ////////////////////////////////////////////////////////▲-->



    <!--▼ 項目6 ////////////////////////////////////////////////////////▼-->
    <div class='parent' id="{{ $parents[5]->prefix }}">
        <div class='title'>
            <h2>{{ $parents[5]->name }}</h2>
        </div>
        @for($i = 1; $i <= $amount; $i ++)
            <div class='variable{{$i}} @if($i !== 1) hide @endif'>
                <div class='subtitle @if($i%2 == 0) even @else odd @endif'>
                    <h3>変動項目({{$i}})</h3>
                </div>
                <div class="swiper-container slider6-{{$i}} items">
                <ul class="swiper-wrapper list-unstyled">
                    @php $count = 1; @endphp
                    @foreach($children as $child)
                    @if($child->prefix === $parents[5]->prefix)
                    <div class='swiper-slide'>
                    <label for="child{{ $child->id }}-{{$i}}" class='mobile'>
                        <li class='child'>
                            <div class="img">
                                <img src="{{ asset('uploads/'.$child->file_name) }}" alt="{{ $child->title }}">
                            </div>
                            <div class='child-info'>
                                <strong><input type="radio" value='{{ $child->coefficient }}' name='{{ $parents[5]->prefix }}-{{$i}}' id="child{{ $child->id }}-{{$i}}" class='radio variable-input-{{$i}}' required @if($i !==1) disabled @endif @if($count===1 && $i===1) checked @endif>{{ $child->title }}</strong>
                                <p>
                                    {{ $child->text }}
                                </p>
                            </div>
                        </li>
                    </label>
                    </div>
                    @php

                    if($count === 1){
                    $normal_5 = $child->title;
                    }
                    $count++

                    @endphp
                    @endif
                    @endforeach
                </ul>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            </div>
            @endfor
    </div>
    <!--▲ 項目6 ////////////////////////////////////////////////////////▲-->


    <!--▼ 項目7 ////////////////////////////////////////////////////////▼-->
    <div class='parent' id="{{ $parents[6]->prefix }}">
        <div class='title'>
            <h2>{{ $parents[6]->name }}</h2>
        </div>
        @for($i = 1; $i <= $amount; $i ++)
            <div class='variable{{$i}} @if($i !== 1) hide @endif'>
                <div class='subtitle @if($i%2 == 0) even @else odd @endif'>
                    <h3>変動項目({{$i}})</h3>
                </div>
                <div class="swiper-container slider7-{{$i}} items">
                <ul class="swiper-wrapper list-unstyled">
                    @php $count = 1; @endphp
                    @foreach($children as $child)
                    @if($child->prefix === $parents[6]->prefix)
                    <div class='swiper-slide'>
                    <label for="child{{ $child->id }}-{{$i}}" class='mobile'>
                        <li class='child'>
                            <div class="img">
                                <img src="{{ asset('uploads/'.$child->file_name) }}" alt="{{ $child->title }}">
                            </div>
                            <div class='child-info'>
                                <strong><input type="radio" value='{{ $child->coefficient }}' name='{{ $parents[6]->prefix }}-{{$i}}' id="child{{ $child->id }}-{{$i}}" class='radio variable-input-{{$i}}' required @if($i !==1) disabled @endif @if($count===1 && $i===1) checked @endif>{{ $child->title }}</strong>
                                <p>
                                    {{ $child->text }}
                                </p>
                            </div>
                        </li>
                    </label>
                    </div>
                    @php

                    if($count === 1){
                    $normal_6 = $child->title;
                    }
                    $count++

                    @endphp
                    @endif
                    @endforeach
                </ul>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            </div>
            @endfor
    </div>
    <!--▲ 項目7 ////////////////////////////////////////////////////////▲-->
<!--▼ 選択項目一覧 ////////////////////////////////////////////////////////▼-->
<div id='main-panel'>
        <div class='right'>
            <div id='choices'>
                <table>
                    <tr class='{{ $parents[0]->prefix }}'>
                        <th>{{ $parents[0]->name }}</th>
                        <td class='child-title'>
                            @if(old($parents[0]->prefix))
                            {{ old($parents[0]->prefix) }}
                            @else
                            {{ $normal_0 }}
                            @endif
                        </td>
                    </tr>
                    <tr class='{{ $parents[1]->prefix }}'>
                        <th>{{ $parents[1]->name }}</th>
                        <td class='child-title'>
                            @if(old($parents[1]->prefix))
                            {{ old($parents[1]->prefix) }}
                            @else
                            {{ $normal_1 }}
                            @endif
                        </td>
                    </tr>
                    <tr class='{{ $parents[2]->prefix }}'>
                        <th>{{ $parents[2]->name }}</th>
                        <td class='child-title'>
                            @if(old($parents[2]->prefix))
                            {{ old($parents[2]->prefix) }}
                            @else
                            {{ $normal_2 }}
                            @endif
                        </td>
                    </tr>
                    <tr class='{{ $parents[3]->prefix }}'>
                        <th>{{ $parents[3]->name }}</th>
                        <td class='child-title'>
                            @if(old($parents[3]->prefix))
                            {{ old($parents[3]->prefix) }}
                            @else
                            {{ $normal_3 }}
                            @endif
                        </td>
                    </tr>
                    <tr class='{{ $parents[4]->prefix }}'>
                        <th>
                            {{ $parents[4]->name }}</th>
                        <td>
                            <table>
                                @for($i = 1; $i <= $amount; $i ++) <tr class='{{ $parents[4]->prefix }}-{{$i}} variable{{$i}} @if($i !== 1) hide @endif'>
                                    <th class='child-room variable{{$i}}  @if($i !== 1) hide @endif'>変動項目({{$i}})</th>
                                    <td class='child-title'>
                                        @if(old($parents[4]->prefix.'-'.$i))
                                        {{ old($parents[4]->prefix.'-'.$i) }}
                                        @else
                                        @if($i === 1)
                                        {{ $normal_4 }}
                                        @endif
                                        @endif
                                    </td>
                    </tr>
                    @endfor
                </table>
                </td>
                </tr>
                <tr class='{{ $parents[5]->prefix }}'>
                    <th>{{ $parents[5]->name }}</th>
                    <td>
                        <table>
                            @for($i = 1; $i <= $amount; $i ++) <tr class='{{ $parents[5]->prefix }}-{{$i}} variable{{$i}} @if($i !== 1) hide @endif'>
                                <th class='child-room variable{{$i}} @if($i !== 1) hide @endif'>変動項目({{$i}})</th>
                                <td class='child-title'>
                                    @if(old($parents[5]->prefix.'-'.$i))
                                    {{ old($parents[5]->prefix.'-'.$i) }}
                                    @else
                                    @if($i === 1)
                                    {{ $normal_5 }}
                                    @endif
                                    @endif
                                </td>
                </tr>
                @endfor
                </table>
                </td>
                </tr>
                <tr class='{{ $parents[6]->prefix }}'>
                    <th>{{ $parents[6]->name }}</th>
                    <td>
                        <table>
                            @for($i = 1; $i <= $amount; $i ++) <tr class='{{ $parents[6]->prefix }}-{{$i}} variable{{$i}} @if($i !== 1) hide @endif'>
                                <th class='child-room variable{{$i}} @if($i !== 1) hide @endif'>変動項目({{$i}})</th>
                                <td class='child-title'>
                                    @if(old($parents[6]->prefix.'-'.$i))
                                    {{ old($parents[6]->prefix.'-'.$i) }}
                                    @else
                                    @if($i === 1)
                                    {{ $normal_6 }}
                                    @endif
                                    @endif
                                </td>
                </tr>
                @endfor
                </table>
                </td>
                </tr>
                </table>
            </div>
            <!--▲ 選択項目一覧 ////////////////////////////////////////////////////////▲-->
        </div>
        <div class='left'>
            <div id='price'>
                ¥
                <div>
                    <span class='odometer'></span>
                    -
                </div>
            </div>
            <button id="run"><span>金額を算出</span></button>

            <input type="hidden" id='price-basic' value='{{$money[0]["price"]}}'>
            <input type="hidden" id='amount-num' value='{{$amount}}'>

            <form action="{{ route('send.estimate') }}" method='post'>
                @csrf
                <button id='send'><span>選択内容でお問い合わせ</span></button>
                <div id='chooseData'>
                </div>
            </form>
        </div>
    </div>