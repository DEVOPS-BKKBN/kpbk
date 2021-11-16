<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner scroll-scrollx_visible">
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{ route('home') }}">
                KPBK Online
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item {{ $parentSection == 'dashboards' ? 'active' : '' }}">
                        <a class="nav-link collapsed" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="{{ $parentSection == 'dashboards' ? 'true' : '' }}" aria-controls="navbar-dashboards">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">{{ __('Dashboards') }}</span>
                        </a>
                        <div class="collapse {{ $parentSection == 'dashboards' ? 'show' : '' }}" id="navbar-dashboards">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ $elementName == 'dashboard' ? 'active' : '' }}">
                                    <a href="{{ route('home') }}" class="nav-link">{{ __('Dashboard') }}</a>
                                </li>
                                <!-- <li class="nav-item {{ $elementName == 'dashboard-alternative' ? 'active' : '' }}">
                                    <a href="{{ route('page.index','dashboard-alternative') }}" class="nav-link">{{ __('Alternative') }}</a>
                                </li>
                            </ul> -->
                        </div>
                    </li>

                   <li class="nav-item {{ $parentSection == 'ikk' ? 'active' : '' }}">
                        <a class="nav-link" href="#navbar-ikk" data-toggle="collapse" role="button" aria-expanded="{{ $parentSection == 'ikk' ? 'true' : '' }}" aria-controls="navbar-ikk">
                            <i class="ni ni-spaceship text-red"></i>
                            <span class="nav-link-text">{{ __('Data IKK') }}</span>
                        </a>
                        <div class="collapse {{ $parentSection == 'ikk' ? 'show' : '' }}" id="navbar-ikk">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ $elementName == 'transaksi' ? 'active' : '' }}">
                                    <a href="{{ route('page.index', 'transaksi') }}" class="nav-link">{{ __('List Data') }}</a>
                                </li>
                                <li class="nav-item {{ $elementName == 'listkebijakan' ? 'active' : '' }}">
                                    <a href="{{ route('page.index', 'listkebijakan') }}" class="nav-link">{{ __('List by Kebijakan') }}</a>
                                </li>
                                <li class="nav-item {{ $elementName == 'listkategori' ? 'active' : '' }}">
                                    <a href="{{ route('page.index', 'listkategori') }}" class="nav-link">{{ __('List by Kategori') }}</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                            <i class="fab fa-laravel" style="color: #f4645f;"></i>
                            <span class="nav-link-text" style="color: #f4645f;">{{ __('Manajemen') }}</span>
                        </a>
                        <div class="collapse show" id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ $elementName == 'profile' ? 'active' : '' }}">
                                    <a href="{{ route('profile.edit') }}" class="nav-link">{{ __('Profile') }}</a>
                                </li>
                                @can('manage-users', App\User::class)
                                    <li class="nav-item  {{ $elementName == 'role-management' ? 'active' : '' }}">
                                        <a href="{{ route('role.index') }}" class="nav-link">{{ __('Role Management') }}</a>
                                    </li>
                                @endcan
                                @can('manage-users', App\User::class)
                                    <li class="nav-item {{ $elementName == 'user-management' ? 'active' : '' }}">
                                        <a href="{{ route('user.index') }}" class="nav-link">{{ __('User Management') }}</a>
                                    </li>
                                @endcan
                               <!--  @can('manage-items', App\User::class)
                                    <li class="nav-item {{ $elementName == 'category-management' ? 'active' : '' }}">
                                        <a href="{{ route('category.index') }}" class="nav-link">{{ __('Category Management') }}</a>
                                    </li>
                                @endcan
                                @can('manage-items', App\User::class)
                                    <li class="nav-item {{ $elementName == 'tag-management' ? 'active' : '' }}">
                                        <a href="{{ route('tag.index') }}" class="nav-link">{{ __('Tag Management') }}</a>
                                    </li>
                                @endcan
                                @can('manage-items', App\User::class)
                                    <li class="nav-item {{ $elementName == 'item-management' ? 'active' : '' }}">
                                        <a href="{{ route('item.index') }}" class="nav-link">{{ __('Item Management') }}</a>
                                    </li>
                                @else
                                    <li class="nav-item {{ $elementName == 'item-management' ? 'active' : '' }}">
                                        <a href="{{ route('item.index') }}" class="nav-link">{{ __('Items') }}</a>
                                    </li>
                                @endcan -->
                            </ul>
                        </div>
                    </li>

                    <!-- Menu Master Data -->
                     
                      <li class="nav-item {{ $parentSection == 'master' ? 'active' : '' }}">
                        <a class="nav-link" href="#navbar-master" data-toggle="collapse" role="button" aria-expanded="{{ $parentSection == 'master' ? 'true' : '' }}" aria-controls="navbar-master">
                            <i class="ni ni-building text-green"></i>
                            <span class="nav-link-text">{{ __('Master Data') }}</span>
                        </a>
                        <div class="collapse {{ $parentSection == 'master' ? 'show' : '' }}" id="navbar-master">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ $elementName == 'provinsi' ? 'active' : '' }}">
                                    <a href="{{ route('provinces') }}" class="nav-link">{{ __('Data Provinsi') }}</a>
                                </li>
                                <li class="nav-item {{ $elementName == 'kabupaten' ? 'active' : '' }}">
                                    <a href="{{ route('kabkota') }}" class="nav-link">{{ __('Data Kebupaten/Kota') }}</a>
                                </li>
                                <li class="nav-item {{ $elementName == 'kategori' ? 'active' : '' }}">
                                    <a href="{{ route('page.index', 'kategori') }}" class="nav-link">{{ __('Data Kategori') }}</a>
                                </li>
                                <li class="nav-item {{ $elementName == 'kebijakan' ? 'active' : '' }}">
                                    <a href="{{ route('page.index', 'kebijakan') }}" class="nav-link">{{ __('Data Kebijakan') }}</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--  End Menu Master -->


                    <!-- Menu Laporan -->
                     
                      <li class="nav-item {{ $parentSection == 'laporan' ? 'active' : '' }}">
                        <a class="nav-link" href="#navbar-laporan" data-toggle="collapse" role="button" aria-expanded="{{ $parentSection == 'laporan' ? 'true' : '' }}" aria-controls="navbar-laporan">
                            <i class="ni ni-single-copy-04 text-grey"></i>
                            <span class="nav-link-text">{{ __('Laporan') }}</span>
                        </a>
                        <div class="collapse {{ $parentSection == 'laporan' ? 'show' : '' }}" id="navbar-laporan">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ $elementName == 'viewkebijakan' ? 'active' : '' }}">
                                    <a href="{{ route('page.index', 'viewkebijakan') }}" class="nav-link">{{ __('Data Kebijakan') }}</a>
                                </li>
                                <li class="nav-item {{ $elementName == 'viewKategori' ? 'active' : '' }}">
                                    <a href="{{ route('page.index', 'viewKategori') }}" class="nav-link">{{ __('Data by Kategori') }}</a>
                                </li>
                                <li class="nav-item {{ $elementName == 'result' ? 'active' : '' }}">
                                    <a href="{{ route('page.index', 'result') }}" class="nav-link">{{ __('Data Result') }}</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--  End Laporan -->


                    <!-- Menu Transaksi Data -->

                      <li class="nav-item {{ $parentSection == 'transaksi' ? 'active' : '' }}">
                        <a class="nav-link" href="#navbar-transaksi" data-toggle="collapse" role="button" aria-expanded="{{ $parentSection == 'transaksi' ? 'true' : '' }}" aria-controls="navbar-transaksi">
                            <i class="ni ni-briefcase-24 text-purple"></i>
                            <span class="nav-link-text">{{ __('transaksi') }}</span>
                        </a>
                        <div class="collapse {{ $parentSection == 'transaksi' ? 'show' : '' }}" id="navbar-transaksi">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ $elementName == 'log data' ? 'active' : '' }}">
                                    <a href="{{ route('page.index', 'log data') }}" class="nav-link">{{ __('Log Data') }}</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!--  End Transaksi Master -->

                    <li class="nav-item {{ $parentSection == 'pages' ? 'active' : '' }}">
                        <a class="nav-link" href="#navbar-pages" data-toggle="collapse" role="button" aria-expanded="{{ $parentSection == 'pages' ? 'true' : '' }}" aria-controls="navbar-pages">
                            <i class="ni ni-collection text-yellow"></i>
                            <span class="nav-link-text">{{ __('Pages') }}</span>
                        </a>
                        <div class="collapse {{ $parentSection == 'pages' ? 'show' : '' }}" id="navbar-pages">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ $elementName == 'timeline' ? 'active' : '' }}">
                                    <a href="{{ route('page.index', 'timeline') }}" class="nav-link">{{ __('Timeline') }}</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                   <!-- End Menu Transaksi Data -->
                    
                  
                    <li class="nav-item {{ $parentSection == 'maps' ? 'active' : '' }}">
                        <a class="nav-link" href="#navbar-maps" data-toggle="collapse" role="button" aria-expanded="{{ $parentSection == 'maps' ? 'true' : '' }}" aria-controls="navbar-maps">
                            <i class="ni ni-map-big text-primary"></i>
                            <span class="nav-link-text">{{ __('Maps') }}</span>
                        </a>
                        <div class="collapse {{ $parentSection == 'maps' ? 'show' : '' }}" id="navbar-maps">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item {{ $elementName == 'google' ? 'active' : '' }}">
                                    <a href="{{ route('page.index','googlemaps') }}" class="nav-link">{{ __('Google') }}</a>
                                </li>
                                <li class="nav-item {{ $elementName == 'vector' ? 'active' : '' }}">
                                    <a href="{{ route('page.index','vectormaps') }}" class="nav-link">{{ __('Vector') }}</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                   
                </ul>
                
            </div>
        </div>
    </div>
</nav>