@extends('layouts.app', [
    'title' => __('Laporan Kategori'),
    'parentSection' => 'laporan',
    'elementName' => 'laporan-kategori'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Examples') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('item.index') }}">{{ __('Laporan Kategori') }}</a></li>
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
                                <h3 class="mb-0">{{ __('Laporan Kategori') }}</h3>
                                <p class="text-sm mb-0">
                                    {{ __('This is an example of item management. This is a minimal setup in order to get started fast.') }}
                                </p>
                            </div>
                           
                        </div>
                    </div>

                    
                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-bordered "  id="datatable-buttons">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('No') }}</th>
                                    <th scope="col">{{ __('PROVINSI') }}</th>
                                    <th scope="col">{{ __('JUMLAH') }}</th>
                                    <th scope="col">{{ __('KUANTITAS PENDUDUK') }}</th>
                                    <th scope="col">{{ __('KUALITAS PENDUDUK') }}</th>
                                    <th scope="col">{{ __('MOBILITAS PENDUDUK') }}</th>
                                    <th scope="col">{{ __('ADMINISTRASI PENDUDUK') }}</th>
                                    <th scope="col">{{ __('PEMBAGUNAN KELUARGA') }}</th>
                                    <th scope="col">{{ __('KELUARGA BERENCANA') }}</th>
                                    <th scope="col">{{ __('KESEHATAN REPRODUKSI') }}</th>
                                    <th scope="col">{{ __('GDPK') }}</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                $no = 1;
                                @endphp
                                @foreach ($laps as $lap)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $lap->name }}</td>
                                        <td>{{ $lap->jml }}</td>
                                        <td>{{ $lap->kuantitas }}</td>
                                        <td>{{ $lap->kualitas }}</td>
                                        <td>{{ $lap->mobilitas }}</td>
                                        <td>{{ $lap->adminduk }}</td>
                                        <td>{{ $lap->pk }}</td>
                                        <td>{{ $lap->kb }}</td>
                                        <td>{{ $lap->kespro }}</td>
                                        <td>{{ $lap->gdpk }}</td>
                                    </tr>
                                    @php 
                                    $no = $no + 1;
                                    @endphp
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
