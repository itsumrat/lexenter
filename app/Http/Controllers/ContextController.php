<?php

namespace App\Http\Controllers;

use App\Article;
use App\Model\AddTermCha;
use App\Model\AddTermEng;
use App\Model\AddTermEngChi;
use App\Model\Context;
use App\Model\ContextParaCha;
use App\Model\CotextParagraph;
use App\Model\TermContext;
use App\Model\TermEngCha;
use Illuminate\Http\Request;
use App\Imports\ContextImport;
use Validator;
use Maatwebsite\Excel\Facades\Excel;

class ContextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contexts = CotextParagraph::with('paracontext', 'temrs')->orderBy('id', 'DESC')->paginate(20);
        //dd($contexts);
        return view('modules.context.index', compact('contexts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contexts = Context::all();
        $articles = Article::all();
        return view('modules.context.create', compact('contexts', 'articles'));
    }

    public function getCtitle($id)
    {
        $articles = Article::where('id', $id)->get();
        return response()->json($articles);
    }

    public function getEtitle($id)
    {
        $articles = Article::where('id', $id)->get();
        return response()->json($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $epara = explode('</p>', $request->epara);
        $cpara = explode('</p>', $request->cpara);

        $count = count($epara);
        $ccount = count($cpara);
        if ($count == $ccount) {
            $narray = array();
            for ($i = 0; $i < $count; $i++) {
                $narray[$i] = ['eparagraph' => $epara[$i], 'cparagraph' => $cpara[$i]];
            }
            $count1 = count($narray);

            // create article 
            $checkArticle = Article::where('id', $request->ctitle)->first();
            // $contextCount = CotextParagraph::count();
            // $prefixCon = "CON";
            // if($contextCount<1){
            //     $contextID = $prefixCon."100000";
            // }
            // else{
            //     $contextID =CotextParagraph::orderBy('id', 'desc')->first()->context_no;
            //     $num= (int)preg_replace('/[^0-9]/', '', $contextID);
            //     $contextID=$prefixCon.($num+1);
            // }

            if ($checkArticle) {
                $context = Context::create($request->except('article_id', 'article_code', 'etitle', 'ctitle') + [
                        'article_id' => $checkArticle->id,
                        'article_code' => $checkArticle->article_code,
                        'etitle' => $checkArticle->title_en,
                        'ctitle' => $checkArticle->title_cn
                    ]);

                //        $xontext= Context ::get()->where('article_id',$checkArticle->id);

                if ($context) {
                    foreach ($narray as $key => $value) {
                        if (--$count1 <= 0) {
                            break;
                        }

                        $contextCount = CotextParagraph::count();
                        $prefixCon = "CON";
                        if ($contextCount < 1) {
                            $contextID = $prefixCon . "100000";
                        } else {
                            $contextID = CotextParagraph::orderBy('id', 'desc')->first()->context_no;
                            $num = (int)preg_replace('/[^0-9]/', '', $contextID);
                            $contextID = $prefixCon . ($num + 1);
                        }

                        $checkOrder = CotextParagraph::where('article_id', $context->article_id)
                            ->latest()->first();


                        if (!empty($checkOrder)) {
                            $order = CotextParagraph::where('article_id', $context->article_id)->max('order');
                        } else {
                            $order = 1;
                        }
                        $paraCon = new CotextParagraph;
                        $paraCon->context_id = $context->id;
                        $paraCon->article_id = $checkArticle->id;
                        $paraCon->esource = $request->esource;
                        $paraCon->csource = $request->csource;
                        $paraCon->eparagraph = $value['eparagraph'];
                        $paraCon->cparagraph = $value['cparagraph'];
                        $paraCon->context_no = $contextID;
                        if (!empty($checkOrder)) {
                            $paraCon->order = $order + 1;
                        } else {
                            $paraCon->order = $order;
                        }
                        $paraCon->save();
                    }
                }
            } else {
                $articles = Article::count();
                $prefix = "ART";
                if ($articles < 1) {
                    $articleID = $prefix . "100000";
                } else {
                    $articleID = Article::orderBy('id', 'desc')->first()->article_code;
                    $num = (int)preg_replace('/[^0-9]/', '', $articleID);
                    $articleID = $prefix . ($num + 1);
                }
                $article = new Article();
                $article->article_code = $articleID;
                $article->title_en = $request->etitle;
                $article->source_en = $request->esource;
                $article->content_en = $request->content_en;
                $article->note_en = $request->enote;
                $article->title_cn = $request->ctitle;
                $article->source_cn = $request->csource;
                $article->content_cn = $request->content_cn;
                $article->note_cn = $request->cnote;
                $article->save();

                $context = Context::create($request->except('article_id', 'article_code', 'etitle', 'ctitle') + [
                        'article_id' => $article->id,
                        'article_code' => $article->article_code,
                        'etitle' => $article->title_en,
                        'ctitle' => $article->title_cn
                    ]);

                if ($context) {
                    foreach ($narray as $key => $value) {
                        if (--$count1 <= 0) {
                            break;
                        }

                        $contextCount = CotextParagraph::count();
                        $prefixCon = "CON";
                        if ($contextCount < 1) {
                            $contextID = $prefixCon . "100000";
                        } else {
                            $contextID = CotextParagraph::orderBy('id', 'desc')->first()->context_no;
                            $num = (int)preg_replace('/[^0-9]/', '', $contextID);
                            $contextID = $prefixCon . ($num + 1);
                        }
                        $checkOrder = CotextParagraph::where('context_id', $context->id)
                            ->latest()->first();
                        if (!empty($checkOrder)) {
                            $order = CotextParagraph::where('context_id', $context->id)->max('order');
                        } else {
                            $order = 1;
                        }

                        $paraCon = new CotextParagraph;
                        $paraCon->context_id = $context->id;
                        $paraCon->article_id = $article->id;
                        $paraCon->esource = $request->esource;
                        $paraCon->csource = $request->csource;
                        $paraCon->eparagraph = $value['eparagraph'];
                        $paraCon->cparagraph = $value['cparagraph'];
                        $paraCon->context_no = $contextID;
                        if (!empty($checkOrder)) {
                            $paraCon->order = $order + 1;
                        } else {
                            $paraCon->order = $order;
                        }
                        $paraCon->save();
                    }
                }
            }


            return redirect()->route('context.index');
        } else {
            // return redirect()->back()->with('warning' , $display);
            return redirect()->back()->with('warning', 'Chinese & English paragraph length does not same!');
        }
    }

    // function removeElement($epara,$value) {
    //    if (($key = array_search($value, $epara)) !== false) {
    //      unset($epara[$key]);
    //    }
    //   return $epara;
    // }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function viewmore($id)
    {
        $context = CotextParagraph::with('paracontext', 'temrs')->find($id);
        return view('modules.context.viewmore', compact('context'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function editcontext($id)
    {
        $context = CotextParagraph::with('paracontext')->find($id);
        return view('modules.context.editcon', compact('context'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function posteditcontext(Request $request)
    {
        $context = CotextParagraph::with('paracontext')->find($request->conid);

        $context->esource = $request->esource;
        $context->csource = $request->csource;
        $context->eparagraph = $request->epara;
        $context->cparagraph = $request->cpara;
        $context->save();

        $conId = Context::find($context->paracontext->id);
        $conId->etitle = $request->etitle;
        $conId->ctitle = $request->ctitle;
        $conId->enote = $request->enote;
        $conId->cnote = $request->cnote;
        $conId->save();

        return redirect()->route('context.index');
    }


    public function addTermContext($id)
    {
        $context = CotextParagraph::find($id);
        return view('modules.context.add-term', compact('context'));
    }


    public function addTerm(Request $request)
    {
        //dd($request->all());

        $eterm = $request->eterms;
        $cterm = $request->cterms;
        $resE = array_filter($eterm);
        $resC = array_filter($cterm);

        $resultE = array_values($resE);
        $resultC = array_values($resC);

        foreach ($resultE as $ky => $va) {
            $engT = new AddTermEngChi;

            $engT->context_id = $request->conid;
            $engT->term_no = mt_rand(100000, 999999);
            $engT->eterms = $resultE[$ky];
            $engT->cterms = $resultC[$ky];
            $engT->enote = $request->enote;
            $engT->cnote = $request->cnote;

            $engT->save();

        }

        // additional term add 

        $paraCon = new TermContext;
        $paraCon->esource = $request->esource;
        $paraCon->csource = $request->csource;
        $paraCon->eparagraph = $request->eparagraph;
        $paraCon->cparagraph = $request->cparagraph;
        $paraCon->enote = $request->enote;
        $paraCon->cnote = $request->cnote;
        $paraCon->context_no = mt_rand(100000, 999999);
        $paraCon->save();

        if ($paraCon) {
            foreach ($resultE as $k => $v) {
                $engT = new TermEngCha;

                $engT->term_context_id = $paraCon->id;
                $engT->term_no = mt_rand(100000, 999999);
                $engT->etermst = $resultE[$k];
                $engT->ctermst = $resultC[$k];
                $engT->enotet = $request->enote;
                $engT->cnotet = $request->cnote;

                $engT->save();

            }
        }

        return redirect()->route('context.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteContext($id)
    {
        $context = CotextParagraph::find($id)->delete();
        return redirect()->route('context.index');
    }


    public function advancedSearch(Request $request)
    {
        $article = Article::where('id', $request->article)->first();

        $context = Context::where('id', $request->context)->first();

        $term = Term::where('id', $request->term)->first();

        // $article = $request->article;
        // $context = $request->context;
        // $term = $request->term;

        // $collection = collect($article);
        // $all =  $collection->merge($context);

        return response()->json($all);
    }

    public function import(Request $request) {
        Validator::make($request->all(), ['file' => 'required'])->validate();
        set_time_limit(0);
        Excel::import(new ContextImport, request()->file('file'));

        return redirect()->route('context.index');
    }
}
