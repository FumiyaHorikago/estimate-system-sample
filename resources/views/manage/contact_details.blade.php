@extends('layouts.manage')

@push('nav5')
active
@endpush
@section('content')
<div class="container">
    <div class='col-md-12'>
        <span>お問い合わせ詳細</span>
        <div class='contact-table mt-3'>
            <table class='table table-bordered'>
                <tbody>
                    <tr>
                        <th>登録日時</th>
                        <td>{{ $contact->created_at }}</td>
                    </tr>
                    <tr>
                        <th>氏名</th>
                        <td>{{ $contact->name }}</td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>{{ $contact->email }}</td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td>{{ $contact->tel }}</td>
                    </tr>
                    <tr>
                        <th>選択項目</th>
                        <td>
                            <table class='table table-bordered mb-0'>
                                <tr>
                                    <th>{{ $parents[0]->name }}</th>
                                    <td>
                                        {{$contact->choices['format']}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{ $parents[1]->name }}</th>
                                    <td>
                                        {{$contact->choices['living']}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{ $parents[2]->name }}</th>
                                    <td>
                                        {{$contact->choices['dining']}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{ $parents[3]->name }}</th>
                                    <td>
                                        {{$contact->choices['amount']}}
                                    </td>
                                </tr>

                                @php
                                if(is_array($contact->choices['tatami'])){
                                    $len = count($contact->choices['tatami']);
                                }else{
                                    $len = 1;
                                }
                                @endphp
                                @if($len > 1)
                                @for($i = 0;$i < $len;$i++)
                                <tr>
                                    <th>{{ $parents[4]->name }}【{{$i+1}}部屋目】</th>
                                    <td>{{ $contact->choices['tatami'][$i] }}</td>
                                </tr>
                                @endfor
                                @else
                                <tr>
                                    <th>{{ $parents[4]->name }}-1</th>
                                    <td>{{ $contact->choices['tatami'] }}</td>
                                </tr>
                                @endif

                                @php
                                if(is_array($contact->choices['type'])){
                                    $len = count($contact->choices['type']);
                                }else{
                                    $len = 1;
                                }
                                @endphp
                                @if($len > 1)
                                @for($i = 0;$i < $len;$i++)
                                <tr>
                                    <th>{{ $parents[5]->name }}【{{$i+1}}部屋目】</th>
                                    <td>{{ $contact->choices['type'][$i] }}</td>
                                </tr>
                                @endfor
                                @else
                                <tr>
                                    <th>{{ $parents[5]->name }}-1</th>
                                    <td>{{ $contact->choices['type'] }}</td>
                                </tr>
                                @endif

                                @php
                                if(is_array($contact->choices['closet'])){
                                    $len = count($contact->choices['closet']);
                                }else{
                                    $len = 1;
                                }
                                @endphp
                                @if($len > 1)
                                @for($i = 0;$i < $len;$i++)
                                <tr>
                                    <th>{{ $parents[6]->name }}【{{$i+1}}部屋目】</th>
                                    <td>{{ $contact->choices['closet'][$i] }}</td>
                                </tr>
                                @endfor
                                @else
                                <tr>
                                    <th>{{ $parents[6]->name }}-1</th>
                                    <td>{{ $contact->choices['closet'] }}</td>
                                </tr>
                                @endif
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <th>金額</th>
                        <td>{{ $contact->amount }}</td>
                    </tr>
                    <tr>
                        <th>本文</th>
                        <td>{!! nl2br(e($contact->comment)) !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection