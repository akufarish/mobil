@extends("layout.home")

@section("content")
    <main class="flex flex-col">
        <div class="w-screen h-[400px]">
            <img src="img/hero.png" class="w-full h-full" alt="">
        </div>
        <div class="bg-gray-200 flex flex-col text-center p-12 gap-6 justify-center items-center">
            <h3 class="font-bold uppercase">
                Tentang kami
            </h3>
            <p class="">
                Thoyyib Travel adalah layanan transportasi travel yang menyediakan layanan antar jemput penumpang antar
                kota, antar provinsi, atau untuk tujuan tertentu. Layanan ini dirancang untuk memberikan kenyamanan,
                keamanan, dan efisiensi perjalanan bagi individu atau kelompok yang membutuhkan transportasi yang handal
                dengan harga yang bersaing.
            </p>
            <h3 class="font-bold uppercase">Layanan kami</h3>
            <div class="grid gap-6 grid-cols-2 grid-rows-3">
                <div class="flex gap-2 items-center">
                    <div class="w-5 h-5 flex justify-center items-center bg-green-500">
                        <span class="text-white">&check;</span>
                    </div>
                    <span class="">Jasa Pick Up Barang</span>
                </div>
                <div class="flex gap-2 items-center">
                    <div class="w-5 h-5 flex justify-center items-center bg-green-500">
                        <span class="text-white">&check;</span>
                    </div>
                    <span class="">Jasa Sewa Mobil Harian</span>
                </div>
                <div class="flex gap-2 items-center">
                    <div class="w-5 h-5 flex justify-center items-center bg-green-500">
                        <span class="text-white">&check;</span>
                    </div>
                    <span class="">Jasa Antar Jemput Dalam/Luar Kota</span>
                </div>
                <div class="flex gap-2 items-center">
                    <div class="w-5 h-5 flex justify-center items-center bg-green-500">
                        <span class="text-white">&check;</span>
                    </div>
                    <span class="">Jasa Charter Pribadi</span>
                </div>
                <div class="flex gap-2 items-center">
                    <div class="w-5 h-5 flex justify-center items-center bg-green-500">
                        <span class="text-white">&check;</span>
                    </div>
                    <span class="">Jasa Antar Jemput Bandara</span>
                </div>
                <div class="flex gap-2 items-center">
                    <div class="w-5 h-5 flex justify-center items-center bg-green-500">
                        <span class="text-white">&check;</span>
                    </div>
                    <span class="">Jasa Antar Jemput Keliling Wisata</span>
                </div>
            </div>
        </div>
        <div class="w-full flex flex-col gap-6 p-12 text-center">
            <h3 class="font-bold uppercase">ARMADA KAMI</h3>
            <p class="">Berkomitmen memberikan pelayanan maksimal pada anda. Mulai dari menyediakan armada kendaraan
                yang variatif, bersih, layak pakai dan siap mendukung perjalanan anda. Berikut beberapa armada kami:
            </p>
            <div class="grid grid-cols-4">
                @foreach($mobil as $mobil)
                    <div class="flex p-6 max-w-md rounded-md">
                        <div class="flex flex-col gap-5">
                            <img src="{{ asset("storage/{$mobil->gambar}") }}" alt="" class="w-[180px] h-[106px]">
                            <h1 class="font-bold">{{$mobil->merk}}</h1>
                            <a href="" class="px-6 py-2 rounded-md flex justify-center items-center bg-green-500 text-white">Pesan Via WhatsApp</a>
                            <a href="" class="px-6 py-2 rounded-md flex justify-center items-center bg-blue-500 text-white">Pesan Via Telpon</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
