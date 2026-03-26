 <!-- Reply comments-->
 @foreach ($comment->replies as $reply)
 <div class="child-comments {{ sizeof($comment->replies) ? 'zborder-start' : '' }} ms-3 ms-lg-4">
     <!-- Child comment 1-->
     <div class="d-flex mb-4">
         <div class="flex-grow-0 flex-shrink-0">
             @if ($reply->if_author == 'yes')
                 <img class="img-fluid"
                     src="{{ asset('dashboard/assets/img/avatar/' . $reply->user->img) }}" width="50"
                     alt="{{ $reply->user->img }}" />
             @else
                 <img class="img-fluid" src="{{ asset('dashboard/assets/img/avatar/avatar-1.png') }}"
                     width="50" alt="avatar-1.png" />
             @endif
         </div>
         <div class="flex-grow-1 ms-3 w-100">
             <div class="clearfix">
                 <div class="float-start">
                     <h5 class="fw-bold">
                         {{ $reply->name }}
                         @if ($reply->if_author == 'yes')
                             <span class="badge text-bg-primary ms-3">Author</span>
                         @endif
                     </h5>
                 </div>
                 <button type="button"
                     onclick="sendReply({{ $reply->id }}, '{{ 'replyForm_' . $reply->id }}')"
                     class="btn btn-sm btn-outline-primary float-end">Reply <i
                         class="bi bi-reply"></i></button>
             </div>
             <span>{{ $reply->description }}</span>

             <!-- Reply Form-->
             <div id="replyForm_{{ $reply->id }}" class="card border-0 rounded-0 mt-2"
                 style="display: none">
                 <div class="card-body">
                     <form action="{{ route('comments.store', [$blog->id, $blog->slug]) }}" method="POST"
                         class="row gy-4 mb-4">
                         @csrf
                         <input type="text" name="parent_id" id="parent_id" value="">
                         @if (Route::has('login'))
                             @auth
                                 <input type="hidden" name="name" value="{{ Auth::user()->name }}"
                                     required />
                                 <input type="hidden" name="email" value="{{ Auth::user()->email }}"
                                     required />
                             @else
                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                     <div class="form-floating">
                                         <input type="text" class="form-control shadow-sm"
                                             id="floatingName" name="name" placeholder="Enter Name"
                                             required />
                                         <label for="floatingName">Enter Name<span
                                                 class="text-danger">*</span></label>
                                     </div>
                                 </div>
                                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                                     <div class="form-floating">
                                         <input type="email" class="form-control shadow-sm"
                                             id="floatingEmail" name="email" placeholder="Enter Email"
                                             required />
                                         <label for="floatingEmail">Enter Email<span
                                                 class="text-danger">*</span></label>
                                     </div>
                                 </div>
                             @endauth
                         @endif
                         <div class="col-12">
                             <div class="form-floating">
                                 <textarea class="form-control h-auto shadow-sm" rows="4" id="floatMsg" name="description"
                                     placeholder="Enter Message" required></textarea>
                                 <label for="floatMsg">Enter Message<span
                                         class="text-danger">*</span></label>
                             </div>
                         </div>
                         <div class="col-12">
                             <input type="submit"
                                 class="btn btn-success px-4 py-2 border-0 rounded-0 shadow-sm"
                                 value="Submit" />
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
@endforeach