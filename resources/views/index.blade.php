@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2">
                <ul class="nav nav-pills flex-column">
                    <a href="{{ route('memo.new') }}" class="btn btn-secondary mb-4"><i class="fas fa-plus"></i> New</a>
                    <li class="nav-item"><a href=#pill1 class="nav-link active" data-toggle="pill">Error</a></li>
                    <li class="nav-item"><a href=#pill2 class="nav-link" data-toggle="pill">Memo</a></li>
                </ul>
            </div>
                    
            <div class="col-10">
                <div class="tab-content">
                    <div class="tab-pane active" id="pill1">
                        <div class="container bg-light">
                            <ul class="nav nav-tabs pt-2">
                                <li class="nav-item"><a href="#tab1" class="nav-link active" data-toggle="tab">List</a></li>
                                <li class="nav-item"><a href="#tab2" class="nav-link" data-toggle="tab">MyList</a></li>
                            </ul>
                            <div class="tab-content py-4">
                                <div class="tab-pane active" id="tab1">
                                    <div class="container">
                                        <div class="row">
                                            @foreach ($memos as $memo)
                                                @if ($memo->category->name === "Error")
                                                    <div class="col-lg-4 col-xs-12">
                                                        <div class="card mb-3">
                                                            <div class="card-body">
                                                                <h4 class="card-title">
                                                                    <a href="{{ route('memo.show', $memo->id) }}" style="color: rgb(68, 68, 68);">
                                                                        {{ $memo->title }}
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2">
                                    @auth
                                        <div class="container">
                                            <div class="row">
                                                @foreach ($memos as $memo)
                                                    @if (($memo->category->name === "Error") && ($memo->user_id === $login_user_id))
                                                        <div class="col-4">
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">
                                                                        <a href="{{ route('memo.show', $memo->id) }}" style="color: rgb(68, 68, 68);">
                                                                            {{ $memo->title }}
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="pill2">
                        <div class="container bg-light">
                            <ul class="nav nav-tabs pt-2">
                                <li class="nav-item"><a href="#tab3" class="nav-link active" data-toggle="tab">List</a></li>
                                <li class="nav-item"><a href="#tab4" class="nav-link" data-toggle="tab">MyList</a></li>
                            </ul>
                            <div class="tab-content py-4">
                                <div class="tab-pane active" id="tab3">
                                    <div class="container">
                                        <div class="row">
                                            @foreach ($memos as $memo)
                                                @if ($memo->category->name === "Memo")
                                                    <div class="col-4">
                                                        <div class="card mb-3">
                                                            <div class="card-body">
                                                                <h4 class="card-title">
                                                                    <a href="{{ route('memo.show', $memo->id) }}" style="color: rgb(68, 68, 68);">
                                                                        {{ $memo->title }}
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab4">
                                    @auth
                                        <div class="container">
                                            <div class="row">
                                                @foreach ($memos as $memo)
                                                    @if (($memo->category->name === "Memo") && ($memo->user_id === $login_user_id))
                                                        <div class="col-4">
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <h4 class="card-title">
                                                                        <a href="{{ route('memo.show', $memo->id) }}" style="color: rgb(68, 68, 68);">
                                                                            {{ $memo->title }}
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

