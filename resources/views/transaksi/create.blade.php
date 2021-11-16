@extends('layouts.app', [
    'title' => __('transaksi Management'),
    'parentSection' => 'laravel',
    'elementName' => 'transaksi-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('KPBK') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('transaksi.index') }}">{{ __('Form KPBK') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Add Form') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-transaksis-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Form KPBK') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('transaksi.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" class="transaksi-form" action="{{ route('transaksi.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 mt-2">
                                 @include('alerts.success')
                                 @include('alerts.errors')
                            </div>
                            <h6 class="heading-small text-muted mb-4">{{ __('formulir information') }}</h6>
                            <div class="pl-lg-4">

                                
                                <div class="form-group{{ $errors->has('level') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-role">{{ __('Level Kebijakan') }}</label>

                                    <select name="level" id="level" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" placeholder="{{ __('Level') }}" onchange="showDiv(this)">
                                       @if(auth()->user()->role_id == 1)
                                        <option value="1">PUSAT</option>
                                        <option value="2">PROVINSI</option>
                                        <option value="3">KAB/KOTA</option>
                                       @elseif(auth()->user()->role_id == 2)
                                        <option></option>
                                        <option value="2">PROVINSI</option>
                                        <option value="3">KAB/KOTA</option>
                                        @else
                                        <option value="3">KAB/KOTA</option>
                                        @endif

                                    </select>

                                    @include('alerts.feedback', ['field' => 'level'])
                                </div>

                                <div class="form-group{{ $errors->has('provinsi') ? ' has-danger' : '' }}" id="prov_div" style="display:none;">
                                    <label class="form-control-label" for="input-role">{{ __('Provinsi') }}</label>

                                   
                                    <select class="form-control" name="id_prov" id="provinsi" data-toggle="select" data-live-search="true" data-live-search-placeholder="Search ..." required>
                                    @if(auth()->user()->role_id == 1)
                                        @php
                                        $provinces = \Indonesia::allProvinces();
                                        @endphp
                                        <option></option>
                                            @foreach ($provinces as $item)
                                        <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                                            @endforeach

                                    @elseif(auth()->user()->role_id == 2)
                                        @php
                                        $provinces = \Indonesia::findProvince(auth()->user()->prov_id);
                                        @endphp
                                        <option></option>
                                           
                                        <option value="{{ $provinces->id ?? '' }}">{{ $provinces->name ?? '' }}</option>
                                    @endif
                                        
                                    </select>
                                    @include('alerts.feedback', ['field' => 'provinsi'])
                                </div>

                                <div class="form-group{{ $errors->has('kota') ? ' has-danger' : '' }}" id="kab_div"style="display:none;">
                                    <label class="form-control-label" for="input-role">{{ __('Kota') }}</label>
                                   
                                    <select class="form-control" name="id_kab" id="kota" data-toggle="select" data-live-search="true" data-live-search-placeholder="Search ..." required>
                                        <option>-</option>
                                           
                                    </select>
                                </div>

                                <div class="form-group{{ $errors->has('tahun') ? ' has-danger' : '' }}" >
                                    <label class="form-control-label" for="input-tahun">{{ __('Tahun') }}</label>
                                    
                                    <select class="form-control" name="tahun" id="tahun" data-toggle="select" data-live-search="true" data-live-search-placeholder="Search ..." required>
                                        {{ $last= date('Y')-50 }}
                                        {{ $now = date('Y') }}
                                        @for ($i = $now; $i >= $last; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                        
                                    </select>

                                    @include('alerts.feedback', ['field' => 'tahun'])
                                </div>

                                <div class="form-group{{ $errors->has('tahun') ? ' has-danger' : '' }}" >
                                    <label class="form-control-label" for="input-name">{{ __('Judul') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} text-uppercase" placeholder="{{ __('Judul Peraturan') }}" value="{{ old('name') }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>


                                <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-role">{{ __('Kategori') }}</label>
                                    <select name="id_kategori" id="input-role" class="form-control{{ $errors->has('id_kategori') ? ' is-invalid' : '' }} text-uppercase" placeholder="{{ __('Kategori') }}" required>
                                        <option value="">-</option>
                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}" {{ $kategori->id == old('id_kategori') ? 'selected' : '' }}>{{ $kategori->name }}</option>
                                        @endforeach
                                    </select>

                                    @include('alerts.feedback', ['field' => 'id_kategori'])
                                </div>
                                
                               <div class="form-group{{ $errors->has('id_kebijakan') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-role">{{ __('Kebijakan') }}</label>
                                    <select name="id_kebijakan" id="input-role" class="form-control{{ $errors->has('id_kkebijakan') ? ' is-invalid' : '' }} text-uppercase" placeholder="{{ __('Kebijakan') }}" required>
                                        <option value="">-</option>
                                        @foreach ($kebijakans as $kebijakan)
                                            <option value="{{ $kebijakan->id }}" {{ $kebijakan->id == old('id_kebijakan') ? 'selected' : '' }}>{{ $kebijakan->name }}</option>
                                        @endforeach
                                    </select>

                                    @include('alerts.feedback', ['field' => 'id_kebijakan'])
                                </div>

                                <div class="form-group{{ $errors->has('file') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-file">{{ __('Picture') }}</label>
                                    <div class="custom-file">
                                        <input type="file" name="dokumen" class="custom-file-input{{ $errors->has('file') ? ' is-invalid' : '' }}" id="input-file" accept="application/pdf" required>
                                        <label class="custom-file-label" for="input-file">{{ __('Select File') }}</label>
                                    </div>

                                    @include('alerts.feedback', ['field' => 'file'])
                                </div>
                               <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">                         
                                <!-- 
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="date">User</label>
                                            @foreach ($users as $user)
                                            <input class="form-control" name="created_by" id="created_by" value ="{{ $user->name }}">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>  -->

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/quill/dist/quill.core.css">
@endpush

@push('js')
<script type="text/javascript">
function showDiv(select){
   if(select.value==2){
    document.getElementById('prov_div').style.display = "block";
    document.getElementById('kab_div').style.display = "none";
   }
   if(select.value==3) {
    document.getElementById('prov_div').style.display = "block";
    document.getElementById('kab_div').style.display = "block";
   }
   if(select.value==1) {
    document.getElementById('prov_div').style.display = "none";
    document.getElementById('kab_div').style.display = "none";
   }
} 
</script>
    <script>
        function onChangeSelect(url, id, name) {
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function (data) {
                    $('#' + name).empty();
                    $('#' + name).append('<option></option>');

                    $.each(data, function (key, value) {
                        $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
        $(function () {
            $('#provinsi').on('change', function () {
                onChangeSelect('{{ route("cities") }}', $(this).val(), 'kota');
            });
            $('#kota').on('change', function () {
                onChangeSelect('{{ route("districts") }}', $(this).val(), 'kecamatan');
            })
            $('#kecamatan').on('change', function () {
                onChangeSelect('{{ route("villages") }}', $(this).val(), 'desa');
            })
        });
    </script>
    <script src="{{ asset('argon') }}/vendor/select2/dist/js/select2.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/quill/dist/quill.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
@endpush
