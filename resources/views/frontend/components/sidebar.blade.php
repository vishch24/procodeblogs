<!-- Search widget-->
@if (isset($singleBlog))
    @include('frontend.components.author-details')
@endif

<!-- Search widget-->
@include('frontend.components.search')

<!-- Recent Posts widget-->
@include('frontend.components.recent-posts')

<!-- Categories widget-->
@include('frontend.components.categories')

<!-- Tags widget-->
@include('frontend.components.tags')
