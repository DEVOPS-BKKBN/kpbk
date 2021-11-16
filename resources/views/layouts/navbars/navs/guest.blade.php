<nav id="navbar-main" class="navbar navbar-horizontal navbar-expand-lg navbar-dark bg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <h1 class="text-secondary"> KPBK online</h1>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
            <!-- Collapse header -->
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navbar items -->
            
            <hr class="d-lg-none" />
            <h3 class="navbar-nav align-items-lg-center ml-lg-auto text-secondary">
                Pembangunan Berwawasan Kependudukan
            </h3>
        </div>
    </div>
</nav>