@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
   @stop

@section('content')
<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">


        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            <div class="container">
                {{ $slot }}
            </div>
        </main>
    </div>

    @stack('modals')

</body>
@stop

@section('css')

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles
@stop

@section('js')
    <script src="{{ mix('js/app.js') }}" defer></script>
    
    <script type="text/javascript">
        window.livewire.on('userStore', () => {
            $('#exampleModal').modal('hide');
        });
    </script>
@stop

