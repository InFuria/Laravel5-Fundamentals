<?php namespace App\Http\Controllers;

use App\Tag;

class TagsController extends Controller {

	public function show(Tag $tag){

	    $articles = $tag->articles()->published()->get();

	    return view('articles.index', compact('articles'));
    }

}
