<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

	    // retrieve posts from MySQL and pipe them
	    // to the dashboard

	    $posts = Post::get();

	    return view('dashboard')
		    ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

	    Post::create([
		    'subject' => $request->input('subject'),
		    'body' => $request->input('body'),
	    ]);

	    return redirect()->route('dashboard');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

	    $post = Post::find($id);

	    return view('dashboard')
		    ->with('post');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

	    $post = Post::find($id);

	    return view('posts')
		    ->with('post', $post);
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

	    Post::updateOrCreate(
		    ['id' => $id],
		    ['subject' => $request->input('subject'),
		    'body' => $request->input('body'),
		    ]
	    );

	    return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

	    Post::destroy($id);


	    return redirect()->route('dashboard');



    }
}
