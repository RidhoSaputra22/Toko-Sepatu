<x-app>
    <x-navbar></x-navbar>

    @if(session('error'))
    <div class="p-3 bg-red-400">
        {{ session('error') }}
    </div>
    @endif
    <section class="p-14 min-h-screen flex gap-6">
        <div class="w-full grow bg-white shadow-md rounded-lg overflow-hidden p-5">
            <div class="text-2xl font-semibold ">Keranjang</div>
            <div class="m-5 min-h-screen">
                @forelse($datas['cart'] as $data)
                <div class="flex gap-3 py-3 border-b-2">
                    <div class="h-32 aspect-square bg-cover bg-center "
                        style="background-image: url('{{ URL::asset( $data->warna->foto_222121 ?? $data->produk->thumbnail_222121) }}')">
                    </div>
                    <div class="grow">
                        <div class="uppercase text-2xl ">{{ $data->produk['nama_222121'] }}</div>
                        <div class="text-lg">Rp. {{ number_format($data->produk['harga_222121'])}}</div>
                        <div class="text-sm">{{ $data['jumlah_222121']}}x</div>
                        <div class="text-sm">Stok: {{ $data->ukuran['stok_222121']}} pcs</div>
                        <input type="hidden" value="{{ $data['id_cart_222121'] }}" name="id">
                        @if($data->produk->ukuran->isNotEmpty())
                        <div class=" items-center flex gap-3 py-1">
                            @foreach ($data->produk->ukuran as $index => $ukuran)
                            <form action="" method="GET">
                                <div>
                                    <input type="text" class="mr-2" name="ukuran"
                                        value="{{$ukuran['id_ukuran_222121']}}" hidden>
                                    <input type="text" class="mr-2" name="warna"
                                        value="{{$data->warna['id_warna_222121']}}" hidden>
                                    <input type="text" class="mr-2" name="id" value="{{$data['id_cart_222121']}}"
                                        hidden>
                                    <input type="text" class="mr-2" name="produk" value="{{$data['id_produk_222121']}}"
                                        hidden>
                                    <button type="submit"
                                        class="text-gray-600 p-3  inline-block border {{ ($data->ukuran['id_ukuran_222121'] == $ukuran['id_ukuran_222121']) ? "border-red-600":"" }}">{{$ukuran['ukuran_222121']}}
                                    </button>
                                </div>
                            </form>
                            @endforeach
                        </div>
                        @endif
                        @if($data->produk->warna->isNotEmpty())
                        <div class=" items-center flex gap-3 py-1">
                            @foreach ($data->produk->warna as $index => $warna)
                            <form action="" method="GET">
                                <div>
                                    <input type="text" class="mr-2" name="warna" value="{{$warna['id_warna_222121']}}"
                                        hidden>
                                    <input type="text" class="mr-2" name="ukuran"
                                        value="{{$data->ukuran['id_ukuran_222121']}}" hidden>
                                    <input type="text" class="mr-2" name="id" value="{{$data['id_cart_222121']}}"
                                        hidden>
                                    <input type="text" class="mr-2" name="produk" value="{{$data['id_produk_222121']}}"
                                        hidden>
                                    <button type="submit" style="background-color: {{$warna['warna_222121']}};"
                                        class="text-gray-600 p-3  inline-block border {{ ($data->warna['id_warna_222121'] == $warna['id_warna_222121']) ? "border-red-600":"" }}">
                                    </button>
                                </div>
                            </form>
                            @endforeach
                        </div>
                        @endif
                        <div class="flex gap-2 pt-2 text-white">
                            <a href="/addFormCart/{{ $data['id_cart_222121'] }}" class="bg-yellow-500 px-3 ">+</a>
                            <a href="/DelFormCart/{{ $data['id_cart_222121'] }}" class="bg-red-500 px-3 ">-</a>
                        </div>
                    </div>
                    <div class="flex flex-col ">
                        <div class="grow text-end">
                            <a href="/DestroyFormCart/{{ $data['id_cart_222121'] }}"
                                class="bg-red-500 px-3 text-white">X</a>
                        </div>
                        <div class="text-xl font-semibold">Total: Rp. {{ number_format($data['total_222121']) }}</div>
                    </div>
                </div>
                @empty
                <div>
                    <h1>Tak ada data</h1>
                </div>
                @endforelse


            </div>


        </div>
        <div class="w-8/12 bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-5">
                <h1 class="text-xl font-semibold mb-6">Detail Order</h1>
            </div>
            <div class="px-5 flex flex-col gap-5">
                @csrf
                <div class="">
                    <h1>Nama</h1>
                    <input type="text" name="nama" class="border w-full p-2" value="{{Auth::user()['nama_222121']}}">
                </div>
                <div class="">
                    <h1>Alamat</h1>
                    <input type="text" name="alamat" class="border w-full p-2"
                        value="{{Auth::user()['alamat_222121']}}">
                </div>

                <div class="">
                    <h1>{{$datas['discount']->count('id_discount_222121')}} Voucher Tersedia</h1>
                    <form action="" method="GET" class="flex gap-3">
                        <select name="discount" id="" class="w-full p-2 uppercase border">
                            @forelse($datas['discount'] as $data)
                            <option value="{{ $data['kode_222121'] }}" class="p-2">
                                {{ $data['kode_222121'] }} - {{ $data['discount_222121'] }}
                            </option>
                            @empty
                            <option value="">Tidak ada voucher</option>
                            @endforelse
                        </select>
                        <button class="p-2 bg-yellow-500">Submit</button>
                    </form>
                </div>

                <form action="/getToken" method="GET" enctype="multipart/form-data">

                    @if($discount != null)
                    <p class="p-1 bg-green-400 my-2">Selamat Anda Mendapatkan Diskon!!</p>
                    <div class="text-xl  pt-2">
                        <h1 class="text-xl">Harga Awal: {{number_format($datas['cart']->sum('total_222121'))}}</h1>
                        <h1>Diskon: {{$discount['discount_222121'] ?? 0}}%</h1>
                        <h1 class="text-3xl">Total: {{number_format($datas['total'])}}</h1>
                    </div>
                    @else
                    <div class="text-xl font-bold pt-2">
                        Total: {{number_format($datas['cart']->sum('total_222121'))}}
                    </div>
                    @endif


                    <div class="py-5 flex justify-end">
                        <input type="hidden" name="total" value="{{ $datas['total'] }}">
                        <a href="/" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Lanjutkan Belanja
                        </a>
                        <button class="bg-yellow-500 py-2 px-3 rounded ml-4">
                            Selesaikan Pembelian
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </section>
    @if (session('token'))
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-ObID6qlSaz-_VuGA">
    </script>
    <script type="text/javascript">
    snap.pay('{{session('
        token ')}}', {
            // Optional
            onSuccess: function(result) {
                window.location.href = 'http://127.0.0.1:8000/checkout';
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    </script>

    @endif

    <x-footter></x-footter>

</x-app>