<?php

namespace App\Http\Controllers;

use App\Model\Context;
use App\Model\TermCha;
use App\Model\TermContext;
use App\Model\TermEng;
use App\Model\TermEngCha;
use Illuminate\Http\Request;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $termcontexts = TermEngCha::with('termcontext')->orderBy('id', 'DESC')->get();      
        return view('modules.term.index', compact('termcontexts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contexts = Context::all();
        return view('modules.term.add-new-term', compact('contexts'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeTerm(Request $request)
    {
        // dd($request->all());

        $eterm = $request->eterms;
        $cterm = $request->cterms;
        $resE = array_filter($eterm);
        $resC = array_filter($cterm);

        $resultE = array_values($resE);
        $resultC = array_values($resC);

        $enotet = $request->enotet;
        $cnotet = $request->cnotet;
        
        $paraCon = new TermContext;
        $paraCon->esource = $request->esource;
        $paraCon->csource = $request->csource;
        $paraCon->eparagraph = $request->epara;
        $paraCon->cparagraph = $request->cpara;
        $paraCon->enote = $request->enote;
        $paraCon->cnote = $request->cnote;
        $paraCon->context_no =  mt_rand(100000, 999999);
        $paraCon->save();

        if ($paraCon) {
            foreach ($resultE as $ky => $va) {
                $engT = new TermEngCha;

                $engT->term_context_id = $paraCon->id;
                $engT->term_no = mt_rand(100000, 999999);
                $engT->etermst = $resultE[$ky];
                $engT->ctermst = $resultC[$ky];
                $engT->enotet = $enotet[$ky];
                $engT->cnotet = $cnotet[$ky];

                $engT->save();

            }
        }
        

        return redirect()->route('term.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editTerm($id)
    {
        $termcontext = TermEngCha::with('termcontext')->find($id);      
        return view('modules.term.termEdit', compact('termcontext'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function termDetails($id)
    {
        $detail = TermEngCha::with('termcontext')->find($id);      
        return view('modules.term.termDetails', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTerm(Request $request)
    {
        $engT = TermEngCha::find($request->id);
        $engT->term_no = mt_rand(100000, 999999);
        $engT->etermst = $request->eterms;
        $engT->ctermst = $request->cterms;
        $engT->save();

        $paraCon = TermContext::find($engT->term_context_id);
        $paraCon->esource = $request->esource;
        $paraCon->csource = $request->csource;
        $paraCon->eparagraph = $request->epara;
        $paraCon->cparagraph = $request->cpara;
        $paraCon->enote = $request->enote;
        $paraCon->cnote = $request->cnote;
        $paraCon->context_no =  mt_rand(100000, 999999);
        $paraCon->save();
        

        return redirect()->route('term.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTerm($id)
    {
        $context = TermEngCha::find($id)->delete();
        return redirect()->route('term.index');
    }
}
