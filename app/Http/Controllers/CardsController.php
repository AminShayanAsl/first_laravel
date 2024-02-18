<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CardsController extends Controller
{
    public function index()
    {
        $cards = Card::all();
        $cards->load('user');
        $tags = Tag::all();

        return view('cards/index', ['cards'=>$cards, 'tags'=>$tags]);
   }

    public function show($id)
    {
        $card = Card::find($id);
        return view('cards/show', ['card'=>$card]);
   }

    public function add_card(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:10|unique:cards',
        ]);

        $title = $request->title;
        $card = new Card;
        $card->title = $title;
        $card->user_id = '1';
        $card->save();

        $card->tags()->attach($request->tags);

        flash('New card has been created.', 'success');

        return back();
   }

    public function editCard(Card $card)
    {
        auth()->loginUsingId(2);

//        if(Gate::denies('edit_card', $card)) {
//            abort(403, 'Sorry, You dont access to this page!');
//        }

//        $this->authorize('edit_card', $card);

        $tags = Tag::all();
        return view('cards/edit', [
            'card'=>$card,
            'tags'=>$tags,
            ]);
   }

    public function updateCard(Request $request ,Card $card)
    {
        $card->update(['title'=>$request->title]);
        $card->tags()->sync($request->tags);
        return $this->editCard($card);
   }
}
