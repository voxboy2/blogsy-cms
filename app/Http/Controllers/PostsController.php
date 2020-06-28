<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use App\Tag;
use App\Category;
use Session;


class PostsController extends Controller
{
   
    public function __construct(){
        $this->middleware('verifyCategoriesCount')->only(['create', 'store']);
    }

    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {   
        // upload the image to storage
        $image = $request->image->store('posts');
        

        // create the post
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content'   => $request->content,
            'image'  => $image,
            'published_at' => $request->published_at,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id
        ]);

        if($request->tags) {
            $post->tags()->attach($request->tags);
        }
        
        // flash message
        session()->flash('success', 'Post created succesfully');
        
        // redirect user
        return redirect(route('posts.index'));
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
    public function edit(Post $post)
    {
        return view('admin.posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {   
        $data = $request->only(['title', 'description', 'published_at', 'content']);
        
        if ($request->hasFile('image')){
            // check if new image
            $image = $request->image->store('posts');
            // delete old one

            $post->deleteImage();
            // deletes image by calling the delete image function

            $data['image'] = $image;
        }

        // if ($request->tags) {
        //     $post->tags->sync($request->tags);
        // }

        $post->update($data);

        session()->flash('success', 'Post updated sucessfully');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        if ($post->trashed()) {
            $post->deleteImage();
            $post->forceDelete();
        }  else {
            $post->delete();
        }


        session()->flash('success', 'Post deleted succesfully');

        return redirect(route('posts.index'));

    }


    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();

        return view('admin.posts.index')->withPosts($trashed);

    }

    public function restore($id) {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();

        session()->flash('success', 'Post restored successfully');

        return redirect()->back();
        // takes the user back to where the user is coming from
    }


















}

