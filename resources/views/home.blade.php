<x-app>
    <x-navbar></x-navbar>
    <section>
        <div class="h-screen flex items-center w-full bg-no-repeat bg-cover bg-center "
            style="background-image: url('{{ URL::asset('image/banner-3.jpg') }}')">

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

    <section class="h-auto pt-24 bg-contain" id="about">
        <div class="mx-10">
            <p class="text-4xl font-semibold flex justify-center pb-24 bg-white">Tentang SepatuKu</p>
            <div class="flex">
                <div class="h-96 w-1/2 bg-no-repeat bg-cover py-3  "
                    style="background-image: url('{{ URL::asset('image/banner-1.jpg') }}');">
                </div>
                <div class="px-10 w-full bg-white">
                    <h1 class="text-4xl font-semibold">SepatuKu</h1>
                    <p class="text-lg mt-4">Di <strong>SepatuKu</strong>, kami bangga menyajikan berbagai koleksi sepatu
                        yang sesuai untuk berbagai kebutuhan dan gaya. Dari sepatu formal untuk ke kantor, hingga sepatu
                        olahraga untuk aktivitas sehari-hari, semua pilihan tersedia dengan desain terkini dan
                        kenyamanan maksimal. Kamu bisa menemukan sepatu dengan berbagai bahan berkualitas, mulai dari
                        kulit asli hingga material sintetis yang tahan lama.

                    </p>
                    <p class="text-lg mt-4">
                        Apapun gaya dan aktivitasmu, <strong>SepatuKu</strong> menyediakan pilihan sepatu yang tepat
                        untuk menunjang penampilan dan kenyamananmu setiap hari.


                </div>
            </div>
        </div>
    </section>

    <section id="produk-unggulan" class="h-screen mx-24 ">
        <div class="pt-24">
            <p class="text-4xl font-semibold flex justify-center py-14">Produk Unggulan Kami</p>
        </div>
        <div class="flex justify-center">
            <div class=" h-96">
                <div class="grid grid-cols-4 h-96 gap-14">
                   
                    @foreach ($datas as $data )
                    <a href="/detail/{{$data['id_produk_222121']}}" class=" h-96 w-80 rounded  bg-cover bg-center"
                        style="background-image: url('{{ URL::asset($data['thumbnail_222121']) }}')">
                        <div class=" h-full flex flex-col-reverse ">
                            <div class="bg-white text-black p-3">
                                <h1 class="text-lg font-semibold uppercase">{{ $data['nama_222121'] }}</h1>
                                <h2 class="text-lg">Rp. {{ number_format($data['harga_222121'] ?? 0) }}</h2>
                            </div>
                        </div>
                    </a>                    
                    @endforeach

                </div>
                <div class="mt-14">
                    <a href="/shop" class="border px-4 py-2 mt-5">Lihat Selengkapnya . . .</a>
                </div>
            </div>
        </div>
    </section>

    <section class="h-screen bg-lime-900 flex">
        <div class="h-full w-full bg-cover" style="background-image: url('{{ URL::asset('image/banner-2.jpg') }}')">
        </div>
        <div class="w-full text-white  m-32">
            <h1 class="text-8xl font-semibold">Satu Langkah Nyaman, Sejuta Gaya</h1>
            <p class="text-lg mt-5">
                Di <strong>SepatuKu</strong>, kamu bisa menemukan sepatu berkualitas tinggi tanpa perlu khawatir soal
                harga. Cocok untuk kamu yang ingin tampil stylish tanpa kompromi terhadap kenyamanan!
            </p>
            <div class="mt-5">

                <a href="#menu" class="border px-4 py-2 ">Beli Sekarang</a>
            </div>
        </div>

    </section>
    <section id="produk-unggulan" class="h-screen ">
        <div class="pt-24">
            <p class="text-4xl font-semibold flex justify-center py-14">Testimoni</p>
        </div>
        <div class="flex justify-center h-96">
            <div class="grid grid-cols-3 h-96 gap-24 ">
                <div class="shadow-2xl rounded h-96 w-80 ">
                    <div class="p-6 flex justify-center ">
                        <div>
                            <div class="h-24 w-24 rounded-full bg-cover"
                                style="background-image: url('{{ URL::asset('image/person-3.jpg') }}')"></div>
                            <div class="flex justify-center text-lg font-semibold">Jefri</div>
                        </div>
                    </div>
                    <div class="text-center mx-3">
                        <p>SepatuKu adalah tempat favorit saya untuk belanja sepatu. Pilihan modelnya keren-keren, dan
                            yang paling penting harganya sangat terjangkau. Saya selalu dapat sepatu yang nyaman dan
                            stylish di sini!</p>
                    </div>
                </div>
                <div class="shadow-2xl rounded h-96 w-80 ">
                    <div class="p-6 flex justify-center ">
                        <div>
                            <div class="h-24 w-24 rounded-full bg-cover"
                                style="background-image: url('{{ URL::asset('image/person-2.jpg') }}')"></div>
                            <div class="flex justify-center text-lg font-semibold">Sarah</div>
                        </div>
                    </div>
                    <div class="text-center mx-3">
                        <p>Beli sepatu olahraga di SepatuKu, dan kualitasnya luar biasa! Nyaman dipakai untuk jogging
                            dan terlihat modern. Sangat puas dengan pelayanan dan produknya. Pasti akan balik lagi!</p>
                    </div>
                </div>
                <div class="shadow-2xl rounded h-96 w-80 ">
                    <div class="p-6 flex justify-center ">
                        <div>
                            <div class="h-24 w-24 rounded-full bg-cover"
                                style="background-image: url('{{ URL::asset('image/person-1.png') }}')"></div>
                            <div class="flex justify-center text-lg font-semibold">Alex</div>
                        </div>
                    </div>
                    <div class="text-center mx-3">
                        <p>Suka belanja di SepatuKu. Pelayanannya cepat dan stafnya sangat membantu. Sepatunya banyak
                            pilihan dengan berbagai ukuran, dan kualitasnya tidak mengecewakan.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-footter></x-footter>
</x-app>