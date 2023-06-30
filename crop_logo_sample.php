														$logo_crop = $('#logo_preview').croppie({
															    enableExif: true,
															    viewport: {
															      width:200,
															      height:200,
															      type:'square' //circle
															    },
															    boundary:{
															      width:300,
															      height:300
															    }
															  });

															  $('#upload_logo').on('change', function(){
															    var reader = new FileReader();
															    reader.onload = function (event) {
															      $logo_crop.croppie('bind', {
															        url: event.target.result
															      }).then(function(){
															        console.log('jQuery bind complete');
															      });
															    }
															    reader.readAsDataURL(this.files[0]);
															    $('#uploadLogoModal').modal('show');
															  });

															  $('.crop_logo').click(function(event){
															    $logo_crop.croppie('result', {
															      type: 'canvas',
															      size: 'viewport'
															    }).then(function(response){
															    	var image_url="";
															      $.ajax({
															      		type: "post",
															        url:"{{ URL :: route('ajaxaddphoto')}}",   																			
															        data:{"image": response
																											},
																								 headers: {
																        'X-CSRF-TOKEN': '<?php echo csrf_token() ?>'
																        },
															        success:function(data)
															        {
															        	 image_url = '<?php echo asset('images/upload')?>'+"/"+data
															        	 data = "<img src='"+image_url+"' class='img-thumbnail'>";
															        	 $('#uploadLogoModal').modal('hide');
															          $('#uploaded_logo').html(data);
															        },
															        error:function(e)
															        {
															        	alert(e);
															        }
															      });
															    })
															  });
															});  