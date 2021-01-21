<?php

namespace App\Http\Controllers;

use App\Article;
use App\Model\AddTermEngChi;
use App\Model\CotextParagraph;
use App\Model\SearchContext;
use App\Model\SearchTerm;
use App\Model\TermEngCha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AdvnacedSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::pluck('article_code');
        $contexts = CotextParagraph::pluck('context_no');
        $terms = TermEngCha::pluck('term_no');
        return view('modules.search.index', compact('articles', 'contexts', 'terms'));
    }

    public function searchHistory()
    {
        $termSearch = SearchTerm::with('userTerm')->orderBy('id', 'DESC')->get();
        $contextSearch = SearchContext::with('userContext')->orderBy('id', 'DESC')->get();
        return view('modules.search.searchHistory', compact('termSearch', 'contextSearch'));
    }

    public function termSearch()
    {
        $termSearch = SearchTerm::all();
        return view('modules.search.termSearch', compact('termSearch'));
    }

    public function contextSearch()
    {
        $contextSearch = SearchContext::all();
        return view('modules.search.contextSearch', compact('contextSearch'));
    }


    public function advancedSearch(Request $request)
    {
        $termt = $request->termtext; 

        if (!empty($termt)) {
            SearchTerm::create($request->except('user_id', 'search_end_ter', 'search_chi_ter') + [
                'user_id' => Auth::id(),
                'search_end_ter' => $termt,
                'search_chi_ter' => $termt
            ]);
        }

        $contextsear = $request->contextsear;

        if (!empty($contextsear)) {
            SearchContext::create($request->except('user_id', 'search_end_con', 'search_chi_con') + [
                'user_id' => Auth::id(),
                'search_end_con' => $contextsear,
                'search_chi_con' => $contextsear
            ]);
        }

        $article = Article::where('article_code', $request->article)->first();

        $context = CotextParagraph::where('context_no', $request->context)->first();

        if (!empty($contextsear)) {
            $contexttt = CotextParagraph::with('paracontext','temrs')->where('eparagraph','LIKE','%'.$contextsear.'%')
                                ->orWhere('cparagraph','LIKE','%'.$contextsear.'%')->get();
        }else{
            $contexttt = '';
        }
        

        $term = TermEngCha::where('term_no', $request->term)->first();
        if (!empty($termt)) {
            $termtext = TermEngCha::with('termcontext')->where('etermst','LIKE','%'.$termt.'%')
                                ->orWhere('ctermst','LIKE','%'.$termt.'%')->first();
        }else{
            $termtext =  '';
        }
        

        $collection = collect($article);
        $alls =  $collection->merge($context);
        $col = collect($alls);
        $all = $col->merge($term);
        $colss = collect($all);
        $allsss = $colss->merge($contexttt);
        $colsss = collect($allsss);
        $al = $colsss->merge($termtext);

        return response()->json($al);
    }


    public function advancedSearchContext(Request $request)
    {

        $contextsear = $request->contextsear;
        $eterms = $request->eterms;

        if (!empty($contextsear)) {
            SearchContext::create($request->except('user_id', 'search_end_con', 'search_chi_con') + [
                'user_id' => Auth::id(),
                'search_end_con' => $contextsear,
                'search_chi_con' => $contextsear
            ]);
        }

        //$my_query = "select *, MATCH (name) AGAINST (?) from users where MATCH (hobbies) AGAINST (? IN BOOLEAN MODE) limit 10 OFFSET ?"
        //$hobbies = DB::select($my_query, array($search_term, $search_term, (($page-1)*10)));

//        $data = CotextParagraph::selectRaw("*, MATCH(eparagraph)AGAINST($contextsear)")
//            ->whereRaw("MATCH(eparagraph)AGAINST($contextsear IN BOOLEAN MODE)")
//            ->take(10);

        $contexttt = CotextParagraph::WhereRaw("MATCH(eparagraph) AGAINST(?)", $contextsear)
//                                    ->orWhere(function ($query) use($contextsear) {
//                                        $query->WhereRaw("MATCH(cparagraph) AGAINST(?)", $contextsear);
//                                    })
                                    ->orWhere('cparagraph','LIKE','%'.$contextsear)
                                    ->get();

//        $contexttt = CotextParagraph::with('paracontext','temrs')->where('eparagraph','LIKE','%'.$contextsear)
//                                ->orWhere('cparagraph','LIKE','%'.$contextsear)->get();

//        $contexttt = CotextParagraph::with('paracontext','temrs')
//                                    ->when(isset($contextsear), function ($query) use ($contextsear) {
//                                        $query->WhereRaw("MATCH(eparagraph) AGAINST('$contextsear')");
//                                    })->when(isset($eterms), function ($query) use ($eterms) {
//                                        $query->WhereRaw("MATCH(eterms) AGAINST('$eterms')");
//                                    })->get();

        return response()->json($contexttt);
    }


    public function showmoreContext($id)
    {

        $contexttt = CotextParagraph::with('paracontext','temrs')->where('id', $id)->first();

        return response()->json($contexttt);
    }

    public function advancedSearchTerm(Request $request)
    {
        $termt = $request->termtext; 

        if (!empty($termt)) {
            SearchTerm::create($request->except('user_id', 'search_end_ter', 'search_chi_ter') + [
                'user_id' => Auth::id(),
                'search_end_ter' => $termt,
                'search_chi_ter' => $termt
            ]);
        }

        $term = TermEngCha::where('term_no', $request->term)->first();
        if (!empty($termt)) {
            $termtext = TermEngCha::with('termcontext')->where('etermst','LIKE','%'.$termt.'%')
                                ->orWhere('ctermst','LIKE','%'.$termt.'%')->get();
        }
        return response()->json($termtext);
    }


    public function showmoreTerm($id)
    {

        $termtext = TermEngCha::with('termcontext')->where('id', $id)->first();

        return response()->json($termtext);
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
        //
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
    }
}
