<x-app>
    <x-navbar></x-navbar>
    <!-- Detail Produk -->
    <section class="py-24">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Gambar Produk -->
                <div class="md:w-1/2 h">
                    <div class="bg-white p-4 rounded-lg shadow h-full bg-cover bg-center bg-no-repeat bg-contain"
                        style="background-image: url('{{ URL::asset($datas->warna[$request->warna]['foto_222121'] ?? $datas['thumbnail_222121']) }}');">


                    </div>
                </div>

                <!-- Informasi Produk -->
                <div class="md:w-1/2">
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $datas['nama_222121'] }}</h1>
                    <div class="flex items-center mb-4">

                    </div>
                    <p class="text-3xl font-bold text-cappucino-600 mb-4">Rp
                        {{ number_format($datas['harga_222121']) }}</p>
                    <p class="text-gray-600 mb-6">{{ $datas['deskripsi_222121'] }}</p>


                    <div class="mb-6">
                        <h3 class="font-semibold text-gray-800 mb-2">Ukuran Tersedia</h3>
                        <div class="flex items-center gap-3">

                            @foreach ($datas->ukuran as $index => $data)
                            <div class=" items-center">
                                <form action="" method="GET">
                                    <input type="text" class="mr-2" name="ukuran" value="{{$index}}" hidden>
                                    <input type="text" class="mr-2" name="warna" value="{{$request->warna}}" hidden>

                                    <button type="submit" class="text-gray-600 p-3 border 
                                        {{ ( ($request->ukuran ?? old('ukuran')) == $index) ? "border-red-600":"" }}
                                        ">{{$data['ukuran_222121']}}</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-6">
                        <h3 class="font-semibold text-gray-800 mb-2">Warna Tersedia</h3>
                        <div class="flex items-center gap-3">

                            @foreach ($datas->warna as $index => $data)
                            <div class=" items-center">
                                <form action="" method="GET">
                                    <input type="text" class="mr-2" name="warna" value="{{$index}}" hidden>
                                    <input type="text" class="mr-2" name="ukuran" value="{{$request->ukuran}}" hidden>


                                    <button type="submit" class="text-gray-600 p-3 border 
                                        {{ ($request->warna == $index) ? "border-red-600":"" }}
                                        " style="background-color: {{$data['warna_222121']}};"></button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <form action="/addToCart/{{$datas['id_produk_222121']}}" method="GET">
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-800 mb-2">Jumlah</h3>
                            <div class="flex items-center gap-3">

                                <input type="number" name="jumlah" min="1"
                                    max="{{ $datas->ukuran[$request->ukuran]['stok_222121'] ?? $datas->ukuran[0]['stok_222121'] }}"
                                    value="1"
                                    class="quantity-input w-20 text-center border-y border-gray-200 py-2 focus:outline-none">
                                <input type="number" name="ukuran"
                                    value="{{ $datas->ukuran[$request->ukuran]['id_ukuran_222121'] ??  $datas->ukuran[0]['id_ukuran_222121'] }}"
                                    hidden>
                                <input type="number" name="warna"
                                    value="{{ $datas->warna[$request->warna]['id_warna_222121'] ??  $datas->warna[0]['id_warna_222121'] }}"
                                    hidden>

                            </div>
                        </div>

                        <div class="flex gap-4 mb-8">
                            <button type="submit"
                                class="flex-1 bg-cappucino text-white py-3 px-6 rounded-lg hover:bg-cappucino-700 transition duration-300">
                                Tambah ke Keranjang
                            </button>
                        </div>

                        <div class="border-t pt-6">
                            <h3 class="font-semibold text-gray-800 mb-4">Informasi Produk</h3>
                            <div class="space-y-2">
                                <p class="flex justify-between text-sm">
                                    <span class="text-gray-600">Stok</span>
                                    <span
                                        class="text-gray-800">{{ $datas->ukuran[$request->ukuran]['stok_222121'] ?? $datas->ukuran[0]['stok_222121'] }}
                                        pcs</span>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <x-footter></x-footter>

</x-app>