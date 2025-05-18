<x-admin-app>
    <div class="flex">
        <form action="{{ route('kategori.update', $kategori) }}" method="POST" class="py-5 w-full"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex gap-5">
                <div class="w-full h-auto mb-2">
                    <h1 class=" text-sm uppercase ">Nama Kategori</h1>
                    <input name="nama" value="{{ $kategori['category_222121'] }}" class="rounded w-full border p-2">
                    @error('nama')
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
    </div>

</x-admin-app>