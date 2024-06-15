<!-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

</html>

<head>
    <title>{{ __('The Golden Dragon') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: darkred;
            margin: 15px 50px;
        }

        @font-face {
            font-family: 'chinese_takeawayregular';
            src: url('/fonts/chinesetakeaway-webfont.woff2') format('woff2'),
                url('/fonts/chinesetakeaway-webfont.woff') format('woff');
            font-weight: normal;
            font-style: normal;
        }

        a {
            text-decoration: none;
            color: yellow;
        }
    </style>
</head> -->
@extends('layouts.app')

@php
    echo __('messages.test');
@endphp

@section('content')

<body>
    <div class="flex items-center justify-between bg-red-700 py-3 px-5">
        <div class="flex items-center text-yellow-500 text-2xl">
            <img class="h-12" src="/images/dragon-small.png" alt="Golden Dragon">
            <span class="font-chinese_takeawayregular ml-2">{{ __('messages.test') }}</span>
            <img class="h-12 ml-2" src="/images/dragon-small-flipped.png" alt="Golden Dragon">
        </div>
        <a href="paginas/aanbiedingen.html" class="font-bold">
            <marquee behavior="scroll" direction="left">
                {{ __('Welkom bij De Gouden Draak. Klik op deze tekst om de aanbiedingen van deze week te zien!') }}
            </marquee>
        </a>
        <div class="flex items-center text-yellow-500 text-2xl">
            <img class="h-12" src="/images/dragon-small.png" alt="Golden Dragon">
            <span class="font-chinese_takeawayregular ml-2">{{ __('De Gouden Draak') }}</span>
            <img class="h-12 ml-2" src="/images/dragon-small-flipped.png" alt="Golden Dragon">
        </div>
    </div>

    <div class="flex justify-center bg-red-700 py-1">
        <div class="flex w-full max-w-5xl border-t-4 border-b-4 border-l-4 border-r-4 border-yellow-500"></div>
    </div>

    <div class="flex justify-center bg-red-700 py-1">
        <div class="flex w-full max-w-5xl border-4 border-yellow-500"></div>
    </div>

    <div class="flex justify-center bg-red-700 py-1">
        <div class="flex w-full max-w-5xl border-4 border-yellow-500"></div>
    </div>

    <div class="flex justify-center bg-red-700 py-3">
        <div class="w-full max-w-5xl text-center text-yellow-500">
            <img class="float-left h-48" src="/images/dragon-small.png" alt="Golden Dragon">
            <img class="float-right h-48" src="/images/dragon-small-flipped.png" alt="Golden Dragon">
            <h1 class="text-4xl font-bold">{{ __('Chinees Indische Specialiteiten') }}</h1>
            <h2 class="text-5xl font-bold">{{ __('De Gouden Draak') }}</h2>
            <div class="flex justify-center mt-5">
                <a href="paginas/MENUKAART.html"
                    class="mx-2 text-xl text-white bg-red-800 py-2 px-4 rounded-lg">{{ __('Menukaart') }}</a>
                <a href="paginas/news.html"
                    class="mx-2 text-xl text-white bg-red-800 py-2 px-4 rounded-lg">{{ __('Nieuws') }}</a>
                <a href="paginas/contact.html"
                    class="mx-2 text-xl text-white bg-red-800 py-2 px-4 rounded-lg">{{ __('Contact') }}</a>
            </div>
        </div>
    </div>

    <div class="flex justify-center bg-red-700 py-10">
        <div class="w-full max-w-4xl text-center bg-floralwhite border border-black p-5 rounded-lg bg-white">
            <h3 class="text-2xl">
                {{ __('Al jaren is De Gouden Draak een begrip als het gaat om de beste afhaalgerechten in \'s-Hertogenbosch. Graag trakteren we u op authentieke gerechten uit de Cantonese keuken.') }}
            </h3>
            <h2 class="text-3xl font-bold underline mt-5">{{ __('Speciale Studentenaanbieding') }}</h2>
            <h1 class="text-4xl font-bold">{{ __('Chinese Rijsttafel (2 personen)') }}</h1>
            <h3 class="text-2xl mt-5">
                {{ __('Maak een keuze uit 3 van onderstaande keuzegerechten:') }}
                <div class="flex justify-around mt-5 text-xl">
                    <div>{{ __('Koe Loe Yuk') }}</div>
                    <div>{{ __('Foe Yong Hai') }}</div>
                </div>
                <div class="flex justify-around mt-2 text-xl">
                    <div>{{ __('Tjap Tjoy') }}</div>
                    <div>{{ __('Garnalen met Gebakken Knoflook') }}</div>
                </div>
                <div class="flex justify-around mt-2 text-xl">
                    <div>{{ __('Babi Pangang') }}</div>
                    <div>{{ __('Kipfilet in Zwarte Bonen saus') }}</div>
                </div>
                <div class="mt-5">{{ __('Met witte rijst. (Nasi of bami voor meerprijs mogelijk.)') }}</div>
            </h3>
            <h1 class="text-4xl font-bold mt-5">{{ __('Prijs: €21,00') }}</h1>
        </div>
    </div>

    <div class="flex justify-center py-5">
        <a href="paginas/contact_new.html" class="text-yellow-500 text-xl">{{ __('Naar Contact') }}</a>
    </div>

    <div class="flex justify-center py-5">
        <!-- call a post request to the route with name 'language.change' and add a button with the nl parameter and the en parameter in the route -->
        <!-- Make sure that the route has the "locale" parameter -->

        <form action="{{ route('language.change') }}" method="POST">
            @csrf
            <button type="submit" name="locale" value="nl"
                class="text-yellow-500 text-xl">{{ __('Nederlands') }}</button>
            <button type="submit" name="locale" value="en" class="text-yellow-500 text-xl">{{ __('English') }}</button>
        </form>
    </div>
</body>

</html>
@endsection