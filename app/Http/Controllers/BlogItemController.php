<?php

namespace App\Http\Controllers;

use App\Models\BlogItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BlogItemController extends Controller
{

    public function index()
    {
        if (!Auth::check()) {
            $roleId = 2;
        } else {
            $userId = Auth::user()->id;
            $role = DB::table('role_user')
                ->where('user_id', $userId)->first();

            $roleId = $role->role_id;
        }

        // Get all the blogs
        $blogItems = BlogItem::where('status', 1)->get();

        return view('blogs.index', compact( 'blogItems'), ['role' => $roleId]);

    }

    public function admin()
    {
        if (!Auth::check()) {
            $roleId = 2;
        } else {
            $userId = Auth::user()->id;
            $role = DB::table('role_user')
                ->where('user_id', $userId)->first();

            $roleId = $role->role_id;
        }
        // Get all the blogs
        $blogItems = BlogItem::all();

        return view('admin', compact( 'blogItems'), ['role' => $roleId]);

    }

    public function postStatus(Request $request, $id) {
        $blog = BlogItem::find($id);
        $blogStatus = $blog->status;

        if ($blogStatus == true) {
            $blog->status = false;
        } else {
            $blog->status = true;
        }

        $blog->save();



        return redirect()->route('admin');
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

        $blogItem->user_id = Auth::user()->id;

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

        if (!Auth::check()){
            return redirect()->route('index');
        }

        $blogItem = blogItem::find($id);
        if($blogItem == null){
            abort(404, "Geen workout routine gevonden");
        }

        //Show a view to edit an existing resource.
        return view('edit', compact('blogItem'));
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
        request()->validate([
            'full_name'=>'required|string|max:50',
            'blog_title'=>'required|string|max:50',
            'blog_text'=>'required|string|max:50',
        ]);

        $blogItem = BlogItem::find($id);
        $blogItem->full_name = request('full_name');
        $blogItem->blog_title = request('blog_title');
        $blogItem->blog_text = request('blog_text');
        $blogItem->save();

        return redirect('home')->with('succes', 'Blog saved');
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
        $blogItem = blogItem::find($id);
        $blogItem->delete();

        return redirect()->route('home');
    }
}
