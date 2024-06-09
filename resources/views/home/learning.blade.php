@extends('layouts.main')

@section('content')
    <!-- Section 1: Blog -->
    <section class="py-8 px-12 bg-third">
        <div class="container mx-auto">
            <h2 class="text-xl font-bold mb-4">Artikel Blog</h2>
            <div class="grid md:grid-cols-3 gap-4">
                <!-- Blog Item 1 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Manfaat Berorganisasi" class="w-full h-32 object-cover">
                    <div class="p-3">
                        <h3 class="text-base font-semibold mb-1">Manfaat Berorganisasi</h3>
                        <p class="text-gray-600 mb-2 text-sm">Temukan berbagai manfaat bergabung dengan organisasi dan
                            bagaimana hal ini bisa membantu perkembangan personal dan profesional Anda.</p>
                        <a href="https://greatnusa.com/artikel/manfaat-organisasi/" target="_blank"
                            class="text-blue-500 hover:underline text-sm">Baca Selengkapnya</a>
                    </div>
                </div>
                <!-- Blog Item 2 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Cara Mengelola Organisasi" class="w-full h-32 object-cover">
                    <div class="p-3">
                        <h3 class="text-base font-semibold mb-1">Cara Mengelola Organisasi</h3>
                        <p class="text-gray-600 mb-2 text-sm">Pelajari tips dan trik dalam mengelola organisasi agar lebih
                            efektif dan efisien.</p>
                        <a href="https://www.halopedeka.com/analisis/5768697985/strategi-efektif-yang-baik-dalam-mengelola-organisasi"
                            target="_blank" class="text-blue-500 hover:underline text-sm">Baca Selengkapnya</a>
                    </div>
                </div>
                <!-- Blog Item 3 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="https://plus.unsplash.com/premium_photo-1661768301831-db643467dff5?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Mengatasi Konflik dalam Organisasi" class="w-full h-32 object-cover">
                    <div class="p-3">
                        <h3 class="text-base font-semibold mb-1">Mengatasi Konflik dalam Organisasi</h3>
                        <p class="text-gray-600 mb-2 text-sm">Konflik adalah hal yang biasa dalam organisasi. Pelajari cara
                            mengatasinya dengan bijak.</p>
                        <a href="https://greatnusa.com/artikel/cara-mengatasi-konflik-dalam-organisasi/" target="_blank"
                            class="text-blue-500 hover:underline text-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 2: Studi Kasus -->
    <section class="py-8 px-12 bg-fourth">
        <div class="container mx-auto">
            <h2 class="text-xl font-bold mb-4">Studi Kasus</h2>
            <div class="grid md:grid-cols-2 gap-4">
                <!-- Case Study 1 -->
                <div class="bg-white shadow-md rounded-lg p-3">
                    <h3 class="text-base font-semibold mb-1">Organisasi XYZ</h3>
                    <p class="text-gray-600 text-sm mb-2">Organisasi XYZ berhasil mengelola tim dengan baik sehingga
                        mencapai tujuan mereka dengan efektif. Pelajari langkah-langkah yang mereka ambil untuk mencapai
                        kesuksesan ini.</p>
                    <a href="https://www.hrd-forum.com/inhouse-training-studi-kasus-dan-cerita-sukses-dalam-meningkatkan-keterampilan-karyawan-dan-kesuksesan-organisasi/"
                        target="_blank" class="text-blue-500 hover:underline text-sm">Baca Selengkapnya</a>
                </div>
                <!-- Case Study 2 -->
                <div class="bg-white shadow-md rounded-lg p-3">
                    <h3 class="text-base font-semibold mb-1">Organisasi ABC</h3>
                    <p class="text-gray-600 text-sm mb-2">Melalui manajemen konflik yang baik, Organisasi ABC berhasil
                        menjaga keharmonisan tim dan mencapai target mereka. Pelajari strategi yang mereka gunakan.</p>
                    <a href="https://www.hrd-forum.com/inhouse-training-studi-kasus-dan-cerita-sukses-dalam-meningkatkan-keterampilan-karyawan-dan-kesuksesan-organisasi/"
                        target="_blank" class="text-blue-500 hover:underline text-sm">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 3: Tips Berorganisasi -->
    <section class="py-8 px-12 bg-third">
        <div class="container mx-auto">
            <h2 class="text-xl font-bold mb-4">Tips Berorganisasi</h2>
            <div class="grid md:grid-cols-3 gap-4">
                <!-- Tip 1 -->
                <div class="bg-gray-50 shadow-md rounded-lg p-3">
                    <h3 class="text-base font-semibold mb-1">Komunikasi Efektif</h3>
                    <p class="text-gray-600 text-sm mb-2">Pastikan setiap anggota tim memiliki akses ke informasi yang
                        dibutuhkan dan dorong komunikasi terbuka.</p>
                </div>
                <!-- Tip 2 -->
                <div class="bg-gray-50 shadow-md rounded-lg p-3">
                    <h3 class="text-base font-semibold mb-1">Delegasi Tugas</h3>
                    <p class="text-gray-600 text-sm mb-2">Bagikan tugas secara merata dan sesuai dengan kemampuan
                        masing-masing anggota tim untuk mencapai hasil terbaik.</p>
                </div>
                <!-- Tip 3 -->
                <div class="bg-gray-50 shadow-md rounded-lg p-3">
                    <h3 class="text-base font-semibold mb-1">Manajemen Waktu</h3>
                    <p class="text-gray-600 text-sm mb-2">Buat jadwal yang realistis dan tetaplah fleksibel untuk
                        menyesuaikan perubahan yang mungkin terjadi.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
