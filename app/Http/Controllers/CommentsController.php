<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WikiComments;

class CommentsController extends Controller
{
    public function wiki(Request $request) 
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);

        $wikiC = new WikiComments;
        $wikiC->user_id = $request->user_id;
        $wikiC->post_id = $request->post_id;
        $wikiC->body = $request->comment;
        $wikiC->save();

        return back();
    }
}
