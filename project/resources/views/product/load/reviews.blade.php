<div>
    <h3>Reviews {{ count($productt->ratings) }}</h3>
  </div>
@foreach($productt->ratings as $review)
<div class="review-item d-flex">
    <img class="img-fluid rounded-circle me-3 img-60" src="{{ $review->user->photo ? asset('assets/uploads/images/users/'.$review->user->photo):asset('assets/uploads/noimage.png') }}" alt="">
    <div class="d-flex justify-content-between">

        <h6 class="username-1 font-info mr-2">{{ $review->user->username }} </h6>
        <div class="rating ml-3">
            <i class="fa {{ (App\Models\Rating::rating($productt->id) >= 1) ? ' fa-star' : 'fa-star-o'}}"></i>
            <i class="fa {{ (App\Models\Rating::rating($productt->id) >= 2) ? ' fa-star' : 'fa-star-o'}}"></i>
            <i class="fa {{ (App\Models\Rating::rating($productt->id) >= 3) ? ' fa-star' : 'fa-star-o'}}"></i>
            <i class="fa {{ (App\Models\Rating::rating($productt->id) >= 4) ? ' fa-star' : 'fa-star-o'}}"></i>
            <i class="fa {{ (App\Models\Rating::rating($productt->id) >= 5) ? ' fa-star' : 'fa-star-o'}}"></i>
           
          </div> 
    </div>
    
</div>
<p class="review-text ml-2">{{ $review->review }}</p>
<p class="date font-dark">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $review->review_date)->diffForHumans()}}</p>


  @endforeach