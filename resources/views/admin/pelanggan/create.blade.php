<x-admin-app>
    <form action="{{ route('pelanggan.store') }}" method="POST" class="py-5" enctype="multipart/form-data">
        @csrf
        <div class="flex gap-5">
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm uppercase ">Nama</h1>
                <input name="nama" class="rounded w-full border p-2" value="{{ old('nama') }}">
                @error('nama')
                <p class="text-red-800 text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm uppercase ">alamat</h1>
                <input name="alamat" class="rounded w-full border p-2" value="{{ old('alamat') }}">
                @error('alamat')
                <p class="text-red-800 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm uppercase">email</h1>
                <input type="email" name="email" class="rounded w-full border p-2" value="{{ old('email') }}">
                @error('email')
                <p class="text-red-800 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm uppercase  ">password</h1>
                <input type="text" name="password" class="rounded w-full border p-2" value="{{ old('password') }}">
                @error('password')
                <p class="text-red-800 text-sm">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <div class="w-full h-auto mb-2">
                <h1 class=" text-sm uppercase">Foto</h1>
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