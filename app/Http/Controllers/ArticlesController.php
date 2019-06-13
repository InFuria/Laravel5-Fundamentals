<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Tag;
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



    /**
     * Show the page to create a new article.
     *
     * @return \Illuminate\View\View
     */
    public function create(){

        $tags = Tag::lists('name', 'id');
        return view('articles.create', compact('tags'));
    }


    /**
     * Save a new article.
     *
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request){

        $article = Auth::user()->articles()->create($request->all());
        $article->tags()->attach($request->input('tag_list'));

        flash('Your article has been successfully created!', 'Good job');
        return redirect('articles')->with('flash_message');
    }


    /**
     * Edit article
     *
     * @param Article $article
     * @return \Illuminate\View\View
     */
    public function edit(Article $article){

        $tags = Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
    }


    public function update(Article $article, ArticleRequest $requests){

        $article->update($requests->all());

        return redirect('articles');
    }


}
