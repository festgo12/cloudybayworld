<div class="row">
   <!-- user profile first-style start-->
   <div class="col-sm-12 box-col-12">
      <div class="card hovercard text-center" >
         <div class="info market-tabs p-0" style="margin:10px;">
            <div class="row">
               <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="ttl-info text-start">
                           <center>
                              <h6><a href="market/{{ $shop->slug }}">About</a></h6>
                           </center>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="ttl-info text-start">
                           <center>
                              <h6><a href="market/feeds/{{ $shop->slug }}">Feeds</a></h6>
                           </center>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                  <div class="row">
                  </div>
               </div>
               <div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="ttl-info text-start">
                           <center>
                              <h6><a href="{{ route('market.product', $shop->slug ) }}">Products</a></h6>
                           </center>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="ttl-info text-start">
                           <center>
                              <h6><a href="{{ route('chat.user', $shop->user_id) }}">Chat</a></h6>
                           </center>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="cardheader socialheader"></div>
         <div class="user-image">
            <div class="avatar"><img alt="" src="assets/uploads/{{ $shop->attachments['path'] }}"></div>
            <div class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div>
         </div>
         <div class="info market-tabs p-0">
            <ul class="nav nav-tabs border-tab tabs-scoial" id="top-tab" role="tablist">
               <li class="nav-item"><a class="nav-link active" id="top-Personal" data-bs-toggle="tab"
                  href="#about" role="tab" aria-controls="Personal" aria-selected="true">Business Info</a></li>
               <li class="nav-item"><a class="nav-link" id="top-skill" data-bs-toggle="tab" href="#business"
                  role="tab" aria-controls="skill" aria-selected="false">About Founder</a></li>
               <li class="nav-item">
                  <div class="user-designation"></div>
                  <div class="title"><a target="_blank" href="#">{{ $shop->shopName }}</a></div>
                  <div class="rating"><span><i class="fa fa-star font-warning"></i><i
                     class="fa fa-star font-warning"></i><i class="fa fa-star font-warning"></i><i
                     class="fa fa-star font-warning"></i><i
                     class="fa fa-star font-warning-o"></i></span><span>(206)</span></div>
                  <div class="price d-flex">
                     <div class="text-muted me-2" style="text-align:center;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red"><b>Closed </b></span>
                        Opened {{ $shop->startTime }}am
                     </div>
                  </div>
               </li>
               <li class="nav-item"><a class="nav-link" id="top-photos" data-bs-toggle="tab" href="#photos"
                  role="tab" aria-controls="photos" aria-selected="false">Photos</a></li>
               <li class="nav-item"><a class="nav-link" id="top-Videos" data-bs-toggle="tab" href="#Videos"
                  role="tab" aria-controls="Videos" aria-selected="false">Videos</a></li>
            </ul>
         </div>
      </div>
   </div>
</div>
