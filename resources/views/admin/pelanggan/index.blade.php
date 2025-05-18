<x-admin-app>
    <section class="w-full">
        <div class="pb-3">
            <a href="{{ route('pelanggan.create') }}" class="px-3 py-1 border rounded shadow-xl">Tambah Data</a>
            <a href="/print/pelanggan" class="px-3 py-1 border rounded shadow-xl">Print</a>
        </div>


        <div class="flex item-center w-full">
            <table class="w-full ">
                <thead>
                    <tr>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Nama</th>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Alamat</th>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Email</th>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Aksi</th>


                    </tr>
                </thead>
                <tbody>
                    @forelse($datas as $data)
                    <tr class="hover:bg-slate-100">
                        <td class="text-sm text-center border">{{ $data['nama_222121'] }}</td>
                        <td class="text-sm text-left border">{{ $data['alamat_222121'] }}</td>
                        <td class="text-sm text-center border">{{ $data['email_222121'] }}</td>


                        <td class="text-sm flex gap-3 p-3">
                            <a href="{{ route('pelanggan.show', $data) }}" class="bg-yellow-500 px-3 py-2">Lihat Data</a>
                            <form action="{{ route('pelanggan.destroy', $data) }}" method="POST">
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

    </section>
</x-admin-app>