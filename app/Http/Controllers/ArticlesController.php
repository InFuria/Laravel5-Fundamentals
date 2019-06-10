<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller {

    //Implement the middleware
    public function __construct(){
        $this->middleware('auth', ['only' => 'create']);

        /*
        $this->middleware('auth', ['except' => 'create']);*/
    }


    public function index(){

        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));
    }


    /**
     *
     * Show a single article
     *
     * @param Article $article
     * @return \Illuminate\View\View
     */
    public function show(Article $article){

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


    public function edit(Article $article){

        return view('articles.edit', compact('article'));
    }


    public function update(Article $article, ArticleRequest $requests){

        $article->update($requests->all());

        return redirect('articles');
    }


}
