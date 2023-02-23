<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.articles.index', [
            'title' => 'Daftar Artikel',
            'account' => User::where('id', auth()->user()->id),
            'articles' => Articles::with('user')->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.articles.create', [
            'title' => 'Buat Artikel Baru',
            'account' => User::where('id', auth()->user()->id),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:255',
            'slug' => 'required|unique:articles',
            'body' => 'required',
            'image' => 'image|file|max:2048'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('img-articles');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['exerpt'] = Str::limit(strip_tags($request->body), 45, '...');
        Articles::create($validatedData);
        return redirect('/dashboard/articles')->with('success', 'Artikel telah berhasil dibuat!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $article)
    {
        return view('dashboard.articles.show', [
            'title' => 'Artikel | ' . $article->title,
            'account' => User::where('id', auth()->user()->id),
            'article' => $article->load('user')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $article)
    {
        return view('dashboard.articles.update', [
            'title' => 'Artikel | ' . $article->title,
            'account' => User::where('id', auth()->user()->id),
            'article' => $article->load('user')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articles $article)
    {
        $rules = [
            'title' => 'required|min:3|max:255',
            'body' => 'required',
            'image' => 'image|file|max:2048',
        ];

        if ($request->slug != $article->slug) {
            $rules['slug'] = 'required|unique:articles';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validatedData['image'] = $request->file('image')->store('img-articles');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['exerpt'] = Str::limit(strip_tags($request->body), 45, '...');

        Articles::where('id', $article->id)->update($validatedData);
        return redirect('/dashboard/articles')->with('success', 'Artikel telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $article)
    {
        if ($article->image) {
            Storage::delete($article->image);
        }
        Articles::destroy($article->id);
        return redirect('/dashboard/articles')->with('success', 'Artikel telah dihapus!');
    }
}
