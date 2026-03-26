@extends('author.layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div id="page-content">
        <div class="card border-0 rounded-0">
            <div class="card-body py-2">
                <h3>{{ __('Profile') }}</h3>
            </div>
        </div>
        <div class="px-2 py-4">
            <div class="container">
                <div class="row g-4">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
                        @include('author.profile.partials.update-profile-information-form')
                    </div>

                    @if(Auth::user()->google_id)
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
                            @include('author.profile.partials.change-google-password-form')
                        </div>
                    @else
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
                            @include('author.profile.partials.update-password-form')
                        </div>
                    @endif

                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
                        @include('author.profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
