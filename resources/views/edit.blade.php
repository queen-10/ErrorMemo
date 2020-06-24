@extends('layout')

@section('content')
    <div class="card bg-light p-4">
        {{ Form::model($memo, ['route' => ['memo.update', $memo->id]]) }}
            @if ($errors->has('title'))
                Error : {{ $errors->first('title') }}
            @endif
            <div class="form-group">
                {{ Form::text('title', null) }}
            </div>
            @if ($errors->has('content'))
                Error : {{ $errors->first('content') }}
            @endif
            <div class="form-group">
                {{ Form::textarea('content', null) }}
            </div>
            <div class="form-group">
                {{ Form::select('category_id', $categories) }}
            </div>
            <a href="{{ route('memo.show', $memo->id) }}" class="btn btn-secondary">戻る</a>
            <span>
                {{ Form::submit("保存", ['class' => 'btn btn-secondary']) }}
            </span>
        {{ Form::close() }}
    </div>
@endsection
