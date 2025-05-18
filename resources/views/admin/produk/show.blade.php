<x-admin-app>
    <div class="flex">
        <form action="{{ route('produk.update', $produk) }}" method="POST" class="py-5 w-full"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex gap-5">
                <div class="w-full h-auto mb-2">
                    <h1 class=" text-sm uppercase ">Nama Produk</h1>
                    <input name="nama" value="{{ $produk['nama_222121'] }}" class="rounded w-full border p-2">
                    @error('nama')
                    <p class="text-red-800 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full h-auto mb-2">
                    <h1 class=" text-sm uppercase ">Deskripsi</h1>
                    <input name="deskripsi" value="{{ $produk['deskripsi_222121'] }}" class="rounded w-full border p-2">
                    @error('deskripsi')
                    <p class="text-red-800 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm uppercase ">Category</h1>
                <select name="kategori" id="" class="p-2 border w-full rounded">
                    @foreach ($kategori as $data )
                    <option value="{{ $data['id_category_222121'] }}"
                        {{old('kategori') == $data['id_category_222121'] ? "selected":""}}>
                        {{ $data['category_222121'] }}
                    </option>
                    @endforeach
                </select>
                @error('kategori')
                <p class="text-red-800 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <div class="w-full h-auto mb-2">
                    <h1 class=" text-sm uppercase">Harga</h1>
                    <input type="number" value="{{ $produk['harga_222121'] }}" name="harga"
                        class="rounded w-full border p-2">
                    @error('harga')
                    <p class="text-red-800 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <div class="w-full h-auto mb-2">
                    <h1 class=" text-sm uppercase">thumbnail</h1>
                    <input type="file" name="foto" class="rounded w-full border p-2">
                    @error('foto')
                    <p class="text-red-800 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <button type="submit" class="bg-slate-500 text-white px-3 py-2 rounded my-3">
                    Submit
                </button>
            </div>

        </form>
        <div class="h-96 aspect-square border mx-5 p-5 bg-cover"
            style="background-image: url('{{ URL::asset($produk['thumbnail_222121']) }}')">

        </div>
    </div>

    <div class="my-5 border">
        <div class="p-3 italic  border-b-2 bg-slate-400">Ukuran</div>
        <div>
            <form action="{{ route('ukuran.store') }}" method="POST" class="flex gap-3" enctype="multipart/form-data">
                @csrf
                <div class=" h-auto mb-2">
                    <input type="number" value="{{ old('ukuran') }}" name="ukuran"
                        class="rounded w-full border p-2" placeholder="Ukuran">
                    @error('ukuran')
                    <p class="text-red-800 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class=" h-auto mb-2">
                    <input type="number" value="{{ old('stok') }}" name="stok"
                        class="rounded w-full border p-2" placeholder="Stok">
                    @error('stok')
                    <p class="text-red-800 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <input type="hidden" name="id_produk" value="{{ $produk['id_produk_222121'] }}" class="rounded  p-2">
                <button type="submit" class="px-3 my-1 bg-slate-500 rounded-sm text-white">Tambah +</button>
            </form>
        </div>
    </div>
    <div>
        <div class="flex item-center w-11/12">
            <table class="w-full ">
                <thead>
                    <tr>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Ukuran</th>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Stok</th>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produk->ukuran as $data)
                    <tr class="hover:bg-slate-100">
                        <td class="text-sm text-left border">{{ $data['ukuran_222121'] }}</td>
                        <td class="text-sm text-left border">{{ $data['stok_222121'] }}</td>

                        <td class="text-sm flex gap-3 p-3">
                            <a href="{{ route('ukuran.show', $data) }}" class="bg-yellow-500 px-3 py-2">Lihat Data</a>
                            <form action="{{ route('ukuran.destroy', $data) }}" method="POST">
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
    </div>

    <div class="my-5 border">
        <div class="p-3 italic  border-b-2 bg-slate-400">warna</div>
        <div>
            <form action="{{ route('warna.store') }}" method="POST" class="flex" enctype="multipart/form-data">
                @csrf
                <div class=" h-auto m-2">
                    <input type="color" value="{{ old('warna') }}" name="warna"
                        class="rounded " placeholder="warna">
                    @error('warna')
                    <p class="text-red-800 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class=" h-auto mb-2">
                    <input type="file" value="{{ old('foto') }}" name="foto"
                        class="rounded w-full border p-2" placeholder="foto">
                    @error('foto')
                    <p class="text-red-800 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <input type="hidden" name="id_produk" value="{{ $produk['id_produk_222121'] }}" class="rounded  p-2">
                <button type="submit" class="px-3 my-1 bg-slate-500 rounded-sm text-white">Tambah +</button>
            </form>
        </div>
    </div>
    <div>
        <div class="flex item-center w-11/12">
            <table class="w-full ">
                <thead>
                    <tr>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Warna</th>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Stok</th>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produk->warna as $data)
                    <tr class="hover:bg-slate-100">
                        <td class="text-sm text-left border ">
                            <div class="flex gap-3 px-3">
                                <div class="p-3 w-min" style="background-color: {{$data['warna_222121']}};"></div>
                                <div>{{$data['warna_222121']}}</div>
                            </div>

                        </td>
                        <td class="text-sm text-left border">
                            <div>
                                <div class="h-32 aspect-square bg-contain bg-center bg-no-repeat"
                                    style="background-image: url('{{ URL::asset($data['foto_222121']) }}');">

                                </div>
                            </div>
                        </td>

                        <td class="text-sm flex gap-3 p-3">
                            <a href="{{ route('warna.show', $data) }}" class="bg-yellow-500 px-3 py-2">Lihat Data</a>
                            <form action="{{ route('warna.destroy', $data) }}" method="POST">
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
    </div>

    <div class="my-5 border">
        <div class="p-3 italic  border-b-2">Galleri</div>
        <div>
            <form action="{{ route('galleri.store') }}" method="POST" class="flex" enctype="multipart/form-data">
                @csrf
                <input type="file" name="foto" class="rounded  p-2">
                <input type="hidden" name="id_produk" value="{{ $produk['id_produk_222121'] }}" class="rounded  p-2">
                <button type="submit" class="px-3 my-1 bg-slate-500 rounded-sm text-white">Tambah +</button>
            </form>
        </div>
    </div>
    <div>
        <div class="flex flex-wrap m-5 gap-5">
            @forelse($produk->gallery as $data)
            <div class="h-64 w-auto border bg-cover"
                style="background-image: url('{{ URL::asset($data['foto_222121']) }}')">
                <div class="bg-white flex items-center gap-3 text-sm">
                    <form action="{{ route('galleri.update', $data['id_galleri_222121']) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="file" name="foto" class="rounded  p-2">
                        <button type="submit" class="px-3 py-1 bg-slate-500 rounded-sm text-white">Update</button>
                    </form>
                    <form action="{{ route('galleri.destroy', $data['id_galleri_222121']) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 bg-slate-500 rounded-sm text-white">Delete</button>
                    </form>


                </div>
            </div>
            @empty
            <h1>Tak ada data</h1>
            @endforelse


        </div>
    </div>

</x-admin-app>