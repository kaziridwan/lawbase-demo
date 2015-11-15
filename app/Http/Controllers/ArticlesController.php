<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;
use DB;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index')->withArticles($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->author);
        $article = new Article;

        $article->title = $request->title;

        $article->author = $request->author;

        $article->description = $request->description;

        $article->save();

        return redirect('articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);
        return redirect('articles');
    }

    public function searchArticles(Request $request){
        $query = $request->all()['query'];
        $boolFunction = null;
        $keywords = [];
        // detecting and
        $pieces = explode("AND", $query);
        if(count($pieces)>1){
            $boolFunction = "AND";

            $keywords[] = $pieces[0];
            $keywords[] = $pieces[1];
        }
        //detecting or
        $pieces = explode("OR", $query);
        if(count($pieces)>1){
            $boolFunction = "OR";

            $keywords[] = $pieces[0];
            $keywords[] = $pieces[1];
        }
        
        //detecting by
        if($boolFunction == null ){
            $pieces = explode("BY", $query);
            @$keywords[count($keywords)] = $pieces[0];
        } else{
            $pieces = explode("BY", @$keywords[count($keywords)-1]);
            @$keywords[count($keywords)-1] = $pieces[0];
        }
        $authorQueried = false;

        if(count($pieces)>1){
            $authorQueried = true;
            $keywords["author"] = $pieces[1];
        }
        // dd($authorQueried);

        $articles = null ;

            // dd($keywords);
        //trim all keywords
        foreach ($keywords as $key => $value) {
            $keywords[$key] = trim($value);
        }

        if ($boolFunction == "AND"){
            $articlesTitle = Article::where('title', 'LIKE', "%$keywords[0]%")
                                ->where('title', 'LIKE', "%$keywords[1]%")
                                ->get();
            $articlesDescr = Article::where('description', 'LIKE', "%$keywords[0]%")
                                ->where('description', 'LIKE', "%$keywords[1]%")
                                ->get();
            $articlesAuth = Article::where('author', 'LIKE', "%$keywords[0]%")
                                ->where('author', 'LIKE', "%$keywords[1]%")
                                ->get();

            $articles = $articlesTitle->merge($articlesDescr->merge($articlesAuth));
        }
        else if($boolFunction == "OR"){            
            $articles = Article::where('title', 'LIKE', "%$keywords[0]%")
                            ->orWhere('title', 'LIKE', "%$keywords[1]%")
                            ->orWhere('description', 'LIKE', "%$keywords[0]%")
                            ->orWhere('description', 'LIKE', "%$keywords[1]%")
                            ->get();
        }
        else{
            $articles = Article::where('title', 'LIKE', "%$query%")
                            ->orWhere('description', 'LIKE', "%$query%")
                            ->orWhere('author', 'LIKE', "%$query%")
                            ->get();
        }

        if($authorQueried){
            $keywords["author"] = $keywords["author"];
            if ($boolFunction == "AND"){
                $articles = Article::where('title', 'LIKE', "%$keywords[0]%")
                                ->where('author', 'LIKE', "%$keywords[author]%")
                                ->where('title', 'LIKE', "%$keywords[1]%")
                                ->get();

            }
            else if($boolFunction == "OR"){
                $articles = Article::where('title', 'LIKE', "%$keywords[0]%")
                                ->orWhere('title', 'LIKE', "%$keywords[1]%")
                                ->where('author', 'LIKE', "%$keywords[author]%")
                                ->get();
            }
            else{
                $articles = Article::where('title', 'LIKE', "%$keywords[0]%")
                                ->where('author', 'LIKE', "%$keywords[author]%")
                                ->get();
            }
        }

        return view('articles.search')->withArticles($articles)->withQuery($query)->withFilter($request->_filter);
    }
}
