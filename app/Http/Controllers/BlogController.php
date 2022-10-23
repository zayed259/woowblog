<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('blog.index', compact('blogs'))->with('user', Auth::user());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create')->with('user', Auth::user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/posts');
            $storagepath = Storage::path($path);
            $img = Image::make($storagepath);
            // resize image only width
            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $img->resize(320, 320);
            // insert a watermark
            // $img->insert('public/watermark.png');
            // save image in desired format
            $img->save($storagepath);
        } else {
            $path = null;
        }

        $data = [
            'user_id' => Auth::user()->id,
            // 'title' => $request->title,
            'body' => $request->body,
            'image' => $path,
        ];

        Blog::create($data);
        

        return back()->with('message','Blog Create Successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    // public function show(Blog $blog)
    // {
    //     return view('blog.show', compact('blog'))->with('user', Auth::user());
    // }

    // show blog details
    public function blogDetails($id)
    {
        if(Auth::user()?->role == '2'){
            $blog = Blog::find($id);
            $comments = Comment::where('blog_id', $id)->latest()->get();
            return view('blog.show', compact('blog', 'comments'))->with('user', Auth::user());
        }else{
            $blog = Blog::find($id);
            $comments = Comment::where('blog_id', $id)->where('ishide', '1')->latest()->get();
            return view('blog.show', compact('blog', 'comments'))->with('user', Auth::user());
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd(Auth::user()->role);
        $blog= Blog::find($id);
        if($blog->user_id == Auth::user()->id || Auth::user()->role == 2){
            return view('blog.edit', compact('blog'))->with('user', Auth::user());
        }else{
            return back()->with('message','You are not authorized to edit this blog!!!');
        }

        // return view('blog.edit', compact('blog'))->with('user', Auth::user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogRequest  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, $id, Blog $blog)
    {
        $blog = Blog::find($id);
        if($blog->user_id == Auth::user()->id || Auth::user()->role == 2){
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('public/posts');
                $storagepath = Storage::path($path);
                $img = Image::make($storagepath);
                $img->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($storagepath);
                if($blog->image != null){
                    Storage::delete($blog->image);
                }
            } else {
                $path = $blog->image;
            }
            $data = [
                'user_id' => Auth::user()->id,
                'body' => $request->body,
                'image' => $path,
            ];
            $blog->update($data);
            return redirect()->route('blog.home')->with('message','Blog Update Successfully!!!');
        }else{
            return back()->with('message','You are not authorized to edit this blog!!!');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Blog $blog)
    // {
    //     $blog->destroy($blog->id);

    //     return back()->with('message','Blog Delete Successfully!!!');
    // }

    //delete blog
    public function delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('blog.home')->with('message','Blog Delete Successfully!!!');
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $blogs = Blog::onlyTrashed()->get();
        return view('blog.trashed', compact('blogs'))->with('user', Auth::user());
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function trashedRestore($id)
    {
        $blog = Blog::onlyTrashed()->findOrFail($id);
        $blog->restore();
        return back()->with('message','Blog Restore Successfully!!!');
    }

    /**
     * Force Delete the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function trashedDelete($id)
    {
        $blog = Blog::onlyTrashed()->findOrFail($id);
        $blog->forceDelete();
        return back()->with('message','Blog Force Delete Successfully!!!');
    }

    public function home()
    {
        if(Auth::user()?->role == '2'){
            $blogs = Blog::latest()->paginate(5);
            return view('blog.home', compact('blogs'))->with('user', Auth::user());
        }else{
            $blogs = Blog::where('ishide', '1')->latest()->paginate(5);
            return view('blog.home', compact('blogs'))->with('user', Auth::user());
        }
    }

    // post hide show
    public function hideShow($id)
    {
        $blog = Blog::find($id);
        if(Auth::user()->role == '2'){
            if($blog->ishide == 1){
                $blog->ishide = '0';
                $blog->save();
                return back()->with('message','Blog Hide Successfully!!!');
            }
            if($blog->ishide == 0){
                $blog->ishide = 1;
                $blog->save();
                return back()->with('message','Blog Show Successfully!!!');
            }
        }else{
            return back()->with('message','You are not authorized to hide/show this blog!!!');
        }
    }

}
