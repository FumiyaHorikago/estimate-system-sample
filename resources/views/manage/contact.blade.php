@extends('layouts.manage')

@push('nav5')
active
@endpush
@section('content')
<div class="container">
    <div class='col-md-12'>
        <span>お問い合わせ一覧({{count($contact)}})</span>
        <div class='contact-table mt-3'>
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>登録日時</th>
                        <th>氏名</th>
                        <th>メールアドレス</th>
                        <th>電話番号</th>
                        <th>選択項目</th>
                        <th>金額</th>
                        <th>本文</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contact as $data)
                    <tr>
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->tel }}</td>
                        <td><a href='{{ route("manage.contact.details",["id"=>$data->id]) }}'>詳細</a></td>
                        <td>{{ $data->amount }}</td>
                        <td>{{ $data->comment }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection