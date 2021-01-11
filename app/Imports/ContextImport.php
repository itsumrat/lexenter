<?php

namespace App\Imports;

use App\Article;
use App\Model\Context;
use App\Model\CotextParagraph;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContextImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $contex_data = [
            'esource' => $row['e_source'],
            'etitle' => $row['e_title'],
            'enote' => $row['e_note'],
            'csource' => $row['c_source'],
            'ctitle' => $row['c_title'],
            'cnote' => $row['c_note'],
        ];


        // create article
        $article = Article::where('title_en', $row['e_article_title'])->first();
        if (!$article) {
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
            $article->title_en = $row['e_title'];
            $article->source_en = $row['e_source'];
            $article->note_en = $row['e_note'];
            $article->title_cn = $row['c_title'];
            $article->source_cn = $row['c_source'];
            $article->content_cn = null; //$row['content_cn'];
            $article->note_cn = $row['c_note'];
            $article->save();
        }

        $context = Context::create([
            'article_id' => $article->id,
            'article_code' => $article->article_code,
            'etitle' => $article->title_en,
            'ctitle' => $article->title_cn,
            'esource' => $row['e_source'],
            'csource' => $row['c_source']
        ]);

        if ($context) {
            $contextCount = CotextParagraph::count();
            $prefixCon = "CON";
            if ($contextCount < 1) {
                $contextID = $prefixCon . "100000";
            } else {
                $contextID = CotextParagraph::orderBy('id', 'desc')->first()->context_no;
                $num = (int)preg_replace('/[^0-9]/', '', $contextID);
                $contextID = $prefixCon . ($num + 1);
            }

            $checkOrder = CotextParagraph::where('article_id', $article->id)->latest()->first();

            $paraCon = new CotextParagraph;
            $paraCon->context_id = $context->id;
            $paraCon->article_id = $article->id;
            $paraCon->esource = $row['e_source'];
            $paraCon->csource = $row['c_source'];
            $paraCon->eparagraph = $row['e_title'];
            $paraCon->cparagraph = $row['c_title'];
            $paraCon->context_no = $contextID;

            if (!empty($checkOrder)) {
                $paraCon->order = CotextParagraph::where('article_id', $context->article_id)->max('order') + 1;
            } else {
                $paraCon->order = 1;
            }
            $paraCon->save();
        }
    }
}
