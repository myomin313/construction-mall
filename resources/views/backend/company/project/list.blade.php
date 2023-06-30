@extends('backend.layouts.company_panel')
@section('title','Project List')
@section('content')

      <div class="col-md-9 col-sm-12">
         <li>
            <div class="blog-inter">
             <div class="row">
              <div class="col-md-12">
              <form class="form-inline" action="{{route('project.index')}}" method="post">
                {{csrf_field()}}
                    <div class="form-group col-md-8 col-xs-12 padding5">
                      <label class="sr-only">Project Name</label>
                        <input  type="text" class="form-control w_100 search_name" name="name" value="{{isset($name)?$name:''}}" placeholder="Enter Project Name">
                    </div>
                    <div class="form-group col-md-2 col-xs-6 padding5">
                      <button type="submit" class="btn btn-standard w_100"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                    </div>
                    <div class="form-group col-md-2 col-xs-6 padding5">
                       <a class="btn btn-standard w_100" onclick="reset()"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</a>
                    </div>
              </form>
            </div>
            </div>
            </div>
          </li>
           <li>
            <div class="row our_service">
              <div class="col-md-8 col-sm-8 col-xs-4">
                 <div class="post-tittle">
                      <h4><a href="#">Our Projects</a></h4>
                  </div>
              </div>
              <div class="col-md-4 col-sm-8 col-xs-8 ">
                <!-- <a type="button" href="{{route('project.create')}}" class="btn pull-right btn-standard editeducationBtn "><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>-->
                <!--<a type="button" class="btn pull-right btn-standard deleteitemall mr-10"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a> -->

                <!--start-->
                  <a type="button" href="{{route('project.create')}}" class="pull-right editeducationBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                <a type="button" class="pull-right  deleteitemall mr-10"> <i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                <!--end-->

              </div>
            </div>
          </li>
          <li>
             @if(count($company_projects) > 0 )
            <div class="row our_services">
              @php $count=1; @endphp
              @foreach($company_projects as $company_project)
               @php
                                    $id = $company_project->id;
                                    $id = \Crypt::encrypt($id);
                                    $page = $company_projects->currentPage();
                                    $page =\Crypt::encrypt($page);
                                @endphp
              <div class="col-md-4 col-sm-6">
                <div class="service_list">
                     <a href="{{route('project.show',['id'=>$id,'page'=>$page])}}" >
                  <img src="{{ asset('storage/project/'.$company_project->photo) }}" alt="portfolio" class="img-responsive">
                   </a>
                  <h5><input name="company_projectid" type="checkbox" data-id="{{ $company_project->id }}" value="{{ $company_project->id }}"> <?= $company_project->project_name ?></h5>
                </div>
              </div>
               @php $count +=1 @endphp
               @endforeach
            </div>
             <div class="pagination-area">
              <ul class="pagination">
                {{ $company_projects->links() }}
              </ul>
            </div>
            @else
             <div class="blog-inter"  style="min-height:350px">
                  @include('element.404')
              </div>
            @endif
          </li>

      </div>
@endsection
@section('script')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script  type="text/javascript">
           var page ='<?php echo $company_projects->currentPage() ?>';
           $(document).ready(function () {
        $('#table #checkall').on('click', function(e) {
         if($(this).is(':checked',true))
         {
            $("#table .checkbox").prop('checked', true);
         } else {
            $("#table .checkbox").prop('checked',false);
         }
        });

         $('#table .checkbox').on('click',function(){
            if($('#table .checkbox:checked').length == $('.checkbox').length){
                $('#table #checkall').prop('checked',true);

            }else{
                $('#table #checkall').prop('checked',false);
            }
         });
         $('.deleteitemall').on('click',function(){
                 /*alert('hi');*/
            var company_projectids = [];
                  $("input:checkbox[name=company_projectid]:checked").each(function(){
                      company_projectids.push($(this).val());
                       });
                       if (company_projectids.length == 0) {
                            alert("please checked at least one project that you want to delete");
                       }else{
                     var conf = confirm('Are you sure want to delete?');
                        if(conf == true){
                            $.ajax({
                            url: "{{ URL::route('company.project.deleteall') }}",
                            type: 'POST',
                            data: {'ids' : company_projectids},
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data){
                                 //var message = data.success;
                                var url = window.location.href;
                                window.location=url;
                                // callbackURL(message,url);
                            },
                            error:function(e)
                            {
                                console.log(e);
                            }
                            });
                        }
                      }
               });
         });
         </script>
 @endsection
