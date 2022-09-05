<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\{Post,Category,Subcategory};
use Illuminate\Support\Str;
use DB,File,Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = Post::all()>orderBy('desc');
        $data = Post::orderBy('id', 'DESC')->get();
        // $data = DB::table('posts')
        // ->join('users', 'posts.user_id', 'users.id')
        // ->join('categories', 'posts.category_id', 'categories.id')
        // ->get();
        return view('admin.posts.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.posts.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'post_date' => 'required',
            'description' => 'required',
            'image' => 'nullable|image'
        ]);
        
        $slug = Str::of($request->title)->slug('-');
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['user_id'] = $request->user_id;
        $data['title'] = $request->title;
        $data['post_date'] = $request->post_date;
        $data['slug'] = Str::of($request->title)->slug('-');
        $data['tags'] = $request->tags;
        $data['status'] = $request->status;
        $data['description'] =$request->description;
        $photo = $request->image;
       
        if($request->hasFile('image')){
            $photoname = $slug.'.'.$photo->getClientOriginalExtension();
            //$photoname = $photo->getClientOriginalName();
            Image::make($photo)->resize(800, 350)->save('public/media/'.$photoname);
            $data['image']  = 'public/media/'.$photoname;
            DB::table('posts')->insert($data);
            return redirect()->back()->with('success', 'Insert Successfully!');
        }
        DB::table('posts')->insert($data);
        return redirect()->back()->with('success', 'Insert Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Category::find($id);;
        return view('admin.category.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $category = Category::all();
        $data = Post::find($id);
        return view('admin.posts.edit', compact('data', 'category'));
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
        $validated = $request->validate([
            'category_id' => 'nullable',
            'title' => 'nullable',
            'post_date' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image'
        ]);

        $slug = Str::of($request->title)->slug('-');
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['user_id'] = $request->user_id;
        $data['title'] = $request->title;
        $data['post_date'] = $request->post_date;
        $data['slug'] = Str::of($request->title)->slug('-');
        $data['tags'] = $request->tags;
        $data['status'] = $request->status;
        $data['description'] =$request->description;
        $photo = $request->image;
       
        if($request->hasFile('image')){
            //__Old Image deelete__//
            if(File::exists($request->old_image)){
                File::delete($request->old_image);
            }
            $photoname = $slug.'.'.$photo->getClientOriginalExtension();
            //$photoname = $photo->getClientOriginalName();
            Image::make($photo)->resize(800, 350)->save('public/media/'.$photoname);
            $data['image']  = 'public/media/'.$photoname;
            DB::table('posts')->where('id', $id)->update($data);
            return redirect()->route('posts.index')->with('success', 'Insert Successfully!');
        }else{
            DB::table('posts')->where('id', $id)->update($data);
            return redirect()->route('posts.index')->with('success', 'Insert Successfully!');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //__Model__//
        $post = Post::find($id);
        if(File::exists($post->image)){
            File::delete($post->image);
            $post->delete();
        }else{
            $post->delete();
        }

        //Query Builder
        // $post = DB::table('posts')->where('id', $id)->first();
        // if(File::exists($post->image)){
        //         File::delete($post->image);
        //         $post = DB::table('posts')->where('id', $id)->delete();
        //     }else{
        //         $post = DB::table('posts')->where('id', $id)->delete();
        //     }
        
        return redirect()->back()->with('success', 'Delete Successfully');
    }
}
