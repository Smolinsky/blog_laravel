<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Blog;
use DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Blog::all()->toArray();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::select('SELECT * from categories');
        return view('article.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $upload_folder = 'public\upload';
        $filename = $file->getClientOriginalName();
        Storage::putFileAs($upload_folder, $file, $filename);

        $articles = new Blog([
            'category_id' => $request->get('category_id'),
            'name' => $request->get('name'),
            'content' => $request->get('content'),
            'file' => $filename
        ]);

        $articles->save();
        return redirect('/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Blog::find($id);
        $categories = DB::select('SELECT * from categories');
        return view('article.edit', compact('articles','id'), ['categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articles = Blog::find($id);
        $articles->category_id = $request->get('category_id');
        $articles->name = $request->get('name');
        $articles->content = $request->get('content');
        $articles->file = $request->file('file');
        $articles->save();
        return redirect('/article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articles = Blog::find($id);
        $articles->delete();
        return redirect('/article');
    }
}
