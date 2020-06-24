<?php

namespace App\Http\Controllers;

use App\Memo;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $login_user_id = $user->id;
        } else {
            $login_user_id = "";
        }
        
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $memos = Memo::where('title', 'like', '%'.$keyword.'%')->orwhere('content', 'like', '%'.$keyword.'%')->get();
        } else {
            $memos = Memo::all();
        }
        return view('index', ['memos' => $memos, 'login_user_id' => $login_user_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('new', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate_rule = [
            'title' => 'required',  
            'content' => 'required'
        ];
        $this->validate($request, $validate_rule);
        
        $memo = new Memo;
        $user = Auth::user();
        
        $memo->title = request('title');
        $memo->content = request('content');
        $memo->category_id = request('category_id');
        $memo->user_id = $user->id;
        $memo->save();
        return redirect()->route('memo.show', ['id' => $memo->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $memo = Memo::findOrFail($id);
        $user = Auth::user();
        if ($user) {
            $login_user_id = $user->id;
        } else {
            $login_user_id = "";
        }
        
        return view('show', ['memo' => $memo, 'login_user_id' => $login_user_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function edit(Memo $memo, $id)
    {
        $memo = Memo::findOrFail($id);
        $categories = Category::all()->pluck('name', 'id');
        return view('edit', ['memo' => $memo, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Memo $memo)
    {
        $validate_rule = [
            'title' => 'required',  
            'content' => 'required'
        ];
        $this->validate($request, $validate_rule);
        
        $memo = Memo::findOrFail($id);
        $memo->title = request('title');
        $memo->content = request('content');
        $memo->category_id = request('category_id');
        $memo->save();
        return redirect()->route('memo.show', $memo->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $memo = Memo::findOrFail($id);
        $memo->delete();
        return redirect('/memos');
    }
}
