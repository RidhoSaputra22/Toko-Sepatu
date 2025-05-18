<x-admin-app>
    <form action="{{ route('discount.store') }}" method="POST" class="py-5" enctype="multipart/form-data">
        @csrf
        <div class="flex gap-5">
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm uppercase ">kode</h1>
                <input name="kode" class="rounded w-full border p-2" value="{{ old('kode') }}">
                @error('kode')
                <p class="text-red-800 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm uppercase ">diskon (%)</h1>
                <input type="number" name="diskon" class="rounded w-full border p-2" value="{{ old('diskon') }}">
                @error('diskon')
                <p class="text-red-800 text-sm">{{ $message }}</p>
                @enderror
            </div>

        </div>
        <div class="w-full h-auto mb-2">
            <h1 class=" text-sm uppercase ">Batas Harga</h1>
            <input type="number" name="batas" class="rounded w-full border p-2" value="{{ old('batas') }}">
            @error('batas')
            <p class="text-red-800 text-sm">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit" class="bg-slate-500 text-white px-3 py-2 rounded my-3">
                Submit
            </button>
        </div>

    </form>

</x-admin-app>