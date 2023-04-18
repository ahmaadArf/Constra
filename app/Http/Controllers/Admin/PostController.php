<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index','store']]);
         $this->middleware('permission:post-create', ['only' => ['create','store']]);
         $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::paginate(10);
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');

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
            'content'=>'required',
            'date'=>'required',
            'image'=>'required'
        ]);
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/posts'),$img_name);

        Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'date'=>$request->date,
            'image'=>$img_name

        ]);
        return redirect()->route('admin.posts.index')->
        with('msg', 'Post added successfully')->with('type', 'success');
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
        $post=Post::find($id);

        return view('admin.post.edit',compact('post'));
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
        $post=Post::find($id);
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'date'=>'required',

        ]);
        $img_name=$post->image;
        if($request->image){
        $img_name=rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('image/posts'),$img_name);
        File::delete(public_path('image/posts/'.$post->image));

        }

        $post->update([
            'title'=>$request->title,
            'content'=>$request->content,
            'date'=>$request->date,
            'image'=>$img_name

        ]);

        return redirect()->route('admin.posts.index')->
        with('msg', 'Post update successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        File::delete(public_path('image/posts/'.$post->image));
        $post->delete();
        return redirect()->route('admin.posts.index')->
        with('msg', 'Post delete successfully')->with('type', 'success');
    }
    public function trash()
    {
        $posts = Post::onlyTrashed()->paginate(10);

        return view('admin.post.trash', compact('posts'));
    }

    public function restore($id)
    {
        Post::onlyTrashed()->find($id)->restore();

        return redirect()->route('admin.posts.index')->with('msg', 'Post restored successfully')->with('type', 'warning');
    }

    public function forcedelete($id)
    {
        Post::onlyTrashed()->find($id)->forcedelete();

        return redirect()->route('admin.posts.index')->with('msg', 'Post deleted permanintly successfully')->with('type', 'danger');
    }
}
