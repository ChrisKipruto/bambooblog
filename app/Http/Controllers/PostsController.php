<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        # get all posts
        // $posts = Post::all();
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        
        # return view with posts
        return view('posts.index')->with('posts', $posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        # return create viewS
        return view('posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        # form validation
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        # handle file upload
        if($request->hasFile('cover_image')){

            # Get file name with ext
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            # Get just the file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            # get just the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            # file name to store
            $fileNameToStore = $filename.'_'.auth()->user()->id.'_'.time().'.'.$extension;

            # upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        } else {

            # file name to store is client has not uploaded and image
            $fileNameToStore = 'noimage.png';

        }

        #create post
        $post = new Post;

        # add fields
        $post->title = $request->input('title');
        $post->category = $request->input('category');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;

        # save post
        $post->save();

        # return redirect
        return redirect('/posts')->with('success', 'Blog post created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        # get post
        $post = Post::find($id);

        # return view with post
        return view('posts.show')->with('post', $post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        # get post
        $post = Post::find($id);

        # check for correct user (user_id)
        if(auth()->user()->id !== $post->user_id){
            #return redirect 
            return redirect('/posts')->with('error', 'Unauthorized Page Access!');
        }

        # return view with post model
        return view('posts.edit')->with('post', $post);

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
        
        # form validation
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        # handle file upload
        if($request->hasFile('cover_image')){

            # Get file name with ext
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            # Get just the file name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            # get just the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            # file name to store
            $fileNameToStore = $filename.'_'.auth()->user()->id.'_'.time().'.'.$extension;

            # upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);

        }

        # init post
        $post = Post::find($id);

        # add fields
        $post->title = $request->input('title');
        $post->category = $request->input('category');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')){
            # delete image
            if($post->cover_image !== 'noimage.png'){
                #delete image
                Storage::delete('public/cover_images/'.$post->cover_image);
            }
            $post->cover_image = $fileNameToStore;
        }

        # save post
        $post->save();

        # return redirect
        return redirect('/posts/'.$post->id)->with('success', 'Blog post updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        # get the post
        $post = Post::find($id);

        # chech is correct user is submitting form
        if(auth()->user()->id !== $post->user_id) {
            #return redirect 
            return redirect('/posts')->with('error', 'Unauthorized Action!');
        }

        # delete image
        if($post->cover_image !== 'noimage.png'){
            #delete image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        # delete the post
        $post->delete();

        # redirect action
        return redirect('/home')->with('success', 'Post has been successfully deleted.');

    }
}
