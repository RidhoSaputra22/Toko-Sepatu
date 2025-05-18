<x-app>
    <x-navbar></x-navbar>
    <div class="max-w-6xl mx-auto py-32 min-h-screen">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Riwayat Pembelian</h1>
            <p class="text-gray-600">Daftar transaksi pembelian Anda</p>
        </div>

       
        <!-- Purchase History List -->
        <div class="space-y-4">
            @foreach ($datas as $data )
            
            <!-- Purchase Item 1 -->
            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-lg font-semibold">#{{ $data['kode_222121'] }}</p>
                        <p class="text-sm text-gray-500">{{ $data['created_at'] }}</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">
                        {{$data['status_222121']}}
                    </span>
                </div>
                <div class="mt-4">
                    <div class="flex items-center gap-4">
                        <img src="{{ $data->warna['foto_222121'] ?? $data->produk['thumbnail_222121']}}" alt="Product" class="w-20 h-20 rounded-lg object-cover">
                        <div>
                            <p class="font-medium">S{{$data->produk['nama_222121']}}</p>
                            <p class="text-gray-600">{{$data['jumlah_222121']}} x Rp {{number_format($data->produk['harga_222121'])}}</p>
                            <p class="text-gray-600">Ukuran: {{$data->ukuran['ukuran_222121']}} </p>
                            <div class="flex my-3 gap-3">
                                <div class="border p-2 " style="background-color: {{ $data->warna['warna_222121'] }} ;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t">
                    <div class="flex justify-between items-center">
                        <p class="text-gray-600">Total Pembelian:</p>
                        <p class="text-lg font-bold">Rp {{number_format($data['total_222121'])}}</p>
                    </div>
                </div>
            </div>

            @endforeach


           
        </div>

     
    </div>
    <x-footter></x-footter>
</x-app>