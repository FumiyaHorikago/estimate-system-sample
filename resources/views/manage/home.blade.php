@extends('layouts.manage')

@push('nav1')
active
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-0 bg-light">
                <div class="card-body">
                    <div>
                        <button type="button" class="btn btn-primary btn-sm @if(!Session::has('children')) focus @endif" id='add'>小項目追加</button>
                        <button type="button" class="btn btn-primary btn-sm @if(Session::has('children')) focus @endif" id='edit'>小項目編集</button>
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
                                    <input type="input" class="form-control @error('title') is-invalid @enderror" id="addTitle" name='title' value='{{ old("title") }}' autocomplete="off" required>
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="addText">説明文</label>
                                    <input type="input" class="form-control @error('text') is-invalid @enderror" id="addText" name='text' value='{{ old("text") }}' autocomplete="off" required>
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
                                    <input type="input" class="form-control @error('coefficient') is-invalid @enderror" id="addCoefficient" name='coefficient' value='{{ old("coefficient") }}' autocomplete="off" required>
                                    @error('coefficient')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="addParentPrefix">親項目</label>
                                    <select class="form-control @error('parent_prefix') is-invalid @enderror" name='parent_prefix' id='addParentPrefix'>
                                        @foreach($parents as $parent)
                                        <option value='{{ $parent->prefix }}'>{{ $parent->name }}</option>
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
                                        <option value="{{ $parent->prefix }}">{{ $parent->name }}</option>
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
                                        <input type="input" class="form-control @error('edittitle') is-invalid @enderror" id="editTitle" name='edittitle' value='' autocomplete="off" required>
                                        @error('edittitle')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="editText">説明文</label>
                                        <input type="input" class="form-control @error('edittext') is-invalid @enderror" id="editText" name='edittext' value='' autocomplete="off" required>
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
                                        <input type="input" class="form-control @error('editcoefficient') is-invalid @enderror" id="editCoefficient" name='editcoefficient' value='' autocomplete="off" required>
                                        @error('editcoefficient')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="editParentPrefix">親項目</label>
                                        <select class="form-control @error('editparent_prefix') is-invalid @enderror" name='editparent_prefix' id='editParentPrefix'>
                                            @foreach($parents as $parent)
                                            <option value='{{ $parent->prefix }}'>{{ $parent->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('editparent_id')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" name='editChild' class="btn btn-success">更新する</button>
                                    <button type="submit" name='destroy' class="btn btn-danger ml-3">削除する</button>
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