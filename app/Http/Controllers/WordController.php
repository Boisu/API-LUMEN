<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function showAllWords()
    {
        return response()->json(Word::all());
    }

    public function showOneWord($id)
    {
        return response()->json(Word::find($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|unique:words',
        ]);

        $word = Word::create($request->all());

        return response()->json($word, 201);
    }

    public function update($id, Request $request)
    {
        $word = Word::findOrFail($id);
        $word->update($request->all());

        return response()->json($word, 200);
    }

    public function delete($id)
    {
        Word::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
