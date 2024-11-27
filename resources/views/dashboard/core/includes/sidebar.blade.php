<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('/') }}" class="brand-link">
        {{--        <img src="{{asset("logo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">@lang('dashboard.galawy')</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->image ? asset(auth()->user()->image) : asset('img/user2-160x160.jpg') }}"
                     class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('settings.edit', auth()->user()->id) }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item  {{ in_array(request()->route()->getName(),['/'])? 'menu-open': '' }}">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.Home')
                        </p>
                    </a>
                </li>
                @permission('center-programmes-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['center-programmes.index','center-programmes.create','center-programmes.edit','center-programmes.mangers','center-programmes.create','center-programmes.edit'])? 'menu-open': '' }}">
                    <a href="{{ route('center-programmes.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.center-programmes')
                        </p>
                    </a>
                </li>
                @endpermission


                @permission('center-publications-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['center-publications.index','center-publications.create','center-publications.edit','center-publications.mangers','center-publications.create','center-publications.edit'])? 'menu-open': '' }}">
                    <a href="{{ route('center-publications.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.center-publications')
                        </p>
                    </a>
                </li>
                @endpermission
                @permission('center-news-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['center-news.index','center-news.create','center-news.edit','center-news.mangers','center-news.create','center-news.edit'])? 'menu-open': '' }}">
                    <a href="{{ route('center-news.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.center-news')
                        </p>
                    </a>
                </li>
                @endpermission
                @permission('scientific-papers-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['scientific-papers.index','scientific-papers.create','scientific-papers.edit','scientific-papers.mangers','scientific-papers.create','scientific-papers.edit'])? 'menu-open': '' }}">
                    <a href="{{ route('scientific-papers.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.scientific-papers')
                        </p>
                    </a>
                </li>
                @endpermission
                @permission('articles-read')
                <li class="nav-item  {{
    in_array(request()->route()->getName(), ['categories.index', 'categories.create', 'categories.edit', 'categories.mangers', 'categories.create', 'categories.edit','articles.index', 'articles.create', 'articles.edit', 'articles.mangers', 'articles.create', 'articles.edit','categories.index', 'categories.create', 'categories.edit', 'categories.mangers', 'categories.create', 'categories.edit','articles.index', 'articles.create', 'articles.edit', 'articles.mangers', 'articles.create', 'articles.edit']) ? 'menu-open' : ''
}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.articles')
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ in_array(request()->route()->getName(), ['categories.index', 'categories.create', 'categories.edit', 'categories.mangers', 'categories.create', 'categories.edit']) ? 'active' : '' }}">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('dashboard.categories')</p>
                            </a>
                        </li>
                        <li class="nav-item {{ in_array(request()->route()->getName(), ['articles.index', 'articles.create', 'articles.edit', 'articles.mangers', 'articles.create', 'articles.edit']) ? 'active' : '' }}">
                            <a href="{{ route('articles.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('dashboard.articles')</p>
                            </a>
                        </li>
                    </ul>
                </li>


                @endpermission
                @permission('content-read')
                <li class="nav-item  {{
    in_array(request()->route()->getName(), []) ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.content')
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @permission('header_footer-read')
                        <li class="nav-item {{ in_array(request()->route()->getName(), ['header-footer.index']) ? 'active' : '' }}">
                            <a href="{{ route('header-footer.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('dashboard.header_footer')</p>
                            </a>
                        </li>
                        @endpermission
                        @permission('home-read')
                        <li class="nav-item {{ in_array(request()->route()->getName(), ['home.index']) ? 'active' : '' }}">
                            <a href="{{ route('home.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>@lang('dashboard.Home')</p>
                            </a>
                        </li>
                        @endpermission
                        @permission('abouts-read')
                        <li class="nav-item  {{ in_array(request()->route()->getName(),['abouts.index','abouts.create','abouts.edit','abouts.mangers','abouts.create','abouts.edit'])? 'menu-open': '' }}">
                            <a href="{{ route('abouts.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    @lang('dashboard.abouts')
                                </p>
                            </a>
                        </li>
                        @endpermission
                        @permission('map-centers-read')
                        <li class="nav-item  {{ in_array(request()->route()->getName(),['map-centers.index','map-centers.create','map-centers.edit','map-centers.mangers','map-centers.create','map-centers.edit'])? 'menu-open': '' }}">
                            <a href="{{ route('map-centers.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    @lang('dashboard.map-centers')
                                </p>
                            </a>
                        </li>
                        @endpermission
                    </ul>
                </li>


                @endpermission
                @permission('calenders-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['calenders.index','calenders.show','calenders.create','calenders.edit'])? 'menu-open': '' }}">
                    <a href="{{ route('calenders.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.calenders')
                        </p>
                    </a>
                </li>
                @endpermission
                @permission('contacts-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['contacts.index','contacts.show','contacts.destroy'])? 'menu-open': '' }}">
                    <a href="{{ route('contacts.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.contacts')
                        </p>
                    </a>
                </li>
                @endpermission
                @permission('roles-read')
                <li class="nav-item  {{ in_array(request()->route()->getName(),['roles.index','roles.create','roles.edit','roles.mangers','managers.create','managers.edit'])? 'menu-open': '' }}">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-circle"></i>
                        <p>
                            @lang('dashboard.roles_and_permissions')
                        </p>
                    </a>
                </li>
                @endpermission
                <li
                    class="nav-item  {{ in_array(request()->route()->getName(),['settings.edit'])? 'menu-open': '' }} {{ Route::currentRouteName()=='settings.edit'?'activeNav':'' }}">
                    <a href="{{ route('settings.edit', auth()->user()->id) }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            @lang('dashboard.Settings')
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
