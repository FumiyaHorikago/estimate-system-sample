@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">並び順</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('manage.child.order') }}" method='post'>
                        @csrf
                        <button class='btn btn-success btn-sm d-block mb-3' style="width:100%;">並び順を反映する</button>
                        <div class='card card-body'>
                            <ul class='order-list list-unstyled'>
                                @foreach($parents as $parent)
                                <li>
                                    <span>
                                        {{ $parent->name }}
                                    </span>
                                    <div class='children-list'>
                                        <ol class='list-unstyled'>
                                            @php $count = 1; @endphp
                                            @foreach($children as $child)
                                            @if($child->parent_id === $parent->id)
                                            <li>
                                                <div class='index'>
                                                    {{ $count }}
                                                </div>
                                                <div class='item'>
                                                    {{ $child->title }}
                                                    <input type="hidden" name='child_id[]' value='{{ $child->id }}'>
                                                </div>
                                                <div class='delete'>
                                                    <a href="{{ route('manage.child.destroy',['id'=>$child->id]) }}" class='text-danger' onclick="return confirm('{{$child->title}}を削除しますか？')">×</a>
                                                </div>
                                            </li>
                                            @php $count++; @endphp
                                            @endif
                                            @endforeach
                                        </ol>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <button class='btn btn-success btn-sm d-block mt-3' style="width:100%;">並び順を反映する</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">小項目</div>
                <div class="card-body">
                    <div>
                        <button type="button" class="btn btn-primary btn-sm @if(!Session::has('children')) focus @endif" id='add'>追加</button>
                        <button type="button" class="btn btn-primary btn-sm @if(Session::has('children')) focus @endif" id='edit'>編集</button>
                    </div>
                    @if (session('child_status'))
                    <div class="alert alert-success mt-3" role="alert">
                        {{ session('child_status') }}
                    </div>
                    @endif
                    @if (session('child_alert'))
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ session('child_alert') }}
                    </div>
                    @endif
                    <div id='add-form' class='card mt-3'>
                        <div class='card-body'>
                            <form action="{{ route('manage.child.store') }}" method='POST' enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="addTitle">タイトル</label>
                                    <input type="input" class="form-control @error('title') is-invalid @enderror" id="addTitle" name='title' value='{{ old("title") }}' autocomplete="off">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="addText">説明文</label>
                                    <input type="input" class="form-control @error('text') is-invalid @enderror" id="addText" name='text' value='{{ old("text") }}' autocomplete="off">
                                    @error('text')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="addImage">画像</label>
                                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="addImage" name='image'>
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="addCoefficient">係数</label>
                                    <input type="input" class="form-control @error('coefficient') is-invalid @enderror" id="addCoefficient" name='coefficient' value='{{ old("coefficient") }}' autocomplete="off">
                                    @error('coefficient')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="addParentId">親項目</label>
                                    <select class="form-control @error('parent_id') is-invalid @enderror" name='parent_id' id='addParentId'>
                                        @foreach($parents as $parent)
                                        <option value='{{ $parent->id }}'>{{ $parent->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" name='addChild' class="btn btn-success">追加する</button>
                            </form>
                        </div>
                    </div>
                    <div id='edit-form' class='card mt-3 d-none'>
                        <div class='card-body'>
                            <form action="{{ route('manage.child.update') }}" method='POST' enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="editParent">所属する大項目</label>
                                    <select class="form-control @error('parent') is-invalid @enderror" name='parent' id='editParent'>
                                        <option value="" selected disabled>大項目を選択してください。</option>
                                        @foreach($parents as $parent)
                                        <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3" id='selectTarget'>
                                    <label for="editTarget">小項目</label>
                                    <select class="form-control @error('target') is-invalid @enderror" name='target' id='editTarget'>
                                        <option value="">小項目を選択してください。</option>
                                    </select>
                                    @error('target')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div id='editFormCore'>
                                    <hr>
                                    <div class="form-group mt-5">
                                        <label for="editTitle">タイトル</label>
                                        <input type="input" class="form-control @error('edittitle') is-invalid @enderror" id="editTitle" name='edittitle' value='' autocomplete="off">
                                        @error('edittitle')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="editText">説明文</label>
                                        <input type="input" class="form-control @error('edittext') is-invalid @enderror" id="editText" name='edittext' value='' autocomplete="off">
                                        @error('edittext')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="editImage">画像</label>
                                        <input type="file" class="form-control-file @error('editimage') is-invalid @enderror" id="editImage" name='editimage'>
                                        @error('editimage')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class='pl-2 pr-2 pb-2 pt-2 mb-3 w-auto d-inline-block border border-secondary text-center'>
                                        <p>現在の画像</p>
                                        <div>
                                            <img src="" alt="" style='max-width: 150px;' id='currentImage'>
                                            <input type="hidden" value='' name='beforeFileName' id='currentImageName'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="editCoefficient">係数</label>
                                        <input type="input" class="form-control @error('editcoefficient') is-invalid @enderror" id="editCoefficient" name='editcoefficient' value='' autocomplete="off">
                                        @error('editcoefficient')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="editParentId">親項目</label>
                                        <select class="form-control @error('editparent_id') is-invalid @enderror" name='editparent_id' id='editParentId'>
                                            @foreach($parents as $parent)
                                            <option value='{{ $parent->id }}'>{{ $parent->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('editparent_id')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" name='editChild' class="btn btn-success">更新する</button>
                                    <button type="submit" name='destroy' class="btn btn-danger">削除する</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection