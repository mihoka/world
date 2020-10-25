<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Facades\Twitter;

class TwitterController extends Controller
{
    public function index(Request $request)
    {
        // //ツイートを5件取得
        // $result = Twitter::get('statuses/home_timeline');
        // dd($result);

        // foreach($result as $test){
        //     echo $test->user->name;

        // }
        
        //"TwitterOAuthを使って検索するよ"というツイートを10件取得する
        $search_tag = \Twitter::get("search/tweets", array("q" => "#yps1", 'count' => 10));
        $result = array();
        
        foreach($search_tag as $key => $value){

            // dd($key);
            if($key === "statuses"){
                $result = array_merge($result,$value);
            }
        }
        // dd($result);

    

        //ViewのTwitter.blade.phpに渡す
        return view('twitter', [
            "result" => $result
        ]);
    }
}
