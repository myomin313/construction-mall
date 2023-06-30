<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\UserCoin;
use Auth;

class UserCoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{  
            return $this->getusercoin();
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_usercoinhistorylist()
    {
         try{ 
 
            $id=Auth::user()->id;
          $usercoinhistory_lists = DB::table('users')
          ->leftjoin('quotations', 'quotations.send_user_id', '=', 'users.id')
          ->select('users.name', 'users.coin', 'users.left_coin', 'quotations.used_coin')
          ->where('users.id', '=',  $id)
          ->get();
     
            return view('admin.usercoin.index_usercoinhistorylist',compact('usercoinhistory_lists'));
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
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
        //
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
        //
    }
      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete ($id)
    { 
        try{ 
            $user_id=Auth::user()->id; 
            $delete_coin = UserCoin::where('id', '=', $id)->delete(); 
            $success = array('success'=>"Successfully delete.");
            return $this->getusercoin();
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
    public function getusercoin(){
        try{ 
 
            $id=Auth::user()->id;
            $usercoin_lists = DB::table('user_coins')
            ->join('coin_plans', 'coin_plans.id', '=', 'user_coins.coin_plan_id')
            ->join('users', 'users.id', '=', 'user_coins.user_id')
            ->select('users.name', 'user_coins.coin_plan_id', 'user_coins.status', 'user_coins.id', 'user_coins.user_id'
            , 'coin_plans.coin_count', 'coin_plans.price')
            ->where('user_coins.user_id', '=',  $id)
            ->get();
       
              return view('admin.usercoin.index',compact('usercoin_lists'));
         }
         catch (\Illuminate\Database\QueryException $ex) {
             $res['status'] = false;
             $res['message'] = $ex->getMessage();
             return response($res, 500);
         }
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_usedcoinhistory()
    {
        try{  

            $id=Auth::user()->id;
            $usedcoinhistory_lists = DB::table('quotations')
            ->leftjoin('users', 'users.id', '=', 'quotations.send_user_id')
            ->select('users.name', 'quotations.used_coin', 'quotations.received_status','quotations.requested_status', 'quotations.received_user_id'
            , 'quotations.created_at','quotations.id')
            ->where('quotations.send_user_id', '=',  $id)
            ->get();
       
              return view('admin.usercoin.index_usedcoinhistory',compact('usedcoinhistory_lists'));
        }
        catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
}
