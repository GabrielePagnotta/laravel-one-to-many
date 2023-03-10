<?php

namespace App\Http\Controllers\Admin;
use App\Models\Post;
use App\Models\Category;
use App\Tag;
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
        $data=Post::with('category')->paginate(8);
        return view('admin.post.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $tags= Tag::All();
        $datas= Category::All();
        return view('admin.post.create',compact('datas','tags'));
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
        $newpost->fill($datas);
        // $newpost->title=$datas['title'];
        // $newpost->body=$datas['body'];
        // $newpost->category_id=$datas['category_id'];
        $newpost->save();

        if(array_key_exists('tags',$datas)){
            $newpost->tags()->sync($datas['tags']);
        }
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
        $tags=Tag::All();
        return view('admin.post.edit',compact('data','tags'));
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

        if(array_key_exists('tags',$data)){
            $singolopost->tags()->sync($data['tags']);
        }else{
            $singolopost->tags()->sync([]);
        }

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
        $destroy->tags()->sync([]);
        $destroy->delete();

        return redirect()->route('admin.posts.index');
    }
}
