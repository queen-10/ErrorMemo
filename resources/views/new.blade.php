@extends('layout')

@section('content')
    <div class="card bg-light p-4">
        {{ Form::open(['route' => 'memo.store']) }}
            @if ($errors->has('title'))
                Error : {{ $errors->first('title') }}
            @endif
            <div class="form-group">
                {{ Form::text('title', null, ['placeholder' => 'title']) }}
            </div>
            @if ($errors->has('content'))
                Error : {{ $errors->first('content') }}
            @endif
            <div class="form-group">
                {{ Form::textarea('content', null, ['placeholder' => 'content']) }}
            </div>
            <div class="form-group">
                {{ Form::select('category_id', $categories) }}
            </div>
            <a href="{{ route('memo.index') }}" class="btn btn-secondary">戻る</a>
            <span>
                {{ Form::submit("作成", ['class' => 'btn btn-secondary']) }}
            </span>
        {{ Form::close() }}
    </div>
@endsection


