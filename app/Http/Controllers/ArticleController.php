<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use DataTables;
use App\Imports\ArticleImport;
use Maatwebsite\Excel\Facades\Excel;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           $articles = Article::latest()->get();
           return view('modules.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource. allcontext
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.article.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $articles=Article::count();
        $prefix = "ART";
        if($articles<1){
            $articleID = $prefix."100000";
        }
        else{
            $articleID =Article::orderBy('id', 'desc')->first()->article_code;
            $num= (int)preg_replace('/[^0-9]/', '', $articleID);
            $articleID=$prefix.($num+1);
        }
        $article = new Article();
        $article->article_code= $articleID;
        $article->title_en = $request->title_en;
        $article->source_en = $request->source_en;
        $article->content_en = $request->content_en;
        $article->note_en = $request->note_en;
        $article->title_cn = $request->title_cn;
        $article->source_cn = $request->source_cn;
        $article->content_cn = $request->content_cn;
        $article->note_cn = $request->note_cn;
        $article->save();
        return redirect()->route('article.index');

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
        $articleById = Article::where('id', $id)->first();
        return view('modules.article..edit', ['article' => $articleById]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $article = Article::find($request->id);
        $article->title_en = $request->title_en;
        $article->source_en = $request->source_en;
        $article->content_en = $request->content_en;
        $article->note_en = $request->note_en;
        $article->title_cn = $request->title_cn;
        $article->source_cn = $request->source_cn;
        $article->content_cn = $request->content_cn;
        $article->note_cn = $request->note_cn;
        $article->save();
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('article.index');
    }

    public function viewDetails($id)
    {

        $postByID= Article::with('allcontext')->where('id', $id)->first();
        
        return view('modules.article.single',['post' => $postByID]);
    }
    
    
    
    public function import() 

    {

        Excel::import(new ArticleImport,request()->file('file'));

        return back();

    }
}
