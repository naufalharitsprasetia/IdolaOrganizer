@extends('layouts.main')

@section('content')
    <div class="isolate px-6 py-12 sm:py-16 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Hubungi Kami</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">untuk informasi lebih lanjut silahkan hubungi kami !</p>
        </div>
        {{-- Form --}}
        <form action="" onsubmit="generateWhatsAppLink(event)" class="mx-auto mt-16 max-w-xl sm:mt-10">
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div class="sm:col-span-2">
                    <label for="nameContact" class="block text-sm font-semibold leading-6 text-gray-900">Nama Lengkap</label>
                    <div class="mt-2.5">
                        <input type="nameContact" name="nameContact" id="nameContact" autocomplete="name"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="emailContact" class="block text-sm font-semibold leading-6 text-gray-900">Alamat
                        Email</label>
                    <div class="mt-2.5">
                        <input type="emailContact" name="emailContact" id="emailContact" autocomplete="email"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="phoneNumberContact" class="block text-sm font-semibold leading-6 text-gray-900">Nomer
                        Handphone</label>
                    <div class="relative mt-2.5">
                        <input type="number" name="phoneNumberContact" id="phoneNumberContact" autocomplete="tel"
                            class="block w-full rounded-md border-0 px-3.5 py-2  text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-600 sm:text-sm sm:leading-6">
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <label for="pesanContact" class="block text-sm font-semibold leading-6 text-gray-900">Pesan</label>
                    <div class="mt-2.5">
                        <textarea name="pesanContact" id="pesanContact" rows="4"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-yellow-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                </div>

            </div>
            <div class="mt-10">
                <button type="submit"
                    class="shadow-lg block w-full rounded-md bg-yellow-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">Kirim</button>
            </div>
        </form>
    </div>
    <script>
        // WHATSAPP
        function generateWhatsAppLink(event) {
            event.preventDefault();
            const nama = document.getElementById("nameContact").value;
            const email = document.getElementById("emailContact").value;
            const nomorHp = document.getElementById("phoneNumberContact").value;
            const pesan = document.getElementById("pesanContact").value;
            const whatsappMessage =
                `Halo nama saya "${nama}" | Nomor hp: "${nomorHp}" | Email: "${email}" | Pesan: "${pesan}"`;
            const whatsappLink = `https://api.whatsapp.com/send?phone=6281220594202&text=${encodeURIComponent(
        whatsappMessage
        )}`;
            window.open(whatsappLink, "_blank");
        }
    </script>
@endsection
