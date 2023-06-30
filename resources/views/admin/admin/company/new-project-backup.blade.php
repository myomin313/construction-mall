@extends('layouts.admin_panel')
@section('content')
  <!-- Single pro tab review Start-->
<div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">
                  <div class="row">
                     <div class="col-sm-8 col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <h3 class="panel-title">New Project</h3>
                    </div>
                     <div class="col-sm-4 col-lg-4 col-md-4 col-sm-4 col-xs-4">
                         @php
                                  
                                    $companyid = \Crypt::encrypt($id);
                                    
                                    
                                    
                                @endphp
                                 <a href="{{ url('/admin/company-project',['company_id'=>$companyid]) }}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                            Project List
                          </a>
                         <!--<a href="{{ url('admin/company-project/'.$id)}}" class="btn btn-default pull-right"><i class="fa fa-list" aria-hidden="true"></i>
                            Project List
                          </a>-->
                           
                    </div>  
                  </div>
                </h4>
              </div>
              <div class="card-body">
                <form  id="addProjectForm" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                     <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div id="error">
                        </div>
                        <input type="hidden" name="company_id" id="company_id" value="{{ $id }}">
                        <div class="form-group">
                         <label for="name">Name:</label><span class="text-error-danger"> * </span>
                          <input type="text" class="form-control" placeholder="Name" name="name" id="name">
                           <div id="nameError" class="error"></div>
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div class="form-group">
                          <label for="price">Range : </label>
                          <select class="form-control" name="range" id="range">
                            <option selected="selected" disabled="disabled">Range</option>
                            @foreach($ranges as $range):
                              <option value="<?= $range->id ?>"><?= $range->minimum_price ?> ~ <?= $range->maximum_price ?></option>
                            @endforeach
                          </select>
                       </div>
                      </div> 
                      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                        <div class="form-group">
                           <label for="Business">Business Type:</label><span class="text-error-danger"> * </span>
                           <input list="project" class="project_type form-control" id="project_list" autocomplete="off" name="project_type" placeholder="Please Enter Project Type">
                            <datalist id="project">
                             
                            </datalist> 
                             <div id="project_typeError" class="error"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                          <label for="description">Description : </label>
                          <textarea name="description"  id="detail">
                          </textarea>
                        </div> 
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12 col-md-12">
                        <label for="photo">Project Photo : </label>
                        <div class="form-group">
                           <div id="add_more_field">
                            <!-- //initially one field is set -->
                            <div class="row meta-field">
                              <div class="col-md-3">
                                <div class="form-group">
                                  <input class="form-control" id="photoname_1" name="photoname" placeholder="Photo Name" value="" type="text">
                                </div>
                              </div>
                              <div class="col-md-7">
                                <a href="#" class="add-modal btn btn-success w_200" data-no="1">
                                Upload Photo</a>
                                <div id="current_cover_photo_1"></div>
                              </div>
                              <div class="col-md-1">
                                <a href="#" class="add_more_close btn btn-danger">X</a>
                              </div>
                              <div class="col-md-1">
                                <a class="btn btn-success btn-sm" id="add_more" href="#" > <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add </a>
                              </div>
                            </div>
                          </div>
                           </div>
                          </div>
                        </div> 
                        <div class="row">
                           <div class="col-lg-12 col-md-12">
                              <div class="payment-adress">
                                 <button type="submit" id="basic_add_btn" class="btn btn-primary waves-effect waves-light">Save</button>
                               </div>
                           </div>
                        </div>
                    </form>                   
                   </div>
                 </div>
              </div>
          </div>
        </div>
        </div>

      <!--image upload-modal start-->
      <div class="modal fade bs-example-modal-md-1" tabindex="-1" role="dialog" id="addModal">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
             <form id="coverphotoForm">
               <div class="form-group">
                    <center>
                      <input type="file" id="image_file_1" name="cover_photo[]" class="image_file">
                    </center>
                    <div id="cover_photo_1" class="cover_photo"></div>
                </div> 
            </form>
             <p>
              <button  data-toggle="modal" data-target=".bs-example-modal-md" class="btn btn-primary btn-block upload-image_1" id="upload-image_1" data-dismiss="modal" aria-label="Close">Upload Image</button>
            </p>
          </div>
        </div>
      </div>
