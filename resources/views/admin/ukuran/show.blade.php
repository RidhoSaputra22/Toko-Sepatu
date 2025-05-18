<x-admin-app>
    <form action="{{ route('ukuran.update', $ukuran) }}" method="POST" class=" " enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="w-full h-auto mb-2">
            <h1 class=" text-sm uppercase ">Ukuran</h1>
            <input type="number" name="ukuran" class="rounded  p-2 border m-1 w-full " placeholder="Ukuran"
                value="{{ $ukuran['ukuran_222121'] }}">
            @error('ukuran')
            <p class="text-red-800 text-sm">{{ $message }}</p>
            @enderror

        </div>
        <div class="w-full h-auto mb-2">
            <h1 class=" text-sm uppercase ">Stok</h1>
            <input type="number" name="stok" class="rounded  p-2 border m-1 w-full" placeholder="Stok"
                value="{{ $ukuran['stok_222121'] }}">
            @error('stok')
            <p class="text-red-800 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <input type="hidden" name="id_produk" value="{{ $ukuran['id_produk_222121'] }}" class="rounded  p-2">
        <div class="px-2 py-1">
            <button type="submit" class="px-3 py-2 my-1 bg-slate-500 rounded-sm text-white">Edit</button>
        </div>
    </form>
</x-admin-app>