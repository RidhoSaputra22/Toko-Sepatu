<x-admin-app>
    <form action="{{ route('warna.update', $warna) }}" method="POST" class="" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="w-32 h-full my-2">
            <h1 class=" text-sm uppercase ">warna</h1>
            <input type="color" name="warna" class="m-3" placeholder="warna" value="{{ $warna['warna_222121'] }}">
            @error('warna')
            <p class="text-red-800 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-full h-auto my-2">
            <div class="h-32 aspect-square bg-contain border bg-no-repeat bg-center"
                style="background-image: url(' {{ URL::asset($warna['foto_222121']) }} ');"></div>
            <h1 class=" text-sm uppercase ">Foto</h1>

            <input type="file" name="foto" class="rounded  p-2 border m-1 w-full">
            @error('foto')
            <p class="text-red-800 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <input type="hidden" name="id_produk" value="{{ $warna['id_produk_222121'] }}" class="rounded  p-2">
        <div class="px-2 py-1">
            <button type="submit" class="px-3 py-2 my-1 bg-slate-500 rounded-sm text-white">Edit</button>
        </div>
    </form>
</x-admin-app>