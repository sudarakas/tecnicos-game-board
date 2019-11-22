@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
<div class="header bg-gradient-success py-7 py-lg-8">
    <div class="container">
        <div class="header-body text-center mt-7 mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-6">
                    <div class="row">
                        @foreach ($games as $game)
                        <div class="col-xl-3 col-lg-6">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Game No</h5>
                                            <span class="h1 font-weight-bold mb-5 display-1">{{$game->id}}</span>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-muted text-sm">
                                        @if ($game->status == 'Unlocked')
                                        <a href="" class="btn btn-success">Unlock</a>
                                        @else
                                        <a href="" class="btn btn-danger">Locked</a>
                                        @endif

                                    </p>
                                </div>
                            </div>
                            <div class="my-5"></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
            xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>

<div class="container mt--10 pb-5"></div>
@endsection