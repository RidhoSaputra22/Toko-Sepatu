<div class="h-14 flex gap-3 p-4 sticky top-0 bg-white  z-50">
    <div>
        <a class="font-semibold  cursor-pointer" href="/">ElShoes</a>
    </div>
    <div class="flex grow flex-row-reverse gap-5">
        <div class="flex gap-10 mr-14   ">
            <a class="hover:underline cursor-pointer" href="/">Home</a>   
            <a class="hover:underline cursor-pointer" href="/shop">Shop</a>   
            <a class="hover:underline cursor-pointer" href="/cart">Cart</a>   
            <a class="hover:underline cursor-pointer" href="/riwayat">Riwayat</a>   
            <a class="hover:underline cursor-pointer" href="/#about">About Us</a>   
        </div>
    </div>
    @if (Auth::check())
        <a class="hover:underline cursor-pointer" href="/logout">Logout</a>
    @else
        <a class="hover:underline cursor-pointer" href="/login">Login</a>

    @endif
</div>