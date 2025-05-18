<x-app>
    <section class=" min-h-screen">
        <section id="navbar" class="h-14 flex items-center px-3  bg-slate-500 text-white">
            <div class="grow text-2xl italic">SepatuKU</div>
            <div class="text-xl font-light"><a href="/logout">Logout</a></div>
        </section>

        <section id="main" class="flex ">
            <section id="sidebar " class="min-h-screen bg-slate-900 w-64 text-white border-r-8 border-slate-850">
                <div class="my-5 ml-5 mt-14 flex flex-col">
                    <a class="p-3 hover:bg-white hover:text-black border-b-2 {{ (request()->is('admin/dashboard*')) ? "bg-white text-black":"" }}" href="/admin/dashboard">Dashboard</a>
                    <a class="p-3 hover:bg-white hover:text-black border-b-2 {{ (request()->is('admin/kategori*')) ? "bg-white text-black":"" }}" href="/admin/kategori">Kategori</a>
                    <a class="p-3 hover:bg-white hover:text-black border-b-2 {{ (request()->is('admin/produk*')) ? "bg-white text-black":"" }}" href="/admin/produk">Produk</a>
                    <a class="p-3 hover:bg-white hover:text-black border-b-2 {{ (request()->is('admin/keranjang*')) ? "bg-white text-black":"" }}" href="/admin/keranjang">Keranjang</a>
                    <a class="p-3 hover:bg-white hover:text-black border-b-2 {{ (request()->is('admin/discount*')) ? "bg-white text-black":"" }}" href="/admin/discount">Discount</a>
                    <a class="p-3 hover:bg-white hover:text-black border-b-2 {{ (request()->is('admin/pelanggan*')) ? "bg-white text-black":"" }}" href="/admin/pelanggan">Pelanggan</a>
                </div>
            </section>

            <section id="content" class="m-5 h-auto w-full">
                {{ $slot }}
            </section>

        </section>
    </section>
</x-app>