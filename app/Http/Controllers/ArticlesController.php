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

       $this->createArticle($request);

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


    public function update(Article $article, ArticleRequest $request){

        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');
    }

    /**
     * Sync up the list of tags in the database
     * @param Article $article
     * @param ArticleRequest $request
     */
    public function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }


    /**
     *
     * Save a new article
     * @param ArticleRequest $request
     * @return mixed
     */
    private function createArticle(ArticleRequest$request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }


}
