@extends('_layouts.master')

@section('nav-toggle')
    @include('_nav.menu-toggle')
@endsection

@section('body')
<section class="container max-w-8xl mx-auto px-6 md:px-8 py-4">
    <div class="flex flex-col lg:flex-row">
        <nav id="js-nav-menu" class="nav-menu hidden lg:block">
            <ul class="my-0">
                <li class="pl-4">
                    <a href="#" target="_blank" class="nav-menu__item bg-orange-600 rounded-md text-white p-2">
                        <i class="fab fa-exclamation fa"></i> This product is in <b>BETA</b> stage
                    </a>
                </li>        
            </ul>
            @include('_nav.menu', ['items' => $page->navigation])
        </nav>

        <div class="DocSearch-content w-full lg:w-3/5 break-words pb-16 lg:pl-4" v-pre>
            @yield('content')
        </div>
    </div>
</section>
@endsection
