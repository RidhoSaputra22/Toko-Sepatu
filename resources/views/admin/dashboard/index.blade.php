<x-admin-app>
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-black rounded-lg text-white p-6 shadow-lg">
            <h2 class="text-2xl font-semibold">Jumlah Produk</h2>
            <p class="text-3xl mt-2">{{ number_format( $datas['jumlah_produk']) }}</p>
            <p class="mt-4 text-sm opacity-75">Diperbarui terakhir kali hari ini</p>
        </div>
        <div class="bg-blue-700 rounded-lg text-white p-6 shadow-lg">
            <h2 class="text-2xl font-semibold">Produk Dipesan</h2>
            <p class="text-3xl mt-2">{{ number_format( $datas['produk_dipesan']) }}</p>
            <p class="mt-4 text-sm opacity-75">Diperbarui terakhir kali hari ini</p>
        </div>
        <div class="bg-red-700 rounded-lg text-white p-6 shadow-lg">
            <h2 class="text-2xl font-semibold">Jumlah Pelanggan</h2>
            <p class="text-3xl mt-2">{{ number_format( $datas['jumlah_pelanggan']) }}</p>
            <p class="mt-4 text-sm opacity-75">Diperbarui terakhir kali hari ini</p>
        </div>
    </div>

    <div class="flex item-center w-full py-5">
        <table class="w-full ">
            <thead>
                <tr>
                    <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Kode</th>
                    <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Nama User</th>
                    <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Nama Produk</th>
                    <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Harga Produk</th>
                    <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Jumlah</th>
                    <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Total Harga</th>
                    <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Total Diskon</th>
                    <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Harga Setelah Diskon</th>
                    <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Status</th>
                    <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Aksi</th>


                </tr>
            </thead>
            <tbody>
                @forelse($datas['cart'] as $data)
                <tr class="hover:bg-slate-100 text-center">
                    <td class="text-sm  border">{{ $data['kode_222121'] }}</td>
                    <td class="text-sm  border">{{ $data->user['nama_222121'] }}</td>
                    <td class="text-sm  border">{{ $data->produk['nama_222121'] }}</td>
                    <td class="text-sm  border">{{ number_format($data->produk['harga_222121']) }}</td>
                    <td class="text-sm  border">{{ $data['jumlah_222121'] }}</td>
                    <td class="text-sm  border">Rp. {{ number_format($data['total_222121']) }}</td>
                    <td class="text-sm  border">{{ $data->discount['discount_222121'] ?? 0}}%</td>
                    <td class="text-sm  border">Rp.
                        {{ number_format(( $data['total_222121'] -  $data['total_222121'] * ($data->discount['discount_222121'] ?? 0) / 100) )  }}
                    </td>
                    <td class="text-sm  border">{{ $data['status_222121'] }}</td>


                    <td class="text-sm flex gap-3 p-3">
                        <form action="{{ route('keranjang.update', $data['id_cart_222121']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="bg-yellow-500 px-3 py-2">Verifikasi</button>
                        </form>
                        <form action="{{ route('keranjang.destroy', $data['id_cart_222121']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 px-3 py-2">Hapus</button>
                        </form>
                    </td>
                    @empty
                    <td>Tak Ada Data</td>
                </tr>

                @endforelse

            </tbody>
        </table>
    </div>


</x-admin-app>