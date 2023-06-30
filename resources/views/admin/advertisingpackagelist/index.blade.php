@extends('layouts.admin_panel')
@section('content')
 
         <!-- Static Table Start -->
            <div class="container-fluid">
                @include('admin.element.breadcrumb')
                <div class="card">
                     @include('admin.element.success-message')
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">Advertising Package Plan List</h3>
                    </div>
                        
                  </div>
                </h4>
              </div>
              <div class="card-body table-responsive">

               
                                    
                                    <table id="table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                 <th> Plan Name</th>
                                                 <th> Price</th>
                                                 <th> Unit</th>
                                                <th> Periods</th>
                                                <th> Creator</th>
                                                <th> Updator</th>
                                                <th> Created At</th>
                                                <th> Updated At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($packages as $package)
                                            <tr>
                                                <td>{{ ($packages->currentPage()-1) * $packages->perPage() + $loop->index + 1 }}</td>
                                                
                                                 <td>
                                                     @php
                                                        $id = $package->id;
                                                        $id = \Crypt::encrypt($id);
                                                       
                                                    @endphp
                                                     
                                                     <a href="{{route('advertisingpackagelist.edit',$id)}}">
                                                    <?= $package->plan_name ?></a> </td>
                                                    <td><?= number_format($package->price) ?></td>
                                                    <td><?= $package->unit ?></td>
                                                  <td><?= $package->periods ?></td>
                                                  <td><?= $package->creator ?></td>
                                                  <td><?= $package->updator ?></td>
                                                  <td><?= $package->created_at ?></td>
                                                  <td><?= $package->updated_at ?></td>
                                                <!--<td>
                                                    <a href="{{route('advertisingpackagelist.edit',['id'=>$package->id])}}" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>                    
                                                </td>-->
                                            </tr>
                                            @php $count +=1 @endphp
                                          @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
        <!-- Static Table End -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
           <script  type="text/javascript">
                  var page ='<?php echo $packages->currentPage() ?>';
           </script>
@endsection