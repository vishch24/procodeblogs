<div class="comments{{ sizeof($comment->replies) ? ' border-start' : '' }} mb-4">
    <!-- Single comment-->
    <div class="d-flex mb-4">
        <div class="flex-grow-0 flex-shrink-0">
            @if ($comment->if_author == 'yes')
                @if ($comment->user->img)
                    @if ($comment->user->google_id)
                        <img class="img-fluid" src="{{ $comment->user->img }}" width="50"
                            alt="{{ $comment->user->img }}" />
                    @endif
                    <img class="img-fluid" src="{{ asset('dashboard/assets/img/avatar/' . $comment->user->img) }}"
                        width="50" alt="{{ $comment->user->img }}" />
                @endif
            @else
                <img class="img-fluid" src="{{ asset('dashboard/assets/img/avatar/avatar-1.png') }}" width="50"
                    alt="avatar-1.png" />
            @endif
        </div>
        <div class="flex-grow-1 ms-3 w-100">
            <div class="clearfix">
                <div class="float-start">
                    <h5 class="fw-bold">
                        {{ $comment->name }}
                        @if ($comment->if_author == 'yes')
                            <span class="badge text-bg-primary">OP</span>
                        @endif
                    </h5>
                </div>
                <button type="button" onclick="sendReply({{ $comment->id }}, '{{ 'replyForm_' . $comment->id }}')"
                    class="btn btn-sm btn-outline-primary float-end"><span class="d-none d-lg-inline">Reply </span><i
                        class="bi bi-reply"></i></button>
            </div>
            <span class="d-block mb-4">{{ $comment->description }}</span>

            @include('frontend.components.reply-form')
        </div>
    </div>

    <!-- Recursive Replies -->
    @if ($comment->replies->count() > 0)
        <div class="replies ms-3 ms-lg-4">
            @foreach ($comment->replies as $reply)
                @include('frontend.components.comments', ['comment' => $reply])
            @endforeach
        </div>
    @endif
</div>
