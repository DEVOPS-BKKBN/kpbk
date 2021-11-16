@extends('layouts.app', [
    'title' => __('Kabkota Management'),
    'parentSection' => 'master',
    'elementName' => 'kabkota'
])

@section('content')
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Examples') }} 
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('role.index') }}">{{ __('Master Kabupaten/Kota') }}</a></li>
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
                                <h3 class="mb-0">{{ __('Kabupaten/Kota') }}</h3>
                                <p class="text-sm mb-0">
                                    {{ __('This is an example of role management. This is a minimal setup in order to get started fast.') }}
                                </p>
                            </div>
                           
                        </div>
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
                                @foreach ($getkab as $kab)
                                    @php
                                    $lat = $kab->meta['lat'];
                                    $long = $kab->meta['long'];
                                    @endphp
                                    <tr>
                                        <td>{{ $kab->id }}</td>
                                        <td>{{ $kab->name }}</td>
                                        <td>Lat : {{ $lat }}, Long : {{ $long }}</td>
                                        <td>
                                        <a href="{{ url('https://www.google.com/maps/place/'.$kab->name.'+Indonesia/@'.$lat.','.$long.',8z') }}" target="_blank">
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