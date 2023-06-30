@extends('layouts.admin_panel')
@section('content')
         <!-- Static Table Start -->
<div class="data-table-are">
    <div class="container-fluid">
        @include('admin.element.breadcrumb')
        <div class="card">
            <div class="card-body search_form">
                               
                                @php 
                                     if(isset($name))
                          $name = $name;
                          else
                          $name ="";
                     
                           @endphp
                                     <!--start-->
                                         <form class="form-inline" action="{{ route('currency-unit.index') }}" method="get">
                                          {{csrf_field()}}
                                           <div class="form-group col-md-10 col-sm-6 col-xs-12">
                                              <label>Currency</label>
                                              <input value="{{$name}}" type="text" class="form-control" name="name" placeholder="Currency">
                                           </div>
                                           <div class="col-md-2 col-sm-6 col-xs-12 pt-2em">
                                               <button type="submit" class="btn btn-success">Search</button>
                                               <a  class="btn btn-reset">Reset</a>
                                           </div>
                                          
                                        </form>
                                    <!--end-->
                             </div>
                           </div>
      <div class="row"> 
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title"> Currency Unit List</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-xs-4">
                        <a  type="button" href="{{ route('currency-unit.create') }}"  class="btn btn-default pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Create New</a>
                     </div>
                  </div>
                </h4>
              </div>
              <div class="card-body">           
                        @include('admin.element.success-message')
                                    <div class="table-responsive">                
                                    <table id="table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Currency</th>
                                                <th>Status</th>
                                                <th> Creator</th>
                                                <th> Updator</th>
                                                <th> Created Date</th>
                                                <th> Updated Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($currency_units as $currency_unit)
                                            <tr>
                                                
                                                 <td>{{ ($currency_units->currentPage()-1) * $currency_units->perPage() + $loop->index + 1 }}</td>
                                                <td>
                                                    @php
                                                    $id = $currency_unit->id;
                                                    $id = \Crypt::encrypt($id);
                                                    $pageno = $currency_units->currentPage();
                                                    $pageno =\Crypt::encrypt($pageno);
                                                @endphp <a href="{{ url
                                                 ('currency-unit/edit/'.$id.'/'.$pageno)}}" > <?=
                                                 $currency_unit->currency_name ?>
                                                 (<?= $currency_unit->unit ?>)</a></td>
                                                  <td>
                                                  <select id="{{$currency_unit->id}}" data-control="status"
                                                 name="is_active" class="form-control
                                                 status_change"> 
                                                 <option value="1" <?=
                                                 ($currency_unit->is_active==1)?"selected":""?>>Active</option>
                                                 <option value="0" <?=
                                                 ($currency_unit->is_active==0)?"selected":""?>>Inactive</option>
                                                 </select>
                                                 </td>
                                                  <td><?=
                                                 $currency_unit->creater->name ?></td> <td><?=
                                                 $currency_unit->updater->name ?></td> <td><?=
                                                 $currency_unit->created_at ?></td> <td><?=
                                                 $currency_unit->updated_at ?></td>
                                               
                                            </tr>
                                            @php $count++; @endphp
                                          @endforeach
                                           
                                        </tbody>
                                    </table>
                                    {{ $currency_units->appends($data)->links()}}
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
             
        <script type="text/javascript">
          $(document).ready(function(){
                 $('#table').on('change','.status_change',function(){ 
                        var is_active = $(this).val();
                        console.log(is_active);
                        var id = $(this).attr('id'); 
                            $.ajax({ 
                            url: "{{ URL::route('admin.currency-unit.update-status') }}",
                            type: 'POST',
                            data: {'id' : id,"is_active":is_active},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){ 
                                $("[data-control='status']").prop('disabled', true);
                                window.location.reload();
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                        
                 });
             });
        </script>           
@endsection