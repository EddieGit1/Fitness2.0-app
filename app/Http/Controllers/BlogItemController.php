<?php

namespace App\Http\Controllers;

use App\Models\BlogItem;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogItemController extends Controller
{

    public function index()
    {
        // Get all the blogs
        $blogItems = BlogItem::all();

        return view('blogs.index', compact( 'blogItems'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
           'full_name'=>'required|string|max:50',
            'blog_title'=>'required|string|max:50',
            'blog_text'=>'required|string|max:50',
        ]);

        $blogItem = new BlogItem([
            'full_name' => $request->get('full_name'),
            'blog_title' => $request->get('blog_title'),
            'blog_text' => $request->get('blog_text'),
        ]);

        $blogItem->save();
        return redirect()->route('home');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
