
        <div class='parent' id="{{ $parents[0]->prefix }}">
            <div class='title'>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.34 34.34">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #e83828;
                            }

                            .cls-2 {
                                fill: none;
                                stroke: #fff;
                                stroke-miterlimit: 10;
                            }
                        </style>
                    </defs>
                    <g id="レイヤー_2" data-name="レイヤー 2">
                        <g id="メイン">
                            <circle class="cls-1" cx="17.17" cy="17.17" r="17.17" />
                            <polyline class="cls-2" points="6.23 16.31 11.7 11.51 17.17 6.7 22.64 11.51 28.11 16.31" />
                            <line class="cls-2" x1="8.49" y1="25.1" x2="8.49" y2="14.34" />
                            <line class="cls-2" x1="25.85" y1="14.34" x2="25.85" y2="25.1" />
                            <line class="cls-2" x1="27.75" y1="25.1" x2="6.59" y2="25.1" />
                            <polyline class="cls-2" points="14.78 25.1 14.78 17.6 19.57 17.6 19.57 25.1" />
                        </g>
                    </g>
                </svg>
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
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.34 34.34">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #e83828;
                            }

                            .cls-2 {
                                fill: none;
                            }

                            .cls-2,
                            .cls-3 {
                                stroke: #fff;
                                stroke-miterlimit: 10;
                            }

                            .cls-3 {
                                fill: #fff;
                                stroke-width: 0.5px;
                            }
                        </style>
                    </defs>
                    <g id="レイヤー_2" data-name="レイヤー 2">
                        <g id="メイン">
                            <circle class="cls-1" cx="17.17" cy="17.17" r="17.17" />
                            <polygon class="cls-2" points="26.66 20.25 8.46 20.25 5.15 25.57 29.97 25.57 26.66 20.25" />
                            <path class="cls-2" d="M25.1,17.24H9.86L8.69,13.12s-.86-1.95.57-2.6c0,0,1.56-.6,2.21,1.61L12,14.25H23.16l.43-2.08S24,10,25.71,10.52c0,0,1.52.26.52,3.47Z" />
                            <line class="cls-2" x1="17.44" y1="14.25" x2="17.44" y2="9.66" />
                            <rect class="cls-3" x="10.6" y="17.28" width="1.04" height="1.43" />
                            <rect class="cls-3" x="23.37" y="17.28" width="1.04" height="1.43" />
                            <path class="cls-2" d="M25.06,10.31c.65-2.64-1.73-2.69-1.73-2.69H11.81s-3-.13-2.21,2.77" />
                        </g>
                    </g>
                </svg>
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
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.34 34.34">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #e83828;
                            }

                            .cls-2 {
                                fill: none;
                                stroke: #fff;
                                stroke-miterlimit: 10;
                            }
                        </style>
                    </defs>
                    <g id="レイヤー_2" data-name="レイヤー 2">
                        <g id="メイン">
                            <circle class="cls-1" cx="17.17" cy="17.17" r="17.17" />
                            <polyline class="cls-2" points="4.03 10.48 4.99 17.99 11.36 17.99" />
                            <line class="cls-2" x1="5.89" y1="24.62" x2="5.89" y2="17.99" />
                            <line class="cls-2" x1="10.46" y1="24.62" x2="10.46" y2="17.99" />
                            <line class="cls-2" x1="10.46" y1="20.85" x2="5.99" y2="20.85" />
                            <line class="cls-2" x1="13.29" y1="24.62" x2="13.29" y2="15.54" />
                            <line class="cls-2" x1="21.47" y1="24.62" x2="21.47" y2="15.54" />
                            <polyline class="cls-2" points="30.67 10.48 29.7 17.99 23.33 17.99" />
                            <line class="cls-2" x1="28.8" y1="24.62" x2="28.8" y2="17.99" />
                            <line class="cls-2" x1="24.23" y1="24.62" x2="24.23" y2="17.99" />
                            <line class="cls-2" x1="24.23" y1="20.85" x2="28.71" y2="20.85" />
                            <line class="cls-2" x1="10.27" y1="13.55" x2="24.55" y2="13.55" />
                            <polyline class="cls-2" points="23.27 13.55 23.27 15.48 11.43 15.48 11.43 13.55" />
                        </g>
                    </g>
                </svg>
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
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.34 34.34">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #e83828;
                            }

                            .cls-2 {
                                fill: none;
                                stroke: #fff;
                                stroke-linecap: round;
                                stroke-linejoin: round;
                            }

                            .cls-3 {
                                fill: #fff;
                            }
                        </style>
                    </defs>
                    <g id="レイヤー_2" data-name="レイヤー 2">
                        <g id="メイン">
                            <circle class="cls-1" cx="17.17" cy="17.17" r="17.17" />
                            <rect class="cls-2" x="14.3" y="13.45" width="5.83" height="5.97" />
                            <line class="cls-2" x1="6.41" y1="6.34" x2="14.3" y2="13.45" />
                            <line class="cls-2" x1="20.12" y1="13.45" x2="28.08" y2="6.49" />
                            <path class="cls-2" d="M23.39,22.54V14.3l4.69-3.83s0,16.25.06,16.32l-8-7.37" />
                            <path class="cls-2" d="M11,22.54V14.3L6.34,10.47s.13,16.25.06,16.32l7.9-7.37" />
                            <ellipse class="cls-3" cx="9.82" cy="17.96" rx="0.46" ry="0.89" />
                            <ellipse class="cls-3" cx="26.98" cy="17.96" rx="0.46" ry="0.89" />
                        </g>
                    </g>
                </svg>
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
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.34 34.34">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #e83828;
                            }

                            .cls-2 {
                                fill: none;
                                stroke: #fff;
                                stroke-linecap: round;
                                stroke-linejoin: round;
                            }
                        </style>
                    </defs>
                    <g id="レイヤー_2" data-name="レイヤー 2">
                        <g id="メイン">
                            <circle class="cls-1" cx="17.17" cy="17.17" r="17.17" />
                            <polygon class="cls-2" points="17.27 19.58 6.19 23.77 6.19 10.58 17.27 6.39 17.27 19.58" />
                            <polygon class="cls-2" points="14.46 16.96 9.58 18.81 9.58 13.69 14.46 11.84 14.46 16.96" />
                            <polyline class="cls-2" points="25.02 22.47 25.02 13.69 20.14 11.84 20.14 20.62" />
                            <polygon class="cls-2" points="17.27 19.58 28.35 23.77 28.35 10.58 17.27 6.39 17.27 19.58" />
                            <polyline class="cls-2" points="6.19 23.77 17.25 28.23 28.29 23.73" />
                        </g>
                    </g>
                </svg>
                <h2>{{ $parents[4]->name }}</h2>
            </div>
            @for($i = 1; $i <= $amount; $i ++)
            <div class='variable{{$i}} @if($i !== 1) hide @endif'>
                <div class='subtitle @if($i%2 == 0) even @else odd @endif'>
                    <h3>部屋({{$i}})</h3>
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
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.34 34.34">
                <defs>
                    <style>
                        .cls-1 {
                            fill: #e83828;
                        }

                        .cls-2 {
                            fill: none;
                            stroke: #fff;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                        }
                    </style>
                </defs>
                <g id="レイヤー_2" data-name="レイヤー 2">
                    <g id="メイン">
                        <circle class="cls-1" cx="17.17" cy="17.17" r="17.17" />
                        <polygon class="cls-2" points="17.27 19.58 6.19 23.77 6.19 10.58 17.27 6.39 17.27 19.58" />
                        <polygon class="cls-2" points="14.46 16.96 9.58 18.81 9.58 13.69 14.46 11.84 14.46 16.96" />
                        <polyline class="cls-2" points="25.02 22.47 25.02 13.69 20.14 11.84 20.14 20.62" />
                        <polygon class="cls-2" points="17.27 19.58 28.35 23.77 28.35 10.58 17.27 6.39 17.27 19.58" />
                        <polyline class="cls-2" points="6.19 23.77 17.25 28.23 28.29 23.73" />
                    </g>
                </g>
            </svg>
            <h2>{{ $parents[5]->name }}</h2>
        </div>
        @for($i = 1; $i <= $amount; $i ++)
            <div class='variable{{$i}} @if($i !== 1) hide @endif'>
                <div class='subtitle @if($i%2 == 0) even @else odd @endif'>
                    <h3>部屋({{$i}})</h3>
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
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.34 34.34">
                <defs>
                    <style>
                        .cls-1 {
                            fill: #e83828;
                        }

                        .cls-2 {
                            fill: none;
                            stroke: #fff;
                            stroke-miterlimit: 10;
                        }
                    </style>
                </defs>
                <g id="レイヤー_2" data-name="レイヤー 2">
                    <g id="メイン">
                        <circle class="cls-1" cx="17.17" cy="17.17" r="17.17" />
                        <rect class="cls-2" x="7.5" y="5.61" width="1.66" height="22.86" />
                        <polyline class="cls-2" points="9.2 5.61 12.78 9.1 12.78 24.99 9.2 28.47" />
                        <line class="cls-2" x1="11.91" y1="17.08" x2="10.76" y2="17.08" />
                        <rect class="cls-2" x="25.7" y="5.61" width="1.66" height="22.86" transform="translate(53.06 34.09) rotate(180)" />
                        <polyline class="cls-2" points="25.66 5.61 22.08 9.1 22.08 24.99 25.66 28.47" />
                        <line class="cls-2" x1="22.95" y1="17.08" x2="24.1" y2="17.08" />
                        <line class="cls-2" x1="10.38" y1="6.72" x2="24.36" y2="6.72" />
                        <line class="cls-2" x1="10.38" y1="27.33" x2="24.36" y2="27.33" />
                        <line class="cls-2" x1="12.77" y1="10.94" x2="21.96" y2="10.94" />
                    </g>
                </g>
            </svg>
            <h2>{{ $parents[6]->name }}</h2>
        </div>
        @for($i = 1; $i <= $amount; $i ++)
            <div class='variable{{$i}} @if($i !== 1) hide @endif'>
                <div class='subtitle @if($i%2 == 0) even @else odd @endif'>
                    <h3>部屋({{$i}})</h3>
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
                        <th><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.34 34.34">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #e83828;
                                        }

                                        .cls-2 {
                                            fill: none;
                                            stroke: #fff;
                                            stroke-miterlimit: 10;
                                        }
                                    </style>
                                </defs>
                                <g id="レイヤー_2" data-name="レイヤー 2">
                                    <g id="メイン">
                                        <circle class="cls-1" cx="17.17" cy="17.17" r="17.17" />
                                        <polyline class="cls-2" points="6.23 16.31 11.7 11.51 17.17 6.7 22.64 11.51 28.11 16.31" />
                                        <line class="cls-2" x1="8.49" y1="25.1" x2="8.49" y2="14.34" />
                                        <line class="cls-2" x1="25.85" y1="14.34" x2="25.85" y2="25.1" />
                                        <line class="cls-2" x1="27.75" y1="25.1" x2="6.59" y2="25.1" />
                                        <polyline class="cls-2" points="14.78 25.1 14.78 17.6 19.57 17.6 19.57 25.1" />
                                    </g>
                                </g>
                            </svg>{{ $parents[0]->name }}</th>
                        <td class='child-title'>
                            @if(old($parents[0]->prefix))
                            {{ old($parents[0]->prefix) }}
                            @else
                            {{ $normal_0 }}
                            @endif
                        </td>
                    </tr>
                    <tr class='{{ $parents[1]->prefix }}'>
                        <th><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.34 34.34">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #e83828;
                                        }

                                        .cls-2 {
                                            fill: none;
                                        }

                                        .cls-2,
                                        .cls-3 {
                                            stroke: #fff;
                                            stroke-miterlimit: 10;
                                        }

                                        .cls-3 {
                                            fill: #fff;
                                            stroke-width: 0.5px;
                                        }
                                    </style>
                                </defs>
                                <g id="レイヤー_2" data-name="レイヤー 2">
                                    <g id="メイン">
                                        <circle class="cls-1" cx="17.17" cy="17.17" r="17.17" />
                                        <polygon class="cls-2" points="26.66 20.25 8.46 20.25 5.15 25.57 29.97 25.57 26.66 20.25" />
                                        <path class="cls-2" d="M25.1,17.24H9.86L8.69,13.12s-.86-1.95.57-2.6c0,0,1.56-.6,2.21,1.61L12,14.25H23.16l.43-2.08S24,10,25.71,10.52c0,0,1.52.26.52,3.47Z" />
                                        <line class="cls-2" x1="17.44" y1="14.25" x2="17.44" y2="9.66" />
                                        <rect class="cls-3" x="10.6" y="17.28" width="1.04" height="1.43" />
                                        <rect class="cls-3" x="23.37" y="17.28" width="1.04" height="1.43" />
                                        <path class="cls-2" d="M25.06,10.31c.65-2.64-1.73-2.69-1.73-2.69H11.81s-3-.13-2.21,2.77" />
                                    </g>
                                </g>
                            </svg>{{ $parents[1]->name }}</th>
                        <td class='child-title'>
                            @if(old($parents[1]->prefix))
                            {{ old($parents[1]->prefix) }}
                            @else
                            {{ $normal_1 }}
                            @endif
                        </td>
                    </tr>
                    <tr class='{{ $parents[2]->prefix }}'>
                        <th><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.34 34.34">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #e83828;
                                        }

                                        .cls-2 {
                                            fill: none;
                                            stroke: #fff;
                                            stroke-miterlimit: 10;
                                        }
                                    </style>
                                </defs>
                                <g id="レイヤー_2" data-name="レイヤー 2">
                                    <g id="メイン">
                                        <circle class="cls-1" cx="17.17" cy="17.17" r="17.17" />
                                        <polyline class="cls-2" points="4.03 10.48 4.99 17.99 11.36 17.99" />
                                        <line class="cls-2" x1="5.89" y1="24.62" x2="5.89" y2="17.99" />
                                        <line class="cls-2" x1="10.46" y1="24.62" x2="10.46" y2="17.99" />
                                        <line class="cls-2" x1="10.46" y1="20.85" x2="5.99" y2="20.85" />
                                        <line class="cls-2" x1="13.29" y1="24.62" x2="13.29" y2="15.54" />
                                        <line class="cls-2" x1="21.47" y1="24.62" x2="21.47" y2="15.54" />
                                        <polyline class="cls-2" points="30.67 10.48 29.7 17.99 23.33 17.99" />
                                        <line class="cls-2" x1="28.8" y1="24.62" x2="28.8" y2="17.99" />
                                        <line class="cls-2" x1="24.23" y1="24.62" x2="24.23" y2="17.99" />
                                        <line class="cls-2" x1="24.23" y1="20.85" x2="28.71" y2="20.85" />
                                        <line class="cls-2" x1="10.27" y1="13.55" x2="24.55" y2="13.55" />
                                        <polyline class="cls-2" points="23.27 13.55 23.27 15.48 11.43 15.48 11.43 13.55" />
                                    </g>
                                </g>
                            </svg>{{ $parents[2]->name }}</th>
                        <td class='child-title'>
                            @if(old($parents[2]->prefix))
                            {{ old($parents[2]->prefix) }}
                            @else
                            {{ $normal_2 }}
                            @endif
                        </td>
                    </tr>
                    <tr class='{{ $parents[3]->prefix }}'>
                        <th><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.34 34.34">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #e83828;
                                        }

                                        .cls-2 {
                                            fill: none;
                                            stroke: #fff;
                                            stroke-linecap: round;
                                            stroke-linejoin: round;
                                        }

                                        .cls-3 {
                                            fill: #fff;
                                        }
                                    </style>
                                </defs>
                                <g id="レイヤー_2" data-name="レイヤー 2">
                                    <g id="メイン">
                                        <circle class="cls-1" cx="17.17" cy="17.17" r="17.17" />
                                        <rect class="cls-2" x="14.3" y="13.45" width="5.83" height="5.97" />
                                        <line class="cls-2" x1="6.41" y1="6.34" x2="14.3" y2="13.45" />
                                        <line class="cls-2" x1="20.12" y1="13.45" x2="28.08" y2="6.49" />
                                        <path class="cls-2" d="M23.39,22.54V14.3l4.69-3.83s0,16.25.06,16.32l-8-7.37" />
                                        <path class="cls-2" d="M11,22.54V14.3L6.34,10.47s.13,16.25.06,16.32l7.9-7.37" />
                                        <ellipse class="cls-3" cx="9.82" cy="17.96" rx="0.46" ry="0.89" />
                                        <ellipse class="cls-3" cx="26.98" cy="17.96" rx="0.46" ry="0.89" />
                                    </g>
                                </g>
                            </svg>{{ $parents[3]->name }}</th>
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
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.34 34.34">
                                <defs>
                                    <style>
                                        .cls-1 {
                                            fill: #e83828;
                                        }

                                        .cls-2 {
                                            fill: none;
                                            stroke: #fff;
                                            stroke-linecap: round;
                                            stroke-linejoin: round;
                                        }
                                    </style>
                                </defs>
                                <g id="レイヤー_2" data-name="レイヤー 2">
                                    <g id="メイン">
                                        <circle class="cls-1" cx="17.17" cy="17.17" r="17.17" />
                                        <polygon class="cls-2" points="17.27 19.58 6.19 23.77 6.19 10.58 17.27 6.39 17.27 19.58" />
                                        <polygon class="cls-2" points="14.46 16.96 9.58 18.81 9.58 13.69 14.46 11.84 14.46 16.96" />
                                        <polyline class="cls-2" points="25.02 22.47 25.02 13.69 20.14 11.84 20.14 20.62" />
                                        <polygon class="cls-2" points="17.27 19.58 28.35 23.77 28.35 10.58 17.27 6.39 17.27 19.58" />
                                        <polyline class="cls-2" points="6.19 23.77 17.25 28.23 28.29 23.73" />
                                    </g>
                                </g>
                            </svg>{{ $parents[4]->name }}</th>
                        <td>
                            <table>
                                @for($i = 1; $i <= $amount; $i ++) <tr class='{{ $parents[4]->prefix }}-{{$i}} variable{{$i}} @if($i !== 1) hide @endif'>
                                    <th class='child-room variable{{$i}}  @if($i !== 1) hide @endif'>部屋({{$i}})</th>
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
                    <th><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.34 34.34">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #e83828;
                                    }

                                    .cls-2 {
                                        fill: none;
                                        stroke: #fff;
                                        stroke-linecap: round;
                                        stroke-linejoin: round;
                                    }
                                </style>
                            </defs>
                            <g id="レイヤー_2" data-name="レイヤー 2">
                                <g id="メイン">
                                    <circle class="cls-1" cx="17.17" cy="17.17" r="17.17" />
                                    <polygon class="cls-2" points="17.27 19.58 6.19 23.77 6.19 10.58 17.27 6.39 17.27 19.58" />
                                    <polygon class="cls-2" points="14.46 16.96 9.58 18.81 9.58 13.69 14.46 11.84 14.46 16.96" />
                                    <polyline class="cls-2" points="25.02 22.47 25.02 13.69 20.14 11.84 20.14 20.62" />
                                    <polygon class="cls-2" points="17.27 19.58 28.35 23.77 28.35 10.58 17.27 6.39 17.27 19.58" />
                                    <polyline class="cls-2" points="6.19 23.77 17.25 28.23 28.29 23.73" />
                                </g>
                            </g>
                        </svg>{{ $parents[5]->name }}</th>
                    <td>
                        <table>
                            @for($i = 1; $i <= $amount; $i ++) <tr class='{{ $parents[5]->prefix }}-{{$i}} variable{{$i}} @if($i !== 1) hide @endif'>
                                <th class='child-room variable{{$i}} @if($i !== 1) hide @endif'>部屋({{$i}})</th>
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
                    <th><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34.34 34.34">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #e83828;
                                    }

                                    .cls-2 {
                                        fill: none;
                                        stroke: #fff;
                                        stroke-miterlimit: 10;
                                    }
                                </style>
                            </defs>
                            <g id="レイヤー_2" data-name="レイヤー 2">
                                <g id="メイン">
                                    <circle class="cls-1" cx="17.17" cy="17.17" r="17.17" />
                                    <rect class="cls-2" x="7.5" y="5.61" width="1.66" height="22.86" />
                                    <polyline class="cls-2" points="9.2 5.61 12.78 9.1 12.78 24.99 9.2 28.47" />
                                    <line class="cls-2" x1="11.91" y1="17.08" x2="10.76" y2="17.08" />
                                    <rect class="cls-2" x="25.7" y="5.61" width="1.66" height="22.86" transform="translate(53.06 34.09) rotate(180)" />
                                    <polyline class="cls-2" points="25.66 5.61 22.08 9.1 22.08 24.99 25.66 28.47" />
                                    <line class="cls-2" x1="22.95" y1="17.08" x2="24.1" y2="17.08" />
                                    <line class="cls-2" x1="10.38" y1="6.72" x2="24.36" y2="6.72" />
                                    <line class="cls-2" x1="10.38" y1="27.33" x2="24.36" y2="27.33" />
                                    <line class="cls-2" x1="12.77" y1="10.94" x2="21.96" y2="10.94" />
                                </g>
                            </g>
                        </svg>{{ $parents[6]->name }}</th>
                    <td>
                        <table>
                            @for($i = 1; $i <= $amount; $i ++) <tr class='{{ $parents[6]->prefix }}-{{$i}} variable{{$i}} @if($i !== 1) hide @endif'>
                                <th class='child-room variable{{$i}} @if($i !== 1) hide @endif'>部屋({{$i}})</th>
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
            <button id="run"><span>How Much ??</span></button>

            <input type="hidden" id='price-basic' value='{{$money[0]["price"]}}'>
            <input type="hidden" id='amount-num' value='{{$amount}}'>

            <form action="{{ route('send.estimate') }}" method='post'>
                @csrf
                <button id='send'><span>選択した内容でお問い合わせ</span></button>
                <div id='chooseData'>
                </div>
            </form>
        </div>
    </div>