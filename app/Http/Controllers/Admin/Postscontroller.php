<?php

namespace App\Http\Controllers\Admin;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Postscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Post::paginate(8);
        return view('admin.post.index',compact('data'));
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
        $datas=$request->all();

        $request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
        $newpost= new Post();
        $newpost->title=$datas['title'];
        $newpost->body=$datas['body'];
        $newpost->save();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show=Post::findOrFail($id);

        return view('admin.post.show',compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Post::findOrFail($id);
        return view('admin.post.edit',compact('data'));
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
        $data = $request->all();
        $singolopost= Post::findOrFail($id);
        $singolopost->update($data);
        return redirect()->route('admin.posts.index',$singolopost->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy= Post::findOrFail($id);
        $destroy->delete();

        return redirect()->route('admin.posts.index');
    }
}
