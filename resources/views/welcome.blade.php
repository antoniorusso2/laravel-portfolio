<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite('resources/css/app.css', 'resources/js/app.js')
        <title>Benvenuto</title>
    </head>

    <body>
        <header class="w-full text-sm mb-6 not-has-[nav]:hidden my-4">
            <div class="container">
                @if (Route::has('login'))
                    <nav class="flex items-center justify-end gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn special inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] rounded-sm text-sm leading-normal">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class=" btn special inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border text-sm leading-normal">
                                Log In
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn special inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] rounded-sm text-sm leading-normal">
                                    Registrati
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </header>
        <div class="main flex-grow">
            <div class="container">
                <h1 class="text-3xl text-center my-4">Benvenuto</h1>
                <div class="description">

                </div>
            </div>
        </div>
    </body>

</html>
