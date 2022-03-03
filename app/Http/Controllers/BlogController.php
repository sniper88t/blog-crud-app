<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = blog::all();

        return view('index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'content'=>'required'
        ]);

        $blog_man = new blog([
            'title' => $request->get('title'),
            'author' => $request->get('author'),
            'content' => $request->get('content')
        ]);
        $blog_man->save();
        return redirect('/blogs')->with('success', 'Blog Content Created!');
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
        $blogs = blog::find($id);
        return view('edit', compact('blogs'));
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
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'content'=>'required'
        ]);

        $blog_content = blog::find($id);
        $blog_content->title =  $request->get('title');
        $blog_content->author = $request->get('author');
        $blog_content->content = $request->get('content');
        $blog_content->save();

        return redirect('/blogs')->with('success', 'Blogs updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = blog::find($id);
        $contact->delete();

        return redirect('/blogs')->with('success', 'Blog deleted!');
    }
}
