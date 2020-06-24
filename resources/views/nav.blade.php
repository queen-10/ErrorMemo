<nav class='navbar navbar-expand-md navbar-dark bg-dark fixed-top'>
    <a class='navbar-brand' href="{{ route('memo.index') }}">ErrorMemo</a>
    <form method="get" action="{{ route('memo.index') }}" class="search">
        <span class="fa fa-search icon"></span>
        <input type="search" name="keyword">
    </form>

    <style>
        .search {
            margin: 0 0 0 20px;
        }
        
        .icon {
            color: #fff;
        }
    </style>
    
    @include('user')
</nav>