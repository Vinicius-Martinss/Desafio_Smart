

{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('header')
    {{-- Se quiser um título ou breadcrumbs, coloque aqui --}}
@endsection

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-[#FDFDFC] dark:bg-[#0a0a0a] p-6 lg:p-8">
        <h1 class="text-3xl font-semibold mb-6 text-[#1b1b18] dark:text-[#EDEDEC]">
            Bem-vindo ao meu site!
        </h1>

        {{-- Aqui você pode colocar qualquer conteúdo fixo da home --}}
        <p class="mb-4 text-center text-[#1b1b18] dark:text-[#EDEDEC]">
            Esta é a sua landing page. Se estiver deslogado, verá apenas “Log in” e “Register”.  
            Quando se registrar/logar, o menu completo do Jetstream aparecerá automaticamente.
        </p>

        {{-- Exemplo de botão que só aparece para guests --}}
        @guest
            <div class="space-x-4">
                <a href="{{ route('login') }}" class="underline">Log in</a>
                <a href="{{ route('register') }}" class="underline">Register</a>
            </div>
        @endguest
    </div>
@endsection
