@extends('layouts.app', [
    'parentSection' => 'maps',
    'elementName' => 'vector'
])

@section('content') 
    @component('layouts.headers.auth') 
        @component('layouts.headers.breadcrumbs')
            @slot('title') 
                {{ __('Vector maps') }} 
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('page.index', 'vectormaps') }}">{{ __('Maps') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Vector maps') }}</li>
        @endcomponent 
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body pt-0">
                        <div class="vector-map" data-toggle="vectormap" data-map="indonesia-adm1_merc"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="{{ asset('argon') }}/js/vendor/jvectormap/jquery-jvectormap-indo.js"></script>
    
    <script>

    var VectorMap = (function() {

    // Variables

    var $vectormap = $('[data-toggle="vectormap"]'),

        colors = {
            gray: {
                100: '#f6f9fc',
                200: '#e9ecef',
                300: '#dee2e6',
                400: '#ced4da',
                500: '#adb5bd',
                600: '#8898aa',
                700: '#525f7f',
                800: '#32325d',
                900: '#212529'
            },
            theme: {
                'default': '#172b4d',
                'primary': '#5e72e4',
                'secondary': '#f4f5f7',
                'info': '#11cdef',
                'success': '#2dce89',
                'danger': '#f5365c',
                'warning': '#fb6340'
            },
            black: '#12263F',
            white: '#FFFFFF',
            transparent: 'transparent',
        };

    // Methods

    function init($this) {

        // Get placeholder
        var map = $this.data('map'),


            options = {
                map: map,
                zoomOnScroll: false,
                scaleColors: ['#f00', '#0071A4'],
                normalizeFunction: 'polynomial',
                hoverOpacity: 0.7,
                hoverColor: false,
                backgroundColor: colors.transparent,
                
                regionStyle: {
                    initial: {
                        fill: colors.gray[600],
                        "fill-opacity": .8,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 1
                    },
                    hover: {
                        fill: colors.gray[800],
                        "fill-opacity": .8,
                        cursor: 'pointer'
                    },
                    selected: {
                        fill: 'yellow'
                    },
                        selectedHover: {
                    },

                }

                

                
                
                
               
            };

        // Init map
        $this.vectorMap(options);


        // Customize controls
        $this.find('.jvectormap-zoomin').addClass('btn btn-sm btn-primary');
        $this.find('.jvectormap-zoomout').addClass('btn btn-sm btn-primary');



    }

    // Events
    

    if ($vectormap.length) {
        $vectormap.each(function() {
            init($(this));
        });
    }



})();
    </script>

@endpush