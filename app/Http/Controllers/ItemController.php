<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\User;
use Carbon\Carbon;


class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lastest = Item::latest()->where('end_time', '>', now());
        $lItems = Request('cat') ? $lastest->where('category_id', Request('cat'))->paginate(15) : $lastest->paginate(15);
        foreach ($lItems as $k => $v) {
            $lItems[$k]->currentBid = $lItems[$k]->currentBid() ? $lItems[$k]->currentBid()->amount : 0;;
        }
        return $lItems;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'   =>  'required',
            'user_id'       =>  'required',
            'title'         =>  'required|max:100',
            'description'   =>  'required|max:250',
            'size'          =>  'required',
            'color'         =>  'required',
            'flavor'        =>  'required',
            'phone'         =>  'nullable',
            'address'       =>  'required',
            'end_time'      =>  'required',
            'price'         =>  'required',
            'quantiti'      =>  'required',
        ]);
        $item = new Item;
        foreach ($request->request as $k => $v) {
            $item[$k] = $v;
        }
        $item->end_time = Carbon::now()->addDays($request->end_time);
        $item->save();
        return $item;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        $item->user_name = $item->user->name;
        $item->currentBid = $item->currentBid() ? $item->currentBid()->amount : 0;
        return $item;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
