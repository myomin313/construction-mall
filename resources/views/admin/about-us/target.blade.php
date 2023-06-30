@extends('layouts.admin_panel')
@section('content')
         <!-- Static Table Start -->
    <div class="data-table-area  mg-t-10">
            <div class="container-fluid">
                <!-- <div class="row">
                    <div class="col-lg-offset-4 col-md-offset-4 col-lg-4 col-md-4 col-sm-offset-2 col-sm-4 col-xs-12 company_profile">
                        <h2 class="center">S List</h2>  
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-lg-offest-8 col-md-offset-8 col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <ol class="breadcrumb pull-right">
                          <li><a href="#">Home</a></li>
                          <li class="#"><a> Create </a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                            <option value="">Export Basic</option>
                                            <option value="all">Export All</option>
                                            <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="no">No</th>
                                                <th data-field="image" data-editable="true">Image</th>
                                                <th data-field="title" data-editable="true"> Title</th>
                                                <th data-field="description" data-editable="true"> Description</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $count=1; @endphp
                                            @foreach($targets as $target):
                                            <tr>
                                                <td></td>
                                               <td>{{ ($targets->currentPage()-1) * $targets->perPage() + $loop->index + 1 }}</td>
                                                <td><img src="{{ asset('storage/setting/'.$target->image) }}" alt="" title=""></td>
                                                <td><?= $target->title ?></td>
                                                <td><?= $target->description ?></td>
                                                <td>
                                                    <a href="{{ route('about-us.target.edit',['id'=>$target->id])}}" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                                
                                            </tr>
                                            @php $count +=1 @endphp
                                          @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
           <script  type="text/javascript">
                  var page ='<?php echo $targets->currentPage() ?>';
           </script>
       
@endsection