 <a href="#" class="list-group-item">
    <div class="row">
    	<div class="col-md-1 col-sm-1">
    		<input type="checkbox" name="company_id[]" value="{{$datas['id']}}" id="company_id{{$datas['id']}}" class="company_id">
    	</div>
      <div class="col-md-2 col-sm-4 col-xs-3 nopadding">
               @if($datas['user']['logo'] != Null && $datas['user']['logo'] !='undefined')
                   <img src="{{ asset('storage/company_logo/'.$datas['user']['logo']) }}" alt="{{$datas['user']['name']}}" class="img-responsive">
               @else
                  @php
                      $category_array =Session::get('category_array');
                      $category_id =  $category_array['parent']['id'];
                  @endphp
                  @if($category_id == '1')
                    <img src="{{ asset('storage/company_logo/'.$project_setting['service_default_logo']) }}" alt="Service Default Logo" class="img-responsive">
                  @elseif($category_id == '2')
                     <img src="{{ asset('storage/company_logo/'.$project_setting['supplier_default_logo']) }}" alt="Supplier Default Logo" class="img-responsive">
                  @else
                    <img src="{{ asset('storage/company_logo/'.$project_setting['reno_default_logo']) }}" alt="Reno Default Logo" class="img-responsive">
                  @endif
               @endif
                           
      </div>
      <div class="col-md-9 col-sm-7 col-xs-9 nopadding">
         <h2> <?= $datas['user']['name'] ?></h2>
         <span><?php $count =1; $category="";
                 if(!empty($datas['child_categories']))
                 {
                 	foreach($datas['child_categories'] as $child_category){
                        if(sizeof($datas['child_categories'])==$count)
                            $category .= $child_category['name'];
                        else
                            $category .=$child_category['name'].", ";
                    $count++;
                   }
                   echo (strlen($category) > 80)?substr($category, 0,80)."...":$category;
                  }
                ?></span>
      </div>
    </div>
  </a>