
<div class="modal fade bs-example-modal-md-5" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md-5">
                <div class="modal-content">
                    <div class="modal-header">
                      <!--   <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button> -->
                        <div class="top_links"><a href="#" data-dismiss="modal" aria-label="Close">Close (X)</a></div>
                        <h2 class="modal-title text-center" id="image-gallery-title"></h2>
                    </div>
                    <div class="modal-body text-center">
                        <img id="image-gallery-image" class="img-fluid" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-standard float-left" id="show-previous-image"><img src="{{ asset('images/icon/left.png')}}" class="img-fluid">
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-standard float-right"><img src="{{ asset('images/icon/right.png') }}" class="img-fluid">
                        </button>
                    </div>
                </div>
            </div>
<!-- gallery modal end -->