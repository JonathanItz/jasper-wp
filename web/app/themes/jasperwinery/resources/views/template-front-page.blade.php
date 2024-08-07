{{--
    Template Name: Front Page
--}}

@extends('layouts.app')

<div class="relative">
    @if ($heading)
        <div class="absolute top-24 md:top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 ml1 text-center md:max-w-lg w-full">
            <span class="text-wrapper">
                <h1 class="letters inline text-gray-100 font-bold text-3xl md:text-4xl lg:text-7xl text-center leading-tight tracking-wider">
                    {{$heading}}
                </h1>
            </span>
        </div>
    @endif

    <div class="flex gap-y-4 gap-x-6 flex-col md:flex-row justify-between items-end absolute bottom-6 px-6 w-full">
        @if ($description)
            <div class="text-white md:max-w-lg w-full">
                <h2 class="text-gray-200 md:text-lg tracking-wide leading-snug">
                    {{$description}}
                </h2>
            </div>
        @endif

        @if ($link)
            <div class="">
                <a class="text-gray-800 rounded-full bg-white px-4 py-2 no-underline hover:opacity-80 transition-opacity flex gap-6 items-center text-sm font-medium" {{$link['target']}} href="{{$link['url']}}">
                    {{$link['title']}}

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 inline">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
            </div>
        @endif
    </div>

    {!!$image!!}
</div>