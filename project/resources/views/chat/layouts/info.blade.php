{{-- user info and avatar --}}
<div class="avatar av-l chatify-d-flex"></div>
<p class="info-name">{{ config('chat.name') }}</p>

<div class="user-content  text-center">
    
    <!-- <hr> -->
    <div class="follow text-center">
      <div class="row">
        <div class="col border-right"><span>Following</span>
          <div class="following-num"></div>
        </div>
        <div class="col"><span>Follower</span>
          <div class="followers-num"></div>
        </div>
      </div>
    </div>
    <hr>
    
    <div class="text-left mt-5">
      <div>
        <div class="d-flex justify-content-between">
          <h6 class="text-bold"> <strong>Status</strong> </h6>
          <p class="text-danger status ">Active</p>
          
        </div>
        <div class="d-block ">
          <h6 style="text-align: justify;" class="text-bold text-left"> <strong>About</strong> </h6>
          <p class="user-about " style="text-align: justify;"></p>
          
        </div>
      </div>
    </div>
  </div>
{{-- <p class="">{{ Auth::user()->username }}</p> --}}
<div class="messenger-infoView-btns">
    {{-- <a href="#" class="default"><i class="fas fa-camera"></i> default</a> --}}
    <a href="#" class="danger delete-conversation"><i class="fas fa-trash-alt"></i> Delete Conversation</a>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title">shared photos</p>
    <div class="shared-photos-list"></div>
</div>
