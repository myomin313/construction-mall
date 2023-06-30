@extends('backend.layouts.company_panel')
@section('title','Company Package History')
@section('content')
                    <div class="col-md-9 col-sm-12">

                        <li>
                            @if(count($company_package_plans) > 0 )
                                <div class="blog-inter">
                                    <table class="table table-stripe">
                                        <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="20%">Package Plan</th>
                                            <th width="20%"> Price</th>
                                            <th width="10%">Status</th>
                                            <th width="15%">Approve Status</th>
                                            <th width="15%">Start Date</th>
                                            <th width="15%">End Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $count=1;@endphp
                                        @foreach($company_package_plans as $company_package)
                                            <tr>
                                                <td>{{ $count }} </td>

                                                <td><?= $company_package->packageplan_name ?></td>
                                                <td>{{number_format($company_package->price)}} {{$company_package->unit}}</td>
                                                <td>
                                                    <!--<?= ($company_package->is_active =='1')?'<span class="badge" style="background:green">Active</span>':'<span class="badge" style="background:red">Unactive</span>' ?>-->
                                                    
                                                     <?php 
                                                 if($company_package->is_active== '1' && $company_package->end_date > 
                                                 date('Y-m-d')){
                                               
                                                 echo '<span class="badge" style="background:green">Active</span>';
                                                 
                                                 }else if($company_package->is_active== '1' && $company_package->end_date < date('Y-m-d')){
                                                     
                                                      echo '<span class="badge" style="background:red">Expired</span>';
                                                      
                                                 }else if($company_package->is_active== '0'){
                                                     
                                                   echo '<span class="badge" style="background:black">Inactive</span>'; 
                                                   
                                                 }
                                                  ?>
                                                
                                                
                                                </td>
                                                <td><?= $company_package->approve ?></td>
                                                <td><?= $company_package->start_date ?></td>
                                                <td><?= $company_package->end_date ?></td>
                                            </tr>
                                            @php $count++; @endphp
                                        @endforeach
                                        <!--<tr> -->
                                        <!--  <td>2</td> -->
                                        <!--  <td>10000</td> -->
                                        <!--  <td>200000</td> -->
                                        <!--  <td>approved</td> -->
                                        <!--  <td>2020-10-20 18:40:49</td> -->
                                        <!--</tr>-->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="pagination-area">
                                    <ul class="pagination">
                                        {{ $company_package_plans->links() }}
                                    </ul>
                                </div>
                            @else
                                <div class="blog-inter" style="min-height:350px">
                                    @include('element.404')
                                </div>
                            @endif
                        </li>

                    </div>
@endsection




