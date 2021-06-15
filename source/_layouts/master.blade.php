<!DOCTYPE html>
<html lang="@yield('lang', 'en')">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">
        <meta name="author" content="Alexandr Chernyaev">

        <meta property="og:site_name" content="{{ $page->siteName }}"/>
        <meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}"/>
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:image" content="/favicon.svg"/>
        <meta property="og:type" content="website"/>

        <meta name="yandex-verification" content="23bb1990414a4f0e" />
        <meta name="google-site-verification" content="EWv-U0_XG4_ck_eYWIAhKzyZeHWvow4EsYexXE1q0mc" />

        <meta name="twitter:image:alt" content="{{ $page->siteName }}">
        <meta name="twitter:card" content="summary_large_image">

        <link rel="alternate" href="{{ $page->ahref('ru') }}" hreflang="ru"/>
        <link rel="alternate" href="{{ $page->ahref('en') }}" hreflang="en"/>
        <link rel="alternate" href="{{ $page->ahref('en') }}" hreflang="x-default"/>

        <title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="icon" href="/favicon.svg" sizes="any" type="image/svg+xml">
        <link rel="stylesheet" href="{{ mix('css/app.css', 'assets/build') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" />

        @stack('meta')
    </head>


    <body itemscope itemtype="http://schema.org/WebPage">

    <div id="app">

        <!-- header -->
        <header id="header" class="bg-dark">
            <div class="container">
                <div class="d-flex flex-column flex-md-row align-items-center py-3">
                    <h5 class="my-0 mr-md-auto font-weight-normal">
                        <a href="{{$page->baseUrl}}/@yield('lang')" class="v-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" class="mr-3" height="30px" fill="currentColor">
                                <g>
                                    <path d="M86.55 30.73c-11.33 10.72-27.5 12.65-42.3 14.43-10.94 1.5-23.3 3.78-30.48 13.04-6.2 8.3-4.25 20.3 2.25 27.8 1.35 2.03 5.7 5.7 6.38 5.3-5.96-8.42-5.88-21.6 2.6-28.4 8.97-7.52 21.2-7.1 32.03-9.7 6.47-1.23 13.3-3.5 19.2-5.34-8.3 7.44-19.38 10.36-29.7 13.75-8.7 3.08-17.22 10.23-17.45 20.1-.17 6.8 3.1 14.9 10.06 17.07 18.56 4.34 39.14-3.16 50.56-18.4 12.7-16.12 13.75-40.2 2.43-57.33-1.33 2.9-3.28 5.5-5.58 7.7z"/>
                                    <path d="M0 49.97c-.14 4.35 1.24 13.9 2.63 14.64 1.2-11.48 10.2-20.74 20.83-24.47 17.9-7.06 38.75-3.1 55.66-13.18 5.16-2.3 9.28-9.48 4.36-14.1-2.16-1.76-5.9-5.75-3.7-.72.83 6.22-5.47 10.06-10.63 11.65-10.9 3.34-22.46 3-33.62 4.93-1.9.32-5.9 1.2-2.07-.6 10.52-5.02 23.57-4.38 32.6-12.5 4.8-3.75 2.77-11.16-2.4-13.4C57.4-.35 50.3-.35 43.63.35c-19.85 2.3-37.3 17.7-42.05 37.1C.52 41.57 0 45.77 0 49.97z"/>
                                </g>
                            </svg>

                            <span class="h3 font-thin text-uppercase">Orchid</span>
                        </a>
                    </h5>

                    <nav class="my-2 mt-4 mt-md-0 my-md-0 mr-md-3 d-none d-md-block">

                        <a class="p-3 m-sm-0" href="https://blog.orchid.software/">
                            <i class="icon-cup m-r-xs text-xs"></i>
                            @yield('main.blog')
                        </a>
                        
                        <a class="p-3 m-sm-0 d-none d-sm-inline" href="https://github.com/orchidsoftware/platform/discussions" target="_blank" rel="noopener noreferrer">
                            <i class="icon-bubbles m-r-xs text-xs"></i>
                            @yield('main.discussion')
                        </a>

                        <a class="p-3 m-sm-0" href="https://github.com/orchidsoftware">
                            <i class="icon-docs m-r-xs text-xs"></i>
                            GitHub
                        </a>

                    </nav>


                    <div class="form-group mb-0 pl-sm-3 pr-sm-3 mb-3 mb-sm-0 d-none d-md-block">
                        <div class="block w-100">
                            <input type="search" class="form-control w-full"
                                   id="docsearch"
                                   placeholder="@yield('Search')"
                            >
                        </div>
                    </div>

                    <a href="/@yield('lang')/docs" class="btn btn-sm btn-outline-primary btn-rounded mt-4 mt-sm-0 d-none d-md-block">
                        <strong>
                            <svg class="m-r-xs" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32" fill="currentColor">
                                <path d="M24 0h-11c-1.104 0-2 0.895-2 2h11v8h8v16h-7v2h7c1.105 0 2-0.895 2-2v-18zM24 8v-5.172l5.171 5.172h-5.171zM2 4c-1.105 0-2 0.896-2 2v24c0 1.105 0.895 2 2 2h17c1.105 0 2-0.895 2-2v-18l-8-8.001h-11zM19 30h-17v-24h9v8h8v16zM13 12v-5.172l5.171 5.172h-5.171z"></path>
                            </svg>

                            @yield('main.documentation')
                        </strong>
                    </a>
                </div>
            </div>
        </header>
        <!-- / header -->

        <div id="content">
            @yield('content')
        </div>

        <!-- footer -->

        <div class="shape-footer">
            <svg viewBox="0 0 2880 48" xmlns="http://www.w3.org/2000/svg" style="margin-bottom: -1px;width: 101%;fill:#212529; vertical-align: bottom;">
                <path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z"></path>
            </svg>
        </div>

        <footer id="footer" class="bg-dark">
            @yield('footer')

            <div class="container">

                <div class="row pt-3 pb-4">
                    <div class="d-none d-sm-block col-sm-9">

                        <div class="d-block my-3">

                            @foreach($page->navigation[$page->get('lang','en')]['community'] as $links)
                                <ul class="list-inline d-flex align-items-center">

                                    @if($loop->first)
                                        <li class="hidden-xs mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" height="40px"
                                                 fill="currentColor">
                                                <g>
                                                    <path d="M86.55 30.73c-11.33 10.72-27.5 12.65-42.3 14.43-10.94 1.5-23.3 3.78-30.48 13.04-6.2 8.3-4.25 20.3 2.25 27.8 1.35 2.03 5.7 5.7 6.38 5.3-5.96-8.42-5.88-21.6 2.6-28.4 8.97-7.52 21.2-7.1 32.03-9.7 6.47-1.23 13.3-3.5 19.2-5.34-8.3 7.44-19.38 10.36-29.7 13.75-8.7 3.08-17.22 10.23-17.45 20.1-.17 6.8 3.1 14.9 10.06 17.07 18.56 4.34 39.14-3.16 50.56-18.4 12.7-16.12 13.75-40.2 2.43-57.33-1.33 2.9-3.28 5.5-5.58 7.7z"></path>
                                                    <path d="M0 49.97c-.14 4.35 1.24 13.9 2.63 14.64 1.2-11.48 10.2-20.74 20.83-24.47 17.9-7.06 38.75-3.1 55.66-13.18 5.16-2.3 9.28-9.48 4.36-14.1-2.16-1.76-5.9-5.75-3.7-.72.83 6.22-5.47 10.06-10.63 11.65-10.9 3.34-22.46 3-33.62 4.93-1.9.32-5.9 1.2-2.07-.6 10.52-5.02 23.57-4.38 32.6-12.5 4.8-3.75 2.77-11.16-2.4-13.4C57.4-.35 50.3-.35 43.63.35c-19.85 2.3-37.3 17.7-42.05 37.1C.52 41.57 0 45.77 0 49.97z"></path>
                                                </g>
                                            </svg>
                                        </li>
                                    @endif


                                    @isset($links['children'])
                                        @foreach($links['children'] as $name => $url)
                                            <li>
                                                <a href="{{$url}}">
                                                    {{ $name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endisset
                                </ul>
                            @endforeach


                        </div>
                    </div>
                    <div class="col-sm-3 col-12 text-sm-right font-arial text-center">

                        <ul class="list-inline">
                            <li class="hidden-xs">
                                <a href="https://github.com/orchidsoftware" target="_blank" title="GitHub">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="1.2em" height="1.2em" role="img" fill="currentColor">
                                        <path d="M4.956 16.331c-0.362 0-0.7-0.231-0.813-0.594-0.919-2.869-1.050-7.938 0.919-10.238-0.438-1.663-0.194-3.913 0.612-5.119 0.169-0.25 0.444-0.394 0.75-0.381 2.294 0.1 3.787 1.056 5.1 1.931 1.869-0.488 3.688-0.656 5.844-0.538 0.531 0.031 1.056 0.15 1.519 0.256 0.438 0.1 0.887 0.206 1.15 0.181 0.238-0.025 0.662-0.313 1.006-0.55 0.319-0.219 0.656-0.444 1.006-0.6 1-0.438 1.9-0.637 3.113-0.681 0.469-0.013 0.869 0.35 0.887 0.825s-0.35 0.869-0.825 0.881c-1.006 0.038-1.681 0.181-2.488 0.538-0.206 0.094-0.462 0.263-0.731 0.45-0.531 0.362-1.137 0.775-1.813 0.837-0.544 0.050-1.106-0.075-1.7-0.219-0.413-0.094-0.844-0.194-1.225-0.219-2.106-0.119-3.856 0.063-5.669 0.581-0.238 0.069-0.494 0.031-0.706-0.112l-0.213-0.144c-1.144-0.756-2.225-1.481-3.806-1.675-0.394 1.006-0.444 2.675-0.050 3.663 0.138 0.338 0.037 0.731-0.237 0.963-1.544 1.313-1.738 5.956-0.819 8.838 0.144 0.45-0.106 0.931-0.556 1.075-0.088 0.038-0.175 0.050-0.256 0.050zM11.456 24.769c-0.063 0-0.125-0.006-0.188-0.019-0.463-0.1-0.75-0.556-0.65-1.019l0.056-0.244c0.262-1.188 0.506-2.144 0.794-2.856-3.506-0.731-6.063-2.4-7.275-4.762-0.212-0.419-0.050-0.938 0.369-1.15s0.938-0.050 1.15 0.369c1.094 2.131 3.669 3.575 7.256 4.069 0.344 0.050 0.625 0.3 0.713 0.631 0.088 0.337-0.037 0.694-0.319 0.9-0.181 0.163-0.512 0.844-1.019 3.163l-0.056 0.25c-0.088 0.394-0.438 0.669-0.831 0.669zM9.881 31.025c-0.056 0-0.106-0.006-0.162-0.019-0.463-0.094-0.769-0.525-0.675-0.988 0.156-0.794 0.713-1.125 1.044-1.319 0.225-0.131 0.294-0.181 0.331-0.269 0.194-0.413 0.144-1.481 0.1-2.338-0.019-0.363-0.037-0.731-0.044-1.087-1.981 0.344-4.131 0.45-5.269-1.431-0.225-0.375-0.369-0.756-0.5-1.1-0.15-0.387-0.275-0.725-0.481-0.975-0.3-0.363-0.244-0.9 0.119-1.2s0.9-0.25 1.2 0.119c0.381 0.469 0.581 0.994 0.756 1.456 0.112 0.3 0.219 0.581 0.362 0.819 0.612 1.012 1.95 0.95 4.525 0.431 0.269-0.056 0.544 0.025 0.744 0.206 0.2 0.188 0.3 0.456 0.269 0.725-0.063 0.544-0.025 1.256 0.006 1.944 0.063 1.206 0.119 2.344-0.262 3.15-0.275 0.581-0.719 0.844-1.012 1.012-0.081 0.050-0.206 0.119-0.231 0.15-0.056 0.419-0.412 0.713-0.819 0.713zM22.306 30.862c-0.281 0-0.55-0.137-0.719-0.387-0.069-0.113-0.169-0.181-0.344-0.3-0.275-0.194-0.65-0.456-0.931-1-0.506-0.994-0.425-2.438-0.344-3.962 0.050-0.938 0.1-1.906-0-2.669-0.087-0.644-0.313-0.931-0.625-1.331-0.2-0.262-0.431-0.556-0.613-0.944-0.119-0.256-0.1-0.55 0.038-0.794 0.144-0.244 0.394-0.4 0.675-0.419 3.206-0.238 5.738-1.75 6.956-4.144 0.212-0.419 0.725-0.588 1.15-0.375 0.419 0.213 0.588 0.725 0.375 1.15-1.3 2.569-3.781 4.3-6.919 4.894 0.281 0.413 0.556 0.938 0.663 1.744 0.125 0.919 0.069 1.969 0.012 2.981-0.063 1.175-0.131 2.506 0.163 3.094 0.075 0.15 0.169 0.219 0.381 0.369 0.231 0.156 0.544 0.375 0.8 0.769s0.144 0.925-0.25 1.181c-0.144 0.1-0.306 0.144-0.469 0.144zM27.162 16.156c-0.075 0-0.156-0.012-0.231-0.031-0.456-0.131-0.719-0.6-0.587-1.056 0.944-3.319 0.3-7.631-1.35-9.037-0.269-0.231-0.369-0.6-0.25-0.931 0.4-1.144 0.131-2.862-0.325-3.9-0.188-0.431 0.006-0.938 0.438-1.125s0.938 0.006 1.125 0.438c0.525 1.188 0.869 3.056 0.525 4.613 2.038 2.25 2.438 7.050 1.481 10.412-0.113 0.375-0.45 0.619-0.825 0.619zM19.487 32.013c-0.156 0-0.319-0.044-0.462-0.137-0.156-0.1-0.625-0.4-1.494-1.75-0.394-0.613-0.681-3.662-0.856-9.075-0.012-0.469 0.356-0.869 0.825-0.881s0.869 0.356 0.881 0.825c0.113 3.544 0.375 7.563 0.613 8.25 0.637 0.988 0.938 1.188 0.95 1.194 0.394 0.256 0.512 0.781 0.256 1.181-0.156 0.256-0.431 0.394-0.712 0.394zM13.006 32.013c-0.281 0-0.556-0.137-0.719-0.394-0.256-0.394-0.137-0.925 0.256-1.181 0.012-0.006 0.313-0.206 0.95-1.194 0.238-0.681 0.494-4.706 0.613-8.25 0.012-0.469 0.412-0.844 0.881-0.825 0.469 0.012 0.844 0.413 0.825 0.881-0.175 5.413-0.463 8.469-0.856 9.075-0.869 1.344-1.338 1.65-1.494 1.75-0.137 0.094-0.3 0.137-0.456 0.137z"></path>
                                    </svg>

                                </a>
                            </li>

                            <li>
                                <a href="https://twitter.com/orchid_platform" target="_blank" rel="noopener noreferrer" title="Twitter">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="1.2em" height="1.2em" role="img" fill="currentColor">
                                        <path d="M21.387 4.959c1.652 0 3.144 0.676 4.195 1.762 1.308-0.253 2.54-0.714 3.648-1.352-0.428 1.301-1.34 2.393-2.525 3.083 1.16-0.136 2.27-0.434 3.301-0.88-0.773 1.117-1.745 2.1-2.868 2.886 0.011 0.239 0.017 0.479 0.017 0.719 0 7.366-5.782 15.863-16.354 15.863-3.245 0-6.268-0.926-8.809-2.507 0.449 0.052 0.906 0.079 1.37 0.079 2.692 0 5.172-0.89 7.139-2.387-2.517-0.043-4.641-1.657-5.369-3.87 0.351 0.066 0.711 0.101 1.082 0.101 0.522 0 1.032-0.067 1.512-0.195-2.629-0.511-4.611-2.764-4.611-5.467v-0.072c0.776 0.418 1.661 0.669 2.605 0.698-1.543-1.001-2.558-2.705-2.558-4.64 0-1.022 0.284-1.981 0.779-2.801 2.834 3.371 7.069 5.591 11.847 5.824-0.098-0.407-0.149-0.837-0.149-1.27 0-3.079 2.574-5.575 5.749-5.575zM30.006 7.572v0zM21.387 2.959c-3.927 0-7.18 2.869-7.681 6.576-3.213-0.646-6.135-2.346-8.235-4.842-0.381-0.454-0.942-0.713-1.531-0.713-0.052 0-0.104 0.002-0.157 0.006-0.643 0.052-1.223 0.41-1.556 0.962-0.698 1.157-1.066 2.482-1.066 3.833 0 0.902 0.162 1.779 0.469 2.601-0.327 0.364-0.515 0.839-0.515 1.341v0.072c0 1.959 0.774 3.777 2.061 5.139-0.074 0.343-0.058 0.702 0.055 1.046 0.444 1.349 1.251 2.512 2.298 3.398-0.703 0.157-1.428 0.235-2.169 0.235-0.392 0-0.773-0.021-1.133-0.066-0.080-0.010-0.159-0.014-0.238-0.014-0.84 0-1.603 0.529-1.885 1.337-0.31 0.885 0.034 1.866 0.83 2.361 2.954 1.838 6.366 2.808 9.866 2.808 11.376 0 18.219-8.905 18.352-17.605 0.931-0.771 1.754-1.662 2.451-2.661 0.254-0.334 0.405-0.751 0.405-1.203 0-0.681-0.34-1.282-0.859-1.644 0.224-0.769-0.032-1.603-0.657-2.111-0.365-0.297-0.813-0.448-1.262-0.448-0.344 0-0.689 0.088-0.999 0.268-0.661 0.381-1.368 0.683-2.113 0.9-1.347-1.014-3.017-1.578-4.732-1.578z"></path>
                                    </svg>

                                </a>
                            </li>

                            <li>
                                <a href="@yield('main.telegram')" target="_blank" rel="noopener noreferrer" title="Telegram">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="navbar-nav-svg" width="1.2em" height="1.2em" role="img" fill="currentColor">
                                        <path d="M28.784 3.226l-10.508 24.556-3.729-10.766-10.756-3.251zM31.389 0.024c-0.191 0-0.422 0.054-0.691 0.167l-29.833 12.659c-1.075 0.456-1.143 1.335-0.151 1.952l12.353 3.862 4.043 12.602c0.29 0.474 0.64 0.71 0.977 0.71 0.373 0 0.728-0.286 0.97-0.852l12.759-29.804c0.346-0.809 0.149-1.296-0.426-1.296z"></path>
                                    </svg>
                                </a>
                            </li>
                            
                                 <li>
                                <a href="https://discord.gg/aEVdGMyRt4" target="_blank" rel="noopener noreferrer" title="Discord">
                                 
                                    <svg width="1.2em" height="1.2em" role="img" fill="currentColor" viewBox="0 0 32 32" class="navbar-nav-svg" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0)">
<path d="M60.1045 4.8978C55.5792 2.8214 50.7265 1.2916 45.6527 0.41542C45.5603 0.39851 45.468 0.440769 45.4204 0.525289C44.7963 1.6353 44.105 3.0834 43.6209 4.2216C38.1637 3.4046 32.7345 3.4046 27.3892 4.2216C26.905 3.0581 26.1886 1.6353 25.5617 0.525289C25.5141 0.443589 25.4218 0.40133 25.3294 0.41542C20.2584 1.2888 15.4057 2.8186 10.8776 4.8978C10.8384 4.9147 10.8048 4.9429 10.7825 4.9795C1.57795 18.7309 -0.943561 32.1443 0.293408 45.3914C0.299005 45.4562 0.335386 45.5182 0.385761 45.5576C6.45866 50.0174 12.3413 52.7249 18.1147 54.5195C18.2071 54.5477 18.305 54.5139 18.3638 54.4378C19.7295 52.5728 20.9469 50.6063 21.9907 48.5383C22.0523 48.4172 21.9935 48.2735 21.8676 48.2256C19.9366 47.4931 18.0979 46.6 16.3292 45.5858C16.1893 45.5041 16.1781 45.304 16.3068 45.2082C16.679 44.9293 17.0513 44.6391 17.4067 44.3461C17.471 44.2926 17.5606 44.2813 17.6362 44.3151C29.2558 49.6202 41.8354 49.6202 53.3179 44.3151C53.3935 44.2785 53.4831 44.2898 53.5502 44.3433C53.9057 44.6363 54.2779 44.9293 54.6529 45.2082C54.7816 45.304 54.7732 45.5041 54.6333 45.5858C52.8646 46.6197 51.0259 47.4931 49.0921 48.2228C48.9662 48.2707 48.9102 48.4172 48.9718 48.5383C50.038 50.6034 51.2554 52.5699 52.5959 54.435C52.6519 54.5139 52.7526 54.5477 52.845 54.5195C58.6464 52.7249 64.529 50.0174 70.6019 45.5576C70.6551 45.5182 70.6887 45.459 70.6943 45.3942C72.1747 30.0791 68.2147 16.7757 60.1968 4.9823C60.1772 4.9429 60.1437 4.9147 60.1045 4.8978ZM23.7259 37.3253C20.2276 37.3253 17.3451 34.1136 17.3451 30.1693C17.3451 26.225 20.1717 23.0133 23.7259 23.0133C27.308 23.0133 30.1626 26.2532 30.1066 30.1693C30.1066 34.1136 27.28 37.3253 23.7259 37.3253ZM47.3178 37.3253C43.8196 37.3253 40.9371 34.1136 40.9371 30.1693C40.9371 26.225 43.7636 23.0133 47.3178 23.0133C50.9 23.0133 53.7545 26.2532 53.6986 30.1693C53.6986 34.1136 50.9 37.3253 47.3178 37.3253Z" fill="#ffffff"/>
</g>
<defs>
<clipPath id="clip0">
<rect width="71" height="55" fill="white"/>
</clipPath>
</defs>
</svg>
                                </a>
                            </li>
                        </ul>
                        <ul class="list-inline">
                            <a href="/en">English</a>
                            <span> / </span>
                            <a href="/ru">Russian</a>
                        </ul>

                    </div>
                </div>

            </div>

        </footer>
        <!-- / footer -->


    </div>


    @if ($page->production)
        <!-- Insert analytics code here -->

        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" async> (function (d, w, c) {
                (w[c] = w[c] || []).push(function () {
                    try {
                        w.yaCounter42925369 = new Ya.Metrika2({
                            id: 42925369,
                            clickmap: true,
                            trackLinks: true,
                            accurateTrackBounce: true,
                            webvisor: true,
                            trackHash: true
                        });
                    } catch (e) {
                    }
                });
                var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () {
                    n.parentNode.insertBefore(s, n);
                };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://mc.yandex.ru/metrika/tag.js";
                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else {
                    f();
                }
            })(document, window, "yandex_metrika_callbacks2"); </script>
        <noscript>
            <div><img src="https://mc.yandex.ru/watch/42925369" style="position:absolute; left:-9999px;" alt=""/></div>
        </noscript> <!-- /Yandex.Metrika counter -->


        <script async>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-39757298-4', 'auto');
            ga('send', 'pageview');
        </script>

    @endif

    <script src="{{ mix('js/app.js', 'assets/build') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script>
    <script type="text/javascript">
        if (window.document.getElementById('docsearch')) {
            docsearch({
                apiKey: 'afc2a7f7d4f201489dcd8c4f0f40bde2',
                indexName: 'orchid_software',
                inputSelector: '#docsearch',
                algoliaOptions: {'facetFilters': ["lang:" + document.documentElement.lang]},
                debug: true
            });

            document.addEventListener('keydown', (e) => {
                if (e.keyCode == 191) {
                    document.getElementById('docsearch').focus();
                    e.preventDefault()
                }
                if (e.keyCode == 27) {
                    document.getElementById('docsearch').blur();
                    e.preventDefault()
                }
            })

        }
    </script>

    </body>
</html>
