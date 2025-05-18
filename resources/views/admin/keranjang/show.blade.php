<x-admin-app>
    <div class="flex">
        <form action="{{ route('pelanggan.update', $pelanggan['id_user_222121']) }}" method="POST" class="py-5 w-full"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex gap-5">
                <div class="w-full h-auto mb-2">
                    <h1 class=" text-sm uppercase ">Nama pelanggan</h1>
                    <input name="nama" value="{{ $pelanggan['nama_222121'] }}" class="rounded w-full border p-2">
                </div>
                <div class="w-full h-auto mb-2">
                    <h1 class=" text-sm uppercase ">alamat</h1>
                    <input name="alamat" value="{{ $pelanggan['alamat_222121'] }}" class="rounded w-full border p-2">
                </div>
            </div>
            <div>
                <div class="w-full h-auto mb-2">
                    <h1 class=" text-sm uppercase">email</h1>
                    <input type="text" value="{{ $pelanggan['email_222121'] }}" name="email"
                        class="rounded w-full border p-2">
                </div>
            </div>
          
            <div>
                <div class="w-full h-auto mb-2">
                    <h1 class=" text-sm uppercase">Foto</h1>
                    <input type="file" name="foto" class="rounded w-full border p-2">
                </div>
            </div>
            <div>
                <button type="submit" class="bg-slate-500 text-white px-3 py-2 rounded my-3">
                    Submit
                </button>
            </div>

        </form>
        <div class="w-full h-auto border mx-5 p-5 bg-cover"
            style="background-image: url('{{ URL::asset($pelanggan['foto_222121']) }}')">

        </div>
    </div>
    

</x-admin-app>