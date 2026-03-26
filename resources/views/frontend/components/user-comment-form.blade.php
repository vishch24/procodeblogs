<div class="card border-0 rounded-0 shadow">
    <div class="card-body p-5">
        @if (!request()->cookie('guest_name') && !request()->cookie('guest_email'))
            <h4>Post Comment</h4>
            <p>Your email address will not be published. Required fields are marked <span class="text-danger">*</span>
            </p>
        @endif

        <form action="{{ route('comments.store', [$singleBlog->id, $singleBlog->slug]) }}" method="POST"
            class="row gy-4 mb-4">
            @csrf
            <input type="hidden" name="parent_id" value="">

            @if (request()->cookie('guest_name') && request()->cookie('guest_email'))
                <input type="hidden" name="name" value="{{ old('name', request()->cookie('guest_name')) }}"
                    required />
                <input type="hidden" name="email" value="{{ old('email', request()->cookie('guest_email')) }}"
                    required />
                <div class="col-12">
                    <div class="">
                        <span class="h4">Comment as </span>
                        <img src="{{ asset('dashboard/assets/img/avatar/avatar-1.png') }}"
                            class="img-fluid rounded-circle align-top" width="30" alt="avatar-1.png" />
                        <span class="h5 fw-bold">{{ request()->cookie('guest_name') }}</span>
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
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control h-auto shadow-sm" rows="4" id="floatMsg" name="description"
                        placeholder="Enter Message" required>{{ old('description') }}</textarea>
                    <label for="floatMsg">Enter Message<span class="text-danger">*</span></label>
                </div>
            </div>
            <div class="col-12">
                <input type="submit" class="btn btn-success px-4 py-2 border-0 rounded-0 shadow-sm" value="Submit" />
            </div>
        </form>
    </div>
</div>
