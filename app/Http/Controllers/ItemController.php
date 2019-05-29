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
        $compare = Request('hasExpired') ? '<=' : '>';
        $lastest = Item::latest()->where('end_time', $compare , now()) ;

        if(Request('user_id')) {
            $lItems = $lastest->where('user_id', Request('user_id'))->paginate(15);
        } else {
            $lItems = Request('cat') ? $lastest->where('category_id', Request('cat'))->paginate(15) : $lastest->paginate(15);
        }

        foreach ($lItems as $k => $v) {
            $lItems[$k]->currentBid = $lItems[$k]->currentBid() ? $lItems[$k]->currentBid()->amount : 0;
            $lItems[$k]->highBidder = $lItems[$k]->highBidder() ;
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
        $item->user_phone = $item->user->phone;
        $item->user_address = $item->user->address;
        $item->user_email = $item->user->email;
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
    public function endBid($id)
    {
        $item = Item::find($id);
        $item->end_time = Carbon::now();
        $item->save();
        return json_encode(array('code'=>200));
    }
}
