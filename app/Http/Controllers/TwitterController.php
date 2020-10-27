<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Facades\Twitter;

class TwitterController extends Controller
{
    // public function index(Request $request)
    public function index($tag)
    {
        // //ツイートを5件取得
        // $result = Twitter::get('statuses/home_timeline');
        // dd($result);

        // foreach($result as $test){
        //     echo $test->user->name;

        // }

        $tag = "#".$tag;

        //"TwitterOAuthを使って検索するよ"というツイートを10件取得する
        $search_tag = \Twitter::get("search/tweets", array("q" => $tag, 'count' => 10));
        $result = array();

        foreach ($search_tag as $key => $value) {

            if ($key === "statuses") {
                $result = array_merge($result, $value);
            }
        }

        // dd($result);

        // return view('twitter', [
        //     "result" => $result
        // ]);

        // $result = mb_convert_encoding($result, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        // dd($result);
        return response()->json($result);
    }
}
