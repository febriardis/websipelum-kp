@extends('layouts_views.layout_user')

@section('content')
  <!-- content -->
  <div class="content" style="margin-top: 10px">
    <!-- list-content -->
    <div class="list-content-info">
      <h5 style="margin: 8px;float: left;">Pemilihan - </h5>
      <p style="margin: 8px;float: right;">{{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y')  }}</p>
    <div class="clear"></div>
    </div>
    <!-- /list-content -->

    <!-- content-vote -->
  	<div class="content-vote">
  		@for($i=0; $i<=3; $i++)
      <!-- panel kandidat -->
  		<div class="panel-kandidat bg-light">
  			<div class="foto-kandidat"">
  				<img src="assets/images/placeholder.jpg" style="width: 100%; height: 230px;" alt="">
  			</div>     
        <div class="caption text-center" style="margin: 15px 0px 0px 0px;">
          <h6 style="margin: 0px">Febri Ardi Saputra</h6>
          <small class="text-info"><i class="fa fa-thumbs-o-up"></i> 5 Votes</small>
          <div class="button-vote">
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_view"><i class="fa fa-eye"></i> View</button>
            <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-o-up"></i> Vote</button>
            <div class="clear"></div>
          </div>
        </div>
  		</div>
      <!-- panel kandidat -->

      <!-- modal view kandidat-->
      <div class="modal" id="modal_view">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Profil Kandidat</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>      
            <!-- Modal body -->
            <div class="modal-body">
              <div class="modal-foto">
                <img src="assets/images/placeholder.jpg" style="width: 125px; float: left; height: 140px;" alt="">
                <div style="float: left;margin: 20px">
                  <h6 style="margin: 0px">Febri Ardi Saputra</h6>
                  <small class="text-info"><i class="fa fa-thumbs-o-up"></i> 5 Votes</small> 
                </div>
                <div class="clear"></div>
              </div> 

              <div class="caption fontArial" style="margin-top: 15px;">          
                <div>
                  <h6><b>Visi</b></h6> 
                  <p>&quot;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua.&quot;</p>
                </div>
                <div>
                  <h6><b>Misi</b></h6>
                  <ul>
                    <li>Ut enim ad minim veniam</li>
                    <li>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</li>
                    <li>uis aute irure dolor in reprehenderit in </li>
                    <li>voluptate velit esse cillum dolore eu fugiat nulla pariatur. </li>
                  </ul>
                </div>
              </div>
            </div>   
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-o-up"></i> Vote</button>
            </div>    
          </div>
        </div>
      </div>
      <!-- /modal view kandidat -->

  		@endfor
  		<div class="clear"></div>
  	</div>
    <!-- /content-vote -->
  </div>
<!-- /content -->
@endsection
