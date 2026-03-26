<div class="card border-0 rounded-0 shadow">
    <div class="card-body p-4">
        <div class="mb-3">
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
            <span class="h4">Comment as </span>
            <img src="{{ $img }}" class="img-fluid rounded-circle align-top"
                width="30" alt="{{ $img }}" />
            <span class="small">{{ Auth::user()->name }}</span>
        </div>
        <form action="{{ route('comments.store', [$singleBlog->id, $singleBlog->slug]) }}" method="POST" class="mb-4">
            @csrf
            <input type="hidden" name="parent_id" value="">
            <input type="hidden" name="name" value="{{ Auth::user()->name }}" required />
            <input type="hidden" name="email" value="{{ Auth::user()->email }}" required />
            <div class="form-floating mb-3">
                <textarea class="form-control h-auto shadow-sm" rows="4" id="floatMsg" name="description"
                    placeholder="Enter Message" required></textarea>
                <label for="floatMsg">Enter Message<span class="text-danger">*</span></label>
            </div>
            <input type="submit" class="btn btn-success px-4 py-2 border-0 rounded-0 shadow-sm" value="Submit" />
        </form>
    </div>
</div>
