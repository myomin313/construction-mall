<?php

namespace App\Helper;
use Session;
class AllHelper{		
	public static function updateStatus($request,$model_name){
        try
        {
            $data['is_active'] = $request->is_active;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $model_name::where('id', '=', $request->id)
                ->update($data);
            Session::flash('success', 'Successfully Change Status!');
            $success = array(
                'success' => "Successfully Status Changes!"
            );
            return $success;
            //return response()->json($success);
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return $res;
            //return response($res, 500);
        }
	}

    public static function deleteAll($request,$model_name){
        $ids = $request->ids;
        foreach( $ids as $id){
           $model_name::where('id','=',$id)->delete();
        }
        Session::flash('success', 'Deleted successfully!');
        $success = array('success'=>"Successfully delete!");
        return $success;  
    }

    public static function approveStatus($request,$model_name){
         try{  
            $data['is_active'] = $request->is_active;
            $data['updated_at'] = date('Y-m-d H:i:s');
            $data['approved_user_id'] = Auth()->user()->id;
           $model_name::find($request->id)
            ->update($data);
             Session::flash('success', 'Successfully Change Status!'); 
            $success = array('success'=>"Successfully saved changes!");
            return $success;  
        }catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return $res;
        }  
    }

    public static function updateStatusWithUpdater($request,$model_name){
        try{  
            $data['is_active']=$request->is_active;
            $data['updated_by'] = Auth()->user()->id;
            $data['updated_at'] = date('Y-m-d H:i:s');

           $model_name::where('id','=',$request->id)
            ->update($data);
            Session::flash('success', 'Successfully Change Status!');
            $success = array('success'=>"Successfully saved Changes.");
            return $success;  
        }catch (\Illuminate\Database\QueryException $ex) {
            $res['status'] = false;
            $res['message'] = $ex->getMessage();
            return $res;
        }
    }
}
?>