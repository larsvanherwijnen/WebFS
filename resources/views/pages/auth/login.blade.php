@extends('layouts.auth')

@section('title', 'Inloggen')

@section('content')
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:py-0 w-full">
        <a href="{{route('home')}}" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
            <img src="{{ asset('images/dragon-large.png') }}" alt="Logo"
                 class="w-36 object-contain">
        </a>
        <div class="w-full bg-white rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0 ">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                    Inloggen
                </h1>

                @error('email')
                <p class="text-red-500">{{__('auth.failed')}}</p>
                @enderror
                <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="post">
                    @csrf
                    <div>
                        <label for="email"
                               class=" mb-2 text-sm font-medium text-gray-900 ">Email</label>
                        <input type="email" name="email" id="email"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  w-full p-2.5"
                               placeholder="johndoe@example.com" required="" value="{{old('email')}}">
                    </div>
                    <div>
                        <label for="password"
                               class=" mb-2 text-sm font-medium text-gray-900">Wachtwoord</label>
                        <input type="password" name="password" id="password"
                               placeholder="*********"
                               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg  w-full p-2.5 "
                               required="">
                    </div>

                    <button type="submit"
                            class="w-full text-white bg-green-500 hover:bg-primary-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Inloggen</button>
                </form>
            </div>
        </div>
    </div>
@endsection
