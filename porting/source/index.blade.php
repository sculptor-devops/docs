@extends('_layouts.master')

@section('body')
<section class="container max-w-6xl mx-auto px-6 py-10 md:py-12">
    <div class="flex flex-col-reverse mb-10 lg:flex-row lg:mb-24">
        <div class="mt-8">
            <h1 id="intro-docs-template">{{ $page->siteName }}</h1>

            <h2 id="intro-powered-by-jigsaw" class="font-light mt-4">{{ $page->siteDescription }}</h2>

            <p class="text-lg">Virtual Devops Automation for Web Developers. <br class="hidden sm:block">Install and manage your server automatically and easily.</p>

            <div class="flex my-10">
                <a href="/docs/getting-started" title="{{ $page->siteName }} getting started" class="bg-blue-500 hover:bg-blue-600 font-normal text-white hover:text-white rounded mr-4 py-2 px-6">Get Started</a>

                <a href="/docs/introduction" title="Jigsaw by Tighten" class="bg-gray-400 hover:bg-gray-600 text-blue-900 font-normal hover:text-white rounded py-2 px-6">Introduction</a>
            </div>
        </div>

        <img src="/assets/img/logo-large.svg" alt="{{ $page->siteName }} large logo" class="mx-auto mb-6 lg:mb-0 ">
    </div>

    <hr class="block my-8 border lg:hidden">

    <div class="md:flex -mx-2 -mx-4">
        <div class="mb-8 mx-3 px-2 md:w-1/3">
            <img src="/assets/img/icon-window.svg" class="h-12 w-12" alt="window icon">

            <h3 id="intro-laravel" class="text-2xl text-blue-900 mb-0">PHP Oriented</h3>

            <p>Zero downtime deploy, control all you need with simple commands.</p>
        </div>

        <div class="mx-3 px-2 md:w-1/3">
            <img src="/assets/img/icon-terminal.svg" class="h-12 w-12" alt="terminal icon">

            <h3 id="intro-mix" class="text-2xl text-blue-900 mb-0">Ready in minutes</h3>

            <p>Install an entire machine with PHP, Nginx, MySql, Redis with no action.</p>
        </div>

        <div class="mb-8 mx-3 px-2 md:w-1/3">
            <img src="/assets/img/icon-stack.svg" class="h-12 w-12" alt="stack icon">        

            <h3 id="intro-markdown" class="text-2xl text-blue-900 mb-0">Customizable</h3>

            <p>You can change the deploy pipeline and adapt to you workflow.</p>
        </div>        
    </div>

    <div class="md:flex -mx-2 -mx-4">
        <div class="mb-8 mx-3 px-2 md:w-1/3">
            <h3 id="intro-laravel" class="text-2xl text-blue-900 mb-0">Secure</h3>

            <p>Automated backup and security patch out of the box.</p>
        </div>

        <div class="mb-8 mx-3 px-2 md:w-1/3">
            <h3 id="intro-markdown" class="text-2xl text-blue-900 mb-0">Decentralized</h3>

            <p>You can control one or more machine with fluent api.</p>
        </div>

        <div class="mx-3 px-2 md:w-1/3">
            <h3 id="intro-mix" class="text-2xl text-blue-900 mb-0">Laravel</h3>

            <p>Your favourite framework is a first class citizen.</p>
        </div>
    </div>

</section>
@endsection
