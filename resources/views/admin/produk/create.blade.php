<x-admin-app>
    <form action="{{ route('produk.store') }}" method="POST" class="py-5" enctype="multipart/form-data">
        @csrf
        <div class="flex gap-5">
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm uppercase ">Nama Produk</h1>
                <input name="nama" class="rounded w-full border p-2" value="{{ old('nama') }}">
                @error('nama')
                <p class="text-red-800 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm uppercase ">Deskripsi</h1>
                <input name="deskripsi" class="rounded w-full border p-2" value="{{ old('deskripsi') }}">
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
                    {{old('kategori') == $data['id_category_222121'] ? "selected":""}}>{{ $data['category_222121'] }}
                </option>
                @endforeach
            </select>
            @error('kategori')
            <p class="text-red-800 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full h-auto mb-2">
            <h1 class=" text-sm uppercase ">harga</h1>
            <input type="number" name="harga" class="rounded w-full border p-2" value="{{ old('harga') }}">
            @error('harga')
            <p class="text-red-800 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-5">
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm uppercase ">Ukuran Produk</h1>
                <input type="number" min="0" name="ukuran" class="rounded w-full border p-2"
                    value="{{ old('ukuran') }}">
                @error('ukuran')
                <p class="text-red-800 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm uppercase ">Stok Ukuran</h1>
                <input type="number" min="0" name="stok" class="rounded w-full border p-2" value="{{ old('stok') }}">
                @error('stok')
                <p class="text-red-800 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex gap-5">
            <div class=" h-auto mb-2">
                <h1 class="flex-1 text-sm uppercase ">Warna Produk</h1>
                <input type="color" min="0" name="warna" class=" w-32 h-32 aspect-square"
                    value="{{ old('warna') }}">
                @error('warna')
                <p class="text-red-800 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex-1 h-auto mb-2">
                <h1 class=" text-sm uppercase">Foto</h1>
                <input type="file" name="warna_foto" class="rounded w-full border p-2" value="{{ old('warna_foto') }}">
                @error('warna_foto')
                <p class="text-red-800 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>


        <div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm uppercase">thumbnail</h1>
                <input type="file" name="foto" class="rounded w-full border p-2" value="{{ old('foto') }}">
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

</x-admin-app>