<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Auth;
use DB;
use App\ArticleBookmark;
use App\ContextBookmark;


class ArticleBookmarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id=Auth::user()->id;
        $conBookmarks= DB::table('context_bookmarks')
                 ->join('cotext_paragraphs', 'cotext_paragraphs.id', '=', 'context_bookmarks.context_id')
                 ->select('eparagraph','cparagraph','cotext_paragraphs.id','context_bookmarks.id')
                 ->where('context_bookmarks.user_id',$user_id)->get();
        // $user_id=Auth::user()->id;
        $bookmarks= DB::table('article_bookmarks')
                 ->join('articles', 'articles.id', '=', 'article_bookmarks.article_id')
                 ->select('article_code','title_en','articles.id','article_bookmarks.id')
                 ->where('article_bookmarks.user_id',$user_id)->get();
                 // dd($bookmarks);
      //  $bookmarks = Bookmark::where('user_id',$user_id)->get();
 
        return view('modules.bookmark.index',compact('bookmarks','conBookmarks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = ArticleBookmark::Where('article_id', '=',$request->article_id)->first();

        $this->validate($request,[
            'article_id' => 'required'
            ]);
         $user_id=Auth::user()->id;
         $bookmark =new ArticleBookmark();
         $bookmark->article_id = $request->article_id;
         $bookmark->user_id = $user_id;
            if( $article ===null)
            {
                    $bookmark->save();
            }
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
        $article = ArticleBookmark::find($id)->delete();
        return redirect()->route('bookmark.index');
    } 
       public function contextDestroy($id)
    {
        //
        $article = ContextBookmark::find($id)->delete();
        return redirect()->route('bookmark.index');
    }
}
