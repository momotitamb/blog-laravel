<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
class TagController extends Controller
{
    public function index() {
        $tags = Tag::all();
        return view('tags', ['tags' => $tags]);
    }

     public function create() {
        return view('tag-create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|min:2|max:50|unique:tags,name'
        ]);

        Tag::create($request->only(['name']));
        return redirect('/tags')->with('success', 'Тег успешно создан!');
    }

    public function edit(Tag $tag) {     
        return view('tag-edit', ['tag' => $tag]);
    }

    public function update(Request $request, Tag $tag) {
        $request->validate([
            'name' => 'required|min:2|max:50|unique:tags,name'
        ]);

        $tag->update($request->only(['name']));
        return redirect('/tags')->with('success', 'Тег успешно обновлен!');
    }

    public function destroy(Tag $tag) {
        $tag->delete();
        return redirect('/tags')->with('success', 'Тег успешно удален!');
    }
}
