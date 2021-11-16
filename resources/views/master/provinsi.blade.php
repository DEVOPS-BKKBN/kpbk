@extends('layouts.app', [
    'title' => __('Role Management'),
    'parentSection' => 'master',
    'elementName' => 'provinsi'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Examples') }} 
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('role.index') }}">{{ __('Master Provinsi') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('List') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Roles') }}</h3>
                                <p class="text-sm mb-0">
                                    {{ __('This is an example of role management. This is a minimal setup in order to get started fast.') }}
                                </p>
                            </div>
                            @can('create', App\Role::class)
                                <div class="col-4 text-right">
                                    <a href="{{ route('role.create') }}" class="btn btn-sm btn-primary">{{ __('Add role') }}</a>
                                </div>
                            @endcan
                        </div>
                    </div>
                    
                    <div class="col-12 mt-2">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>

                    <div class="table-responsive py-4">
                        <table class="table table-flush"  id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Kode') }}</th>
                                    <th scope="col">{{ __('Nama') }}</th>
                                    <th scope="col">{{ __('Geo Location') }}</th>
                                    <th scope="col">{{ __('TEST') }}</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getprov as $prov)
                                    @php
                                    $lat = $prov->meta['lat'];
                                    $long = $prov->meta['long'];
                                    @endphp
                                    <tr>
                                        <td>{{ $prov->id }}</td>
                                        <td>PROVINSI {{ $prov->name }}</td>
                                        <td>Lat : {{ $lat }}, Long : {{ $long }}</td>
                                        <td>
                                        <a href="{{ url('https://www.google.com/maps/place/'.$prov->name.'+Indonesia/@'.$lat.','.$long.',8z') }}" target="_blank">
                                           <i class="ni ni-square-pin text-red"></i>
                                        </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush

@push('js')
    <script src="{{ asset('argon') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
@endpush