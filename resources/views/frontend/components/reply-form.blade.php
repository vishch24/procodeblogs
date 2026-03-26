<!-- Reply Form-->
<div id="replyForm_{{ $comment->id }}" class="card border-0 rounded-0" style="display: none">
    <div class="card-body p-0">
        <form action="{{ route('comments.store', [$singleBlog->id, $singleBlog->slug]) }}" method="POST"
            class="row gy-4 mb-4">
            @csrf
            <input type="hidden" name="parent_id" id="parent_id" value="">
            @if (Route::has('login'))
                @auth
                    <input type="hidden" name="name" value="{{ Auth::user()->name }}" required />
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}" required />
                    <div class="col-12">
                        <div class="">
                            @php
                                if ($singleBlog->user->img) {
                                    if ($singleBlog->user->google_id) {
                                        $img = $singleBlog->user->img;
                                    } else {
                                        $img = asset('dashboard/assets/img/avatar/' . $singleBlog->user->img);
                                    }
                                } else {
                                    $img = asset('dashboard/assets/img/avatar/avatar-1.png');
                                }
                            @endphp
                            <span class="h6">Comment as </span>
                            <img src="{{ $img }}"
                                class="img-fluid rounded-circle align-top" width="20" alt="{{ $img }}" />
                            <span class="small">{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                @else
                    @if (request()->cookie('guest_name') && request()->cookie('guest_email'))
                        <input type="hidden" name="name" value="{{ old('name', request()->cookie('guest_name')) }}"
                            required />
                        <input type="hidden" name="email" value="{{ old('email', request()->cookie('guest_email')) }}"
                            required />
                        <div class="col-12">
                            <div class="">
                                <span class="fs-6">Comment as </span>
                                <img src="{{ asset('dashboard/assets/img/avatar/avatar-1.png') }}"
                                    class="img-fluid rounded-circle align-top" width="25" alt="avatar-1.png" />
                                <span class="fw-bold">{{ request()->cookie('guest_name') }}</span>
                            </div>
                        </div>
                    @else
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control shadow-sm" id="floatingName" name="name"
                                    placeholder="Enter Name" required />
                                <label for="floatingName">Enter Name<span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control shadow-sm" id="floatingEmail" name="email"
                                    placeholder="Enter Email" required />
                                <label for="floatingEmail">Enter Email<span class="text-danger">*</span></label>
                            </div>
                        </div>
                    @endif
                @endauth
            @endif
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control h-auto shadow-sm" rows="4" id="floatMsg" name="description"
                        placeholder="Enter Message" required></textarea>
                    <label for="floatMsg">Enter Message<span class="text-danger">*</span></label>
                </div>
            </div>
            <div class="col-12">
                <input type="submit" class="btn btn-success px-4 py-2 border-0 rounded-0 shadow-sm" value="Submit" />
            </div>
        </form>
    </div>
</div>
