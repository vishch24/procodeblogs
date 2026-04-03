<div class="card border-0 rounded-0 shadow mb-4">
    <div class="card-body p-4">
        <div class="d-flex align-items-center mb-3">
            {{-- {{ $singleBlog }} --}}
            @if ($singleBlog->user->img)
                @php
                    if ($singleBlog->user->google_id) {
                        $user_img = $singleBlog->user->img;
                    } else {
                        $user_img = asset('dashboard/assets/img/avatar/' . Auth::user()->img);
                    }
                @endphp
                <img src="{{ $user_img }}" class="img-fluid rounded-circle me-3" width="120"
                    alt="{{ $singleBlog->user->img }}">
            @else
                <img src="{{ asset('dashboard/assets/img/avatar/avatar-1.png') }}" class="img-fluid rounded-circle me-3"
                    width="120" alt="avatar-1.png">
            @endif
            <div>
                <h4>{{ $singleBlog->user->name }}</h4>
                <div class="d-flex">
                    @if ($singleBlog->user->x_twitter)
                        <a href="{{ $singleBlog->user->x_twitter }}" class="link-secondary pe-2" target="_blank"><i
                                class="bi bi-twitter-x"></i></a>
                    @endif
                    @if ($singleBlog->user->facebook)
                        <a href="{{ $singleBlog->user->facebook }}" class="link-secondary pe-2" target="_blank"><i
                                class="bi bi-facebook"></i></a>
                    @endif
                    @if ($singleBlog->user->instagram)
                        <a href="{{ $singleBlog->user->instagram }}" class="link-secondary pe-2" target="_blank"><i
                                class="bi bi-instagram"></i></a>
                    @endif
                    @if ($singleBlog->user->linkedin)
                        <a href="{{ $singleBlog->user->linkedin }}" class="link-secondary" target="_blank"><i
                                class="bi bi-linkedin"></i></a>
                    @endif
                </div>
            </div>
        </div>
        <p class="text-muted">{{ $singleBlog->user->description }}</p>
    </div>
</div>
