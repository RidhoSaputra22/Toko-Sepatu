<x-app>
    <x-navbar></x-navbar>
    <section class="">
        <div class="h-96 flex items-center w-full bg-no-repeat bg-cover bg-center "
            style="background-image: url('{{ URL::asset('image/banner-1.jpg') }}')">
            <div
                class="h-full w-full 0 text-white backdrop-brightness-50 flex flex-col text-center bg-center justify-center items-center">
                <h1 class="text-9xl font-semibold mb-5">ElShoes</h1>
                <p class="text-2xl font-regural italic">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Asperiores,
                    ad.</p>
                <a href="#menu" class="border px-4 py-2 mt-3 ">Find More!</a>
            </div>
        </div>
    </section>
    <section class="flex min-h-screen my-14 mx-14">
        <div class="w-64 h-full ">
            <div>
                <p class="text-4xl font-semibold">Kategori</p>
            </div>
            <div class="p-3 mt-3">
                <ul class="flex flex-col gap-3 font-semibold">
                    @foreach ($categories as $category)
                        <a href="?category={{ $category['id_category_222121'] }}" class="hover:underline cursor-pointer">{{ $category['category_222121'] }}</a>
                    @endforeach
                    
                </ul>
            </div>
        </div>
        <div class=" h-full w-full ">
            <form class="h-14  bg-white flex justify-center" method="GET" action="">
                <input type="text" name="search" class="p-4 w-full mx-32 rounded m-2 border-yellow border"
                    placeholder="Search Menu...">
            </form>
            <div class="grid grid-cols-3 h-96 gap-2 m-14 w-full h-full  ">
                @forelse($datas as $data)
              
                
                    <a href="/detail/{{$data['id_produk_222121']}}" class=" h-96 w-80 rounded  bg-cover bg-center"
                        style="background-image: url('{{$data['thumbnail_222121']}}')">
                        <div class=" h-full flex flex-col-reverse ">
                            <div class="bg-white text-black p-3">
                                <h1 class="text-lg font-semibold uppercase">{{$data['nama_222121']}}</h1>
                                <h2 class="text-lg">{{number_format($data['harga_222121'] ?? 0)}}</h2>
                            </div>
                        </div>
                    </a>
                @empty
                    <h1>Tak ada data</h1>
                @endforelse
            </div>
        </div>

    </section>
    <x-footter></x-footter>
</x-app>