<!--image upload-modal end--> 
<script src="{{ asset('admin/js/jquery-2.1.4.min.js')}}"></script>
<script type="text/javascript">
  

  function addField(label,value)
  {
      $("#add_more_field").append('<div class="row meta-field"><div class="col-md-3"><div class="form-group"><input class="form-control" id="photoname_'+value+'" type="text" name="photoname" placeholder="Photo Name" value="'+label+'"></div></div><div class="col-md-7"><a href="#" class="add-modal btn btn-success" data-no="'+value+'">Upload Photo</a><div id="current_cover_photo_'+value+'"></div></div><div class="col-md-1"><a href="#" class="add_more_close btn btn-danger">X</a></div></div><div   data-backdrop="" class="modal fade bs-example-modal-md-'+value+'" tabindex="-1" role="dialog" id="addModal'+value+'"><div class="modal-dialog modal-md" role="document"><div class="modal-content"><div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div><form id="coverphotoForm"><div class="form-group"><center><input type="file" id="image_file_'+value+'" name="cover_photo[]" class="image_file'+value+'"></center><div id="cover_photo_'+value+'" class="cover_photo"></div></div> </form><p><button  data-toggle="modal" data-target=".bs-example-modal-md-'+value+'" class="btn btn-primary btn-block upload-image" id="upload-image_'+
        value+'" data-dismiss="modal" aria-label="Close">Upload Image</button></p></div></div></div>');
  }
  var count = 1;
  $("#add_more").click(function(){
      addField('',++count);
      $(".add_more_close").click(function(){
              $(this).parents(".meta-field").remove();
              return false;
         });
      return false;
  });
  $(document).on('click', '.add-modal', function() {
              var no = $(this).data('no');
              if(no == 1)
              {
               $('#addModal').modal('show');    
              }
              else{
                $('#addModal'+no).modal('show');
              }
              /* image crop */
              var resize = $('#cover_photo_'+no).croppie({
               enableExif: true,
               enableOrientation: true,    
               viewport: { // Default { width: 100, height: 100, type: 'square' } 
                   width: 270,
                   height: 230,
                   type: 'square' //square
               },
               boundary: {
                   width: 280,
                   height: 240
               }
             });
           $('#image_file_'+no).on('change', function () { 
             var reader = new FileReader();
               reader.onload = function (e) {
                 resize.croppie('bind',{
                   url: e.target.result
                 }).then(function(){
                   console.log('jQuery bind complete');
                 });
               }
               reader.readAsDataURL(this.files[0]);
           });
           $('#upload-image_'+no).on('click', function (ev) {
             resize.croppie('result', {
               type: 'canvas',
               size: 'viewport'
             }).then(function (img) {
               html = '<img src="' + img + '" />';
                $.ajax({
                  url: "{{route('croppie.upload-image')}}",
                  type: "POST",
                  data: {"image":img,"path":"project"},
                  dataType: 'json',
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  success: function (data) {
                      if($.isEmptyObject(data.errors)){
                        if(no >1){
                          html = '<img class="w_200 img-thumbnail current_cover_photo_'+no+'" alt="'+data.image_name+'" src="' + img + '" />';
                          $("#current_cover_photo_"+no).append(html); 
                        }
                        else{
                          html = '<img class="w_200 img-thumbnail current_cover_photo_'+no+'" alt="'+data.image_name+'" src="' + img + '" />';
                          $('#current_cover_photo_'+no).html(html); 
                        }
                      }
                      else{
                         printErrorMsg(data.errors);
                      }
                  },
                  error:function(e){
                   console.log(e)
                  }
                });
             });
           });
   });
        
          $('form#addProjectForm').on('submit',function(e){
              var photo_arr = [];
              var count = 1;
                $("[id*= current_cover_photo_]").each(function() {

                    var image=$('#current_cover_photo_' +count+' img').attr('alt');
                    var name = $('#photoname_' +count).val();
                    item = {};
                    item ["image"] = image;
                    item ["name"] = name;
                    photo_arr.push(item);
                    count++;
                });

              var photo =JSON.stringify(photo_arr);
              var name = $('#name').val();
              var company_id=$("#company_id").val();
              var range = $('#range').val();
              var project_type =  $('#project_list').val();
              var detail = $('#detail').summernote('code');
              e.preventDefault();
              $.ajax({
                     type: "post",
                     url: "{{ URL::route('admin.project.store') }}",
                     data:"name="+name+"&range="+range+"&project_type="+project_type+"&description="+detail+"&photo_arr="+photo+"&company_id="+company_id,
                     dataType: 'json',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     success:function(data)
                     {
                         if($.isEmptyObject(data.errors)){
                             
                             /*   $("#basic_add_btn").attr('disabled','disabled');
                                setTimeout(function() {
                                  $this.removeAttr('disabled');
                               }, 3000);*/
                               
                        //      var message = "Successfully created!";
                              var url = "<?php echo url('/admin/company-project',['company_id'=>$companyid],'?page='.Session::get('pageno')); ?>";
                              window.location = url;
                                /*var url = data.url;*/
                                // callbackURL(message,url);


                          /* alert('successfully created');
                           window.location=data.url;*/
                         }
                         else{
                           //  printErrorMsg(data.errors);
                           console.log(data.errors);
                            if($.isEmptyObject(data.errors.name)){ 
                                  $('#nameError').html("");
                                   $("input[name=name]").removeClass('error-messageborder');
                              }else{
                                   $('#nameError').html(data.errors.name);
                                   $("input[name=name]").addClass('error-messageborder');
                              }
                              
                               if($.isEmptyObject(data.errors.project_type)){ 
                                  $('#project_typeError').html("");
                                   $("input[name=project_type]").removeClass('error-messageborder');
                              }else{
                                   $('#project_typeError').html(data.errors.project_type);
                                   $("input[name=project_type]").addClass('error-messageborder');
                              }
                         } 
                         // window.reload();
                      },
                     error:function(e)
                     {
                       console.log(e);
                     }
                   });


                  
               });
                function printErrorMsg (msg) {
                if($(msg).length >1){
                  $.each(msg, function( key, value ) {
                   message += '<span class="alert alert-danger">'+value+'</span>';
                    $("#error").html(message);
                }); 
                }
                else{
                    message = '<span class="alert alert-danger">'+msg+'</span>';
                    $("#error").html(message);               
                  }   
            }
               $('.project_type').on('input',function(e){
                    var project  = $(this).val();
                    var dataList = $("#project");
                    var op ="";
                    e.preventDefault();
                    $.ajax({
                           type: "post",
                           url: "{{ URL::route('getProjectType') }}",
                           data:{'project':project},
                           dataType: 'json',
                           headers: {
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           },
                           success:function(data)
                           {

                              op +="<option value='0' >Choose Project Type</option>";
                             for(var i=0;i<data.length;i++)
                             {
                               op +='<option value="'+data[i].project_type_name+'">'+data[i].project_type_name+'</option>';
                             }
                             $("#project").html(op); 
                             
                            },
                           error:function(e)
                           {
                              console.log(e);
                           }
                         });
               });
             
</script>
@endsection