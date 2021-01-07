<?php

namespace App\Imports;

use App\Article;
use Maatwebsite\Excel\Concerns\ToModel;

class ArticleImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
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
        return new Article([
            //
            'article_code'     =>   $articleID,
            'title_en'     => $row['0'],
            'source_en'     => $row['1'],
            'content_en'     => $row['2'],
            'note_en'     => $row['3'],
            'title_cn'     => $row['4'],
            'source_cn'     => $row['5'],
            'content_cn'     => $row['6'],
            'note_cn'     => $row['7'],
        ]);
    }
}
