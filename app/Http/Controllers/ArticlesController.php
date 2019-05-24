<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller {

    //NEW

    /*public function __construct(){
        $this->middleware('auth');
    }*/

    public function index(){

        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));
    }

    public function show($id){

        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }

    public function create(){


        return view('articles.create');
    }

    public function store(ArticleRequest $request){

        $article = new Article($request->all());

        Auth::user()->articles()->save($article);

        return redirect('articles');
    }

    public function edit($id){

        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }

    public function update($id, Requests\ArticleRequest $requests){

        $article = Article::findOrFail($id);

        $article->update($requests->all());

        return redirect('articles');
    }

}
