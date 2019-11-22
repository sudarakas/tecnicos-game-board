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
                        <a href="#!" class="btn btn-success">Add Game</a>
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

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                /argon/
                            </th>
                            <td>
                                4,569
                            </td>
                            <td>
                                340
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
    @endsection

    @push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    @endpush