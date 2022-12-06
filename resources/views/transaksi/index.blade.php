@extends('layouts.app', [
    'title' => __('Transaksi Management'),
    'parentSection' => 'laravel',
    'elementName' => 'transaksi-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('IKK') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('item.index') }}">{{ __('Kebijakan Pembangunan Berwawasan Kependudukan') }}</a></li>
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
                                <h3 class="mb-0">{{ __('List Data') }}</h3>
                                <p class="text-sm mb-0">
                                    {{ __('List Data Kebijakan Pembangunan Berwawasan Kependudukan') }}
                                </p>
                            </div>
                            @if (auth()->user()->can('create', App\Item::class))
                                <div class="col-4 text-right">
                                    <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-primary">{{ __('Add Data') }}</a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                        @include('alerts.success')
                        @include('alerts.errors')
                    </div>
                    
                    <div class="table-responsive py-4">
                        <table class="table align-items-center table-flush"  id="datatable-buttons">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('No') }}</th>
                                    <th scope="col">{{ __('TAHUN') }}</th>
                                    <th scope="col">{{ __('JUDUL') }}</th>
                                    <th scope="col">{{ __('LEVEL') }}</th>
                                    <th scope="col">{{ __('PROVINSI') }}</th>
                                    <th scope="col">{{ __('KAB/KOTA') }}</th>
                                    <th scope="col">{{ __('FILE') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col">{{ __('ACTION') }}</th>
                                    
                                   
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                $no = 1;
                                @endphp
                                @foreach ($transaksis as $trans)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $trans->tahun }}</td>
                                        <td>{{ strtoupper($trans->name) }}</td>
                                        <td>{{ $trans->level }}</td>
                                        <td>{{ $trans->getprovs->name }}</td>
                                        <td>
                                            @if($trans->id_kab == 0)
                                            -
                                            @else
                                            {{ $trans->getcities->name }}
                                            @endif
                                        </td>
                                        <td><a href="{{$trans->file}}" target="_blank">Download</td>
                                        <td>{{ $trans->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <button data-toggle="tooltip" data-placement="bottom" title="Delete Data" class="btn btn-icon btn-danger btn-sm" type="button">
                                                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                                            </button>
                                            <button data-toggle="tooltip" data-placement="bottom" title="Edit Data"class="btn btn-icon btn-success btn-sm" type="button" data-toggle="Edit">
                                                    <span class="btn-inner--icon"><i class="ni ni-tag"></i></span>
                                            </button>
                                        </td>
                                        
                                       
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
