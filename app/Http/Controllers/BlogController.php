<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Category;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $status     = $request->get('status');
    $keyword    = $request->get('keyword') ? $request->get('keyword') : '';
    $category   = $request->get('c') ? $request->get('c') : '';

    if($status){
      // $articles = \App\Article::where('status', strtoupper($status))->where('title', 'LIKE', "%$keyword%")->paginate(10);
      $blogs = Blog::with('categories')
                          ->whereHas('categories', function($q) use($category){
                            $q->where('name', 'LIKE', "%$category%");
                          })
                          ->where('status', strtoupper($status))
                          ->where('title', 'LIKE', "%$keyword%")
                          ->orderBy('created_at', 'desc')
                          ->paginate(10);

    }else{
      // $articles = \App\Article::with('categories')->where('title', 'LIKE', "%$keyword%")->paginate(10);
      $blogs = Blog::with('categories')
                          ->whereHas('categories', function($q) use($category) {
                            $q->where('name', 'LIKE', "%$category%"); 
                          })
                          ->where('title', 'LIKE', "%$keyword%")
                          ->orderBy('created_at', 'desc')
                          ->paginate(10);
    }

    return view('blog.index', ['blogs'=>$blogs]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = \App\Category::all();
    return view('blog.create', ['categories'=>$categories]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    \Validator::make($request->all(),[
      'title'      => 'required|min:2|max:200'
    ])->validate();

    $new_blogs               = new \App\Blog;
    $new_blogs->title        = $request->get('title');
    $new_blogs->slug         = \Str::slug($request->get('title'), '-');
    $new_blogs->content      = $request->get('content');
    $new_blogs->create_by    = \Auth::user()->id;
    $new_blogs->status       = $request->get('save_action');
    $new_blogs->save();
    
    // save in table article category
    $new_blogs->categories()->attach($request->get('categories'));

    return redirect()->route('articles.index')->with('success', 'Article successfully created');
}

  /**
   * Display the specified resource.
   *
   * @param  \App\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function show(Blog $blogs)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Article  $article
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $article = \App\Blog::with('categories')->findOrFail($id);
    $data = [
      'categories' => Category::Where('id','<>',$article->categories[0]->id)->get(),
      'article' => $article
    ];
    return view('blog.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Article  $blog
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $blog = \App\Blog::findOrFail($id);

    $blog->title        = $request->get('title');
    $blog->slug         = \Str::slug($request->get('title'), '-');
    $blog->content      = $request->get('content');
    $blog->status       = $request->get('save_action');
    $blog->update_by    = \Auth::user()->id;

    $blog->categories()->sync($request->get('categories'));

    $blog->save();
    return redirect()->route('articles.index')->with('success', 'Category successfully update.');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Blog  $blog
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $article = \App\Blog::findOrFail($id);
    $article->forceDelete();

    return redirect()->route('articles.index')->with('success', 'Article permanenly delete');
  }

  public function upload(Request $request){
    if($request->hasFile('upload')) {
      // $originName = $request->file('upload')->getClientOriginalName();
      // $fileName   = pathinfo($originName, PATHINFO_FILENAME);
      // $extension  = $request->file('upload')->getClientOriginalExtension();
      // $fileName   = $fileName.'_'.time().'.'.$extension;

      // $request->file('upload')->move(public_path('images'), $fileName);

      // $CKEditorFuncNum = $request->input('CKEditorFuncNum');
      
      // $url = asset('images/'.$fileName); 
      // $msg = 'Image uploaded successfully'; 

      // $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
      // @header('Content-type: text/html; charset=utf-8'); 

      // echo $response;

    }
  }

  public function blog(Request $request){
  
    $keyword    = $request->get('s') ? $request->get('s') : '';
    $category   = $request->get('c') ? $request->get('c') : '';
    $blogs = Blog::with('categories')
                ->whereHas('categories', function($q) use($category){
                    $q->where('name', 'LIKE', "%$category%");
                })
                ->where('status', 'PUBLISH')
                ->where('title', 'LIKE', "%$keyword%")
                ->orderBy('created_at','desc')
                ->paginate(10);
    $recents = Blog::select('title','slug')->where('status', 'PUBLISH')->orderBy('created_at','desc')->limit(5)->get();

    $data = [
      'blogs'  => $blogs,
      'recents'   => $recents
    ];

    return view('blog', $data);
  }


  public function show_article($slug)
  {
    $blogs   = Blog::where('slug', $slug)->first();
    $recents    = Blog::select('title','slug')->where('status', 'PUBLISH')->orderBy('created_at','desc')->limit(5)->get();
    $data = [
      'blogs'  => $blogs,
      'recents'   => $recents
    ];
    return view('blog', $data);
  }

}
