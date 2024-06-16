@extends('layouts.app')

@section('title', 'Identificeer tablet')

@section('content')
<div class="flex flex-col justify-center items-center h-screen w-full bg-gray-200 text-gray-800">
    @if (session('error'))
        <div class="bg-red-500 p-4 rounded-md mb-6 text-white text-center text-xl">
            {{ session('error') }}
        </div>
    @endif
    <section class="bg-white p-6 rounded-md shadow-sm">
        <h1 class="font-bold text-2xl">Identificeer tablet</h1>
        <form method="POST" action="{{ route('tablet.identify.store') }}" class="flex flex-col">
            @csrf
            <input type="text" id="tablet" name="tablet" placeholder="tafel sleutel"
                class="p-4 mt-6 border-2 rounded-sm text-2xl">
            <button type="submit"
                class="self-end text-2xl uppercase font-medium bg-green-500 mt-6 py-4 px-6 rounded-md hover:bg-green-400">
                Identificeer
            </button>
        </form>
    </section>
</div>
@endsection