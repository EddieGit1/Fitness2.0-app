<?php

namespace App\Http\Controllers;

use App\Models\BlogItem;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BlogItemController extends Controller
{

    public function index(Request $request)
    {
        if (!Auth::check()) {
            $roleId = 2;
        } else {
            $userId = Auth::user()->id;
            $role = DB::table('role_user')
                ->where('user_id', $userId)->first();

            $roleId = $role->role_id;
        }

        $cat = Category::all();

        $catId = $request->get('category');
        if ($request->has('category')) {
            $blogItems = BlogItem::where('category_id', $catId)->where('status', true)->get();
        } else {
            $blogItems = BlogItem::where('status', true)->get();
        }

        $search = $request->get('search');
        if ($search){
            $blogItems = BlogItem::where('blog_title', 'like','%'.$search.'%')->orWhere('blog_text', 'like','%'.$search.'%')->where('status', true)->get();
        }

        // Get all the blogs
//   $blogItems = BlogItem::where('status', 1)->get();

        return view('blogs.index', compact( 'blogItems', 'cat'), ['role' => $roleId]);

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
        $cat = Category::all();
        return view('create', compact('cat'));

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
            'blog_text'=>'required|string|max:50'
//            'category_id'=>'required|int|'
        ]);

        $blogItem = new BlogItem([
            'full_name' => $request->get('full_name'),
            'blog_title' => $request->get('blog_title'),
            'blog_text' => $request->get('blog_text'),
            'category_id' => $request->get('category')
        ]);

        $blogItem->user_id = Auth::user()->id;

        $blogItem->save();
        return redirect('home');
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
            abort(404, "Geen blog gevonden");
        }

        $cat = Category::all();

        //Show a view to edit an existing resource.
        return view('edit', compact('blogItem', 'cat'));
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
        $blogItem->category_id = request('category');
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
