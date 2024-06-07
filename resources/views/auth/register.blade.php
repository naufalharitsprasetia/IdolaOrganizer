<!doctype html>
<html class="h-full ">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/logoy.png" type="image/png">
    <link rel="stylesheet" href="/css/style.css ">
    <title>Idola Organizer</title>
</head>

<body class="h-full">
    {{-- Back Button --}}
    <a href="/" class="absolute top-5 left-3 button-secondary">Kembali</a>
    {{-- Back Button --}}
    <div class="flex min-h-full flex-col justify-center px-6 py-8 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-16 w-auto" src="/img/logoy.png" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-third">Buat Akun baru
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-2" action="" method="POST">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-third">Nama Lengkap</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" autocomplete="name" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 @error('name')
                                input-wrong
                            @enderror placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fourth sm:text-sm sm:leading-6"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="label-error">
                                error : {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                {{-- <div>
                    <label for="daerah" class="block text-sm font-medium leading-6 text-gray-900">Asal</label>
                    <div class="mt-2">
                        <input id="daerah" name="daerah" type="daerah" autocomplete="daerah" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div> --}}

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-third">Alamat Email</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 @error('email')
                                input-wrong
                            @enderror placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fourth sm:text-sm sm:leading-6"
                            value="{{ old('email') }}">
                        @error('email')
                            <div class="label-error">
                                error : {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-third">Password</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 @error('password')
                                input-wrong
                            @enderror placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-fourth sm:text-sm sm:leading-6">
                        @error('password')
                            <div class="label-error">
                                error : {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-fourth px-3 py-1.5 text-sm font-semibold leading-6 text-primary shadow-sm hover:bg-fourth focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-fourth">Daftar</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm text-third">
                Sudah punya akun ?
                <a href="/login" class="font-semibold leading-6 text-fourth hover:text-fourth">Masuk
                    Disini</a>
            </p>
        </div>
    </div>
    {{-- Script / JS --}}
    <script src="/js/script.js"></script>
</body>

</html>
