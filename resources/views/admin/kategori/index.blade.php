<x-admin-app>
    <section class="w-full">
        <div class="pb-3">
            <a href="{{ route('kategori.create') }}" class="px-3 py-1 border rounded shadow-xl">Tambah Data</a>
            <a href="/print/kategori" class="px-3 py-1 border rounded shadow-xl">Print</a>
        </div>


        <div class="flex item-center w-full">
            <table class="w-full ">
                <thead>
                    <tr>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Kategori</th>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($datas as $kategori)
                    <tr class="hover:bg-slate-100 text-center">
                        <td class="text-sm border">{{ $kategori['category_222121'] }}</td>
                        <td class="text-sm flex gap-3 p-3 w-full justify-end border">
                            <a href="{{ route('kategori.show', $kategori) }}" class="bg-yellow-500 px-3 py-2">Lihat kategori</a>
                            <form action="{{ route('kategori.destroy', $kategori) }}" method="POST">
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