<?php

namespace App\Http\Controllers;

use Session;
use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles.index')->with('articles', Article::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [
            'title' => 'required',
            'featured' => 'image',
            'content' => 'required'
        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);


        $article = Article::create([
            'title' => $request->title,
            'content' =>$request->content,
            'author' =>$request->author,
            'featured' => 'uploads/posts/' . $featured_new_name

        ]);

        Session::flash('success', 'Article created successfully.');

        return redirect()->route('articles');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('articles.show')->with('articles', Article::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('articles.edit')->with('article', $article);

        Session::flash('success', 'The Article was just updated.');

        return redirect()->back();
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

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'author' => 'required'
        ]);

        $article = Article::find($id);

        if($request->hasFile('featured'))
        {
        $featured = $request->featured;

        $featured_new_name = time() . $featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);

        $article->featured = 'uploads/posts/' .$featured_new_name;
        }
        
        $article->title = $request->title;
        $article->content = $request->content;
        $article->author = $request->author;

        $article->save();

        Session::flash('success', 'Article updated successfully.');

        return redirect()->route('articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        $article->delete();

        Session::flash('success', 'The Article was deleted.');

        return redirect()->back();
    }
}
