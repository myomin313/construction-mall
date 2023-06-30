<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Quotation extends Model
{
    protected $fillable = [
        'range_id','category_id','building_type','location_id','address',
        'contact_email','contact_phone','contact_person_name','perfer_contact_way','best_contact_time',
        'project_expected_start_date','project_information',
        'file','send_user_id',
        'used_coin',
        'created_by','updated_by'];

    public static function getEnum($table,$field)
    {
        $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '$field' "))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type,$matches);
        $enum =array();
        foreach( explode(',', $matches[1]) as $value)
        {
            $v =trim($value," ' ");
            $enum =array_add($enum ,$v,$v);
        }
        
        return $enum;
    }
    public static function updateData($id,$data){
        DB::table('quotations')->where('id', $id)->update($data);
     }
     public function location()
    { 
        return $this->belongsTo('App\Location','location_id');
    }
     public function range()
    {
        return $this->belongsTo('App\Range','range_id');
    } 
     public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    } 
     public function send_user()
    {
        return $this->belongsTo('App\User','send_user_id');
    }
     public function received_company()
    {
          return $this->belongsToMany('App\Company','quotation_received_companys','quotation_id','company_id')
          ->withPivot('received_status','requested_status','created_at','updated_at');
    }
    // public function received_user()
    // {
    //       return $this->belongsToMany('App\User','quotation_received_users','quotation_id','user_id')
    //       ->withPivot('received_status','created_at','updated_at');
    // }
     public function quotation_created_user()
    {
        return $this->belongsTo('App\User','created_by');
    } 
     public function quotation_updated_user()
    {
        return $this->belongsTo('App\User','updated_by');
    } 
    // may oo
     public function user()
    {
        return $this->belongsTo('App\User','send_user_id');
    }
    public static function getQuotationToSendMail($id){
        
       $quoations=Quotation::join('quotation_received_companys','quotation_received_companys.quotation_id','=','quotations.id')
       ->join('companies','companies.id','=','quotation_received_companys.company_id')
       ->join('users as received_user','received_user.id','=','companies.user_id')
       ->join('users as send_user','send_user.id','=','quotations.send_user_id')
       ->leftjoin('categories','categories.id','=','quotations.category_id')
       ->leftjoin('locations','locations.id','=','quotations.location_id')
       ->leftjoin('ranges','ranges.id','=','quotations.range_id')
       ->select('quotations.*','send_user.name as sender_name','received_user.name as received_name','quotation_received_companys.*','send_user.email as sender_mail','received_user.email as receiver_email','categories.name as category_name','locations.name as location_name','ranges.minimum_price','ranges.maximum_price')
       ->where('quotations.id','=',$id)
       ->get();

         return $quoations;
    } 
}
