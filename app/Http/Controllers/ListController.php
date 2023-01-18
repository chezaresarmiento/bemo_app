<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
	//
	public function getLists(Request $request){

		$lists=Collect(DB::Connection("mysql")->select("SELECT * FROM lists"))->groupBy("list");

		return response()->json($lists,200);
	}

	public function updateList(Request $request){
	
		$list=$request->get("list");
		$task=$request->get("task");

		$sql="UPDATE lists SET list='$list' WHERE task='$task'";
		DB::Connection("mysql")->select($sql);

		return response()->json("updated",200);
	
	}
}
