<?php

namespace App\Imports;

use App\User;
use App\Company;
use App\ProjectSetting;
use App\CategoryCompany;
use Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;
use Auth;
use DB;
use Response;

class UsersImport implements 
ToModel,
WithHeadingRow, 
SkipsOnError, 
WithValidation, 
SkipsOnFailure,
WithBatchInserts,
WithChunkReading
{
     use Importable, SkipsErrors,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        $this->sub_category = $row['sub_category'];
        
         $setting=ProjectSetting::select('company_register_coin')->first();
         $coin =$setting->company_register_coin;

        $user = new User;
        $user->name = $row['name'];
        $user->email = $row['email'];
        $user->password=Hash::make($row['password']);
        $user->phone = $row['phone'];
        $user->role  = 2;
        $user->coin  = 1000;
        $user->left_coin =1000;
        $user->last_login_date=date('Y-m-d');
        $user->email_verified_flag=1;
        $user->save(); 
        
        $parent_id = DB::table('locations')->where('name', $row['township'])->first()->id;
           
          $location['parent_id']=$parent_id;
          $location['name'] =$row['township'];
          $location['created_by']=auth()->user()->id;
          $location['updated_by']=auth()->user()->id;
          $location['created_at']=date('Y-m-d h:i:s');
          $location['updated_at']=date('Y-m-d h:i:s');
          $location['is_active']='1';
           
          $location_id=  DB::table('locations')->insertGetId($location);
       
        $companyUrl = strtolower(self::makeUrl(trim($row['name']))).'-'.date('mdY').$user->id.'.htm'; 
      $company=new Company([
             'user_id'=>$user->id,
             'location_id'=>$location_id,
             'facebook'=>$row['facebook'],
             'email'=>$row['contact_email'],
             'website'=>$row['website'],
             'googleplus'=>$row['googleplus'],
             'twitter'=>$row['twitter'],
             'linkedin'=>$row['linkedin'],
             'description'=>$row['description'],
             'service'=>$row['service'],
             'vission'=>$row['vission'],
             'address'=>$row['address'],
             'phone'=>$row['contact_phone'],
             'business_opening_hours'=>$row['business_opening_hours'],
             'business_closing_hours'=>$row['business_closing_hours'],
             'business_days'=>$row['business_days'],
             'created_by'=>Auth::user()->id,
             'created_by'=>Auth::user()->id,
             'company_url'=>$companyUrl,
             'active_package_plan_id'=>1,
          ]);
         $company->save(); 
       
        //$insert['category']=$row['category'];
        
         $category_id = DB::table('categories')->where('name', $row['category'])->first()->id;
         
        $insert['category_id']=$category_id;
        $insert['company_id']=$company->id;
        $insert['created_by']=$user->id;
        $insert['updated_by']=$user->id;
       
         
        DB::table('category_company')->insert($insert);
       
        if(isset($row['sub_category'])){
         $sub_category_array = explode (",",$row['sub_category']);
          foreach($sub_category_array as $sub_category)
          {
              $sub_category_id = DB::table('categories')->where('name', $sub_category)->first(); 
               
              if(!empty($sub_category_id)){
                  $sub_category_id_id= $sub_category_id->id;
              }else{
                     $sub['name']=$sub_category;
                     $sub['parent_id']    =$category_id;
                     $sub['category_url'] = strtolower(self::makeUrl(trim($sub_category)));
                     $sub['created_by'] = Auth()->user()->id;
                     $sub['updated_by'] = Auth()->user()->id;
                     $sub['created_at']=date('Y-m-d h:i:s');
                     $sub['updated_at']=date('Y-m-d h:i:s');
                     $sub['is_active']='1';
                  $sub_cate_id=  DB::table('categories')->insertGetId($sub);
                  $sub_category_id_id= $sub_cate_id;
              }
              $insert_sub['category_id']=$sub_category_id_id;
              $insert_sub['company_id']=$company->id;
              $insert_sub['created_by']=$user->id;
              $insert_sub['updated_by']=$user->id;
                DB::table('category_company')->insert($insert_sub);
          }
        }
     
    }
    public function rules(): array
    {
         
     
        return [
            '*.name'=>'required',
            '*.email'=>'required|email|max:50|unique:users,email,NULL,id,role,2',
            '*.password' => 'required|min:6',
            '*.phone'=>'required|max:50',
            '*.township'=>'required|exists:locations,name',
            '*.city'=>'required|exists:locations,name',
            '*.facebook'=>'required',
            '*.contact_email' =>'required',
            '*.description' =>'required',
            '*.business_opening_hours' =>'required',
            '*.business_closing_hours' =>'required',
            '*.business_days'=>'required',
            '*.category'=>'required|exists:categories,name',
            '*.sub_category'=>'required',
            ];
        
    }
    
    public function batchSize(): int{
        return 1000;
    }
    public function chunkSize(): int{
        return 1000;
    } 
    private function makeUrl( $string ) 
    {
           $stripArr = array( '(', ')','{','}','[',']','','  ','_',
                           '!','-','&','<','>','<','\\','/',
                           '|','+','-',':',',','`','@','#','$',
                           '%','^','&','+','*','.','=','-','~','"','\''
           );
           $result = str_replace($stripArr,' ', $string); 
           return preg_replace('# {1,}#', '-', trim($result));
    }
     public function headingRow()
     {
        return 1;
     }
}
