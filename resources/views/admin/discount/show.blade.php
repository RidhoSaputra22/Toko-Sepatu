<x-admin-app>
    <div class="flex">
        <form action="{{ route('discount.update', $discount['id_discount_222121']) }}" method="POST" class="py-5 w-full"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex gap-5">
                <div class="w-full h-auto mb-2">
                    <h1 class=" text-sm uppercase ">kode</h1>
                    <input name="kode" value="{{ $discount['kode_222121'] }}" class="rounded w-full border p-2">
                    @error('kode')
                    <p class="text-red-800 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full h-auto mb-2">
                    <h1 class=" text-sm uppercase ">discount</h1>
                    <input type="number" name="discount" value="{{ $discount['discount_222121'] }}"
                        class="rounded w-full border p-2">
                    @error('discount')
                    <p class="text-red-800 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm uppercase ">Batas Harga</h1>
                <input type="number" name="batas" value="{{ $discount['batas_222121'] }}"
                    class="rounded w-full border p-2">
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
    </div>


</x-admin-app>