@extends('layouts.app', [
    'title' => __('Laporan Kebijakan'),
    'parentSection' => 'laporan',
    'elementName' => 'laporan-kebijakan'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Examples') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('item.index') }}">{{ __('Laporan Kebijakan') }}</a></li>
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
                                <h3 class="mb-0">{{ __('Laporan Kebijakan') }}</h3>
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
                                    <th scope="col" >{{ __('PROVINSI') }}</th>
                                    <th scope="col">{{ __('JUMLAH') }}</th>
                                    <th scope="col" style="background-color:#4de50f1a">{{ __('PERDA PROV') }}</th>
                                    <th scope="col" style="background-color:#4de50f1a">{{ __('QUANUM') }}</th>
                                    <th scope="col" style="background-color:#4de50f1a">{{ __('PERGUB') }}</th>
                                    <th scope="col" style="background-color:#4de50f1a">{{ __('KEPGUB') }}</th>
                                    <th scope="col" style="background-color:#4de50f1a">{{ __('SEGUB') }}</th>
                                    
                                    <th scope="col" style="background-color:#f1d50c29">{{ __('PERDA KAB') }}</th>
                                    <th scope="col" style="background-color:#f1d50c29">{{ __('QUANUM KAB') }}</th>
                                    <th scope="col" style="background-color:#f1d50c29">{{ __('PER BUPATI') }}</th>
                                    <th scope="col" style="background-color:#f1d50c29">{{ __('KEP BUPATI') }}</th>
                                    <th scope="col" style="background-color:#f1d50c29">{{ __('SE BUPATI') }}</th>
                                    <th scope="col" style="background-color:#e39f8570">{{ __('PERDA WALI') }}</th>
                                    <th scope="col" style="background-color:#e39f8570">{{ __('QUANUM WALI') }}</th>
                                    <th scope="col" style="background-color:#e39f8570">{{ __('PER WALI') }}</th>
                                    <th scope="col" style="background-color:#e39f8570">{{ __('KEP WALI') }}</th>
                                    <th scope="col" style="background-color:#e39f8570">{{ __('SE WALI') }}</th>
                                   
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
                                        <td style="background-color:#4de50f1a">{{ $lap->perdaprov }}</td>
                                        <td style="background-color:#4de50f1a">{{ $lap->qprov }}</td>
                                        <td style="background-color:#4de50f1a">{{ $lap->pergub }}</td>
                                        <td style="background-color:#4de50f1a">{{ $lap->kepgub }}</td>
                                        <td style="background-color:#4de50f1a">{{ $lap->segub }}</td>
                                       
                                        <td style="background-color:#f1d50c29">{{ $lap->perdakab }}</td>
                                        <td style="background-color:#f1d50c29">{{ $lap->qkab }}</td>
                                        <td style="background-color:#f1d50c29">{{ $lap->perbupati }}</td>
                                        <td style="background-color:#f1d50c29">{{ $lap->kepbupati }}</td>
                                        <td style="background-color:#f1d50c29">{{ $lap->sebupati }}</td>

                                        <td style="background-color:#e39f8570">{{ $lap->perdawali }}</td>
                                        <td style="background-color:#e39f8570">{{ $lap->qwali }}</td>
                                        <td style="background-color:#e39f8570">{{ $lap->perwali }}</td>
                                        <td style="background-color:#e39f8570">{{ $lap->kepwali }}</td>
                                        <td style="background-color:#e39f8570">{{ $lap->sewali }}</td>
                                       
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
