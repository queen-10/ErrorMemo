@extends('layout')

@section('content')
    <div class="card bg-light p-4">
        <h2>{{ $memo->title }}</h2>
        <p class="mt-4">ユーザー : {{ $memo->user->name }}</p>
        <p>作成日時 : {{ $memo->created_at }}</p>
        <p>更新日時 : {{ $memo->updated_at }}</p>
        
        <table class="table">
            <tr>
                <td style="white-space: pre-wrap;">{{ $memo->content }}</td>
            </tr>
            <tr>
                <td>
                    <a href="{{ route('memo.index') }}" class="btn btn-secondary mr-3">戻る</a>
                    @auth
                        @if ($memo->user_id === $login_user_id)
                            <a href="{{ route('memo.edit', $memo->id) }}" class="mr-2"><i class="fas fa-edit fa-lg"></i></a>
                            <a onclick="return confirm('削除しますか？')" href="{{ route('memo.destroy', $memo->id) }}"><i class="fas fa-trash-alt fa-lg"></i></a>
                        @endif
                    @endauth
                </td>
            </tr>
        </table>
    
        
    </div>
@endsection
