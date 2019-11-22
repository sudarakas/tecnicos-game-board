@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Game List</h3>
                    </div>
                    <div class="col text-right">
                        <a href="{{route('game.add.view')}}" class="btn btn-success">Add Game</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Game Name</th>
                            <th scope="col">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($games as $key=>$game)
                        <tr>
                            <td>{{$key+1}}</td>
                            <form action="{{route('game.update')}}" method="post">
                                @csrf
                                <input type="text" name="id" value="{{$game->id}}" hidden>
                                <td><input type="text" name="name" id="input-name"
                                        class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        placeholder="{{ __('Game Name') }}" value="{{ $game->name ?? old('name') }}"
                                        required autofocus></td>
                                <td>
                                    <select name="status"
                                        class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"">
                                        <option value=" {{$game->status}}"> {{$game->status}}</option>
                                        <option value="{{'Unlocked'}}">{{'Unlocked'}}</option>
                                        <option value="{{'Locked'}}">{{'Locked'}}</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                                    </div>
                                </td>
                            </form>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if (session('status'))
            <div class="col-md-4 mx-auto">
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif

        </div>

        @include('layouts.footers.auth')
    </div>
    @endsection

    @push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    @endpush