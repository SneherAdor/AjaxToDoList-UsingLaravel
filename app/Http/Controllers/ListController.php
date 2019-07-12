<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ListController extends Controller
{
    public function index(){
    	$items = Item::all();
    	return view('list', compact('items'));
    }

    public function create(Request $request){
    	$item = new Item;
    	$item->item = $request->text;
    	$item->save();
    	return "DONE";
    }

    public function delete(Request $request){
    	return $request->all();
    }
}
