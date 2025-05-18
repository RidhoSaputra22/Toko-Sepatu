<x-app>
    <div class=" item-center w-full p-10">
        <div class="pb-3">
            <a href="{{ route('keranjang.index') }}" class="underline">Kembali</a>
        </div>
        <div class="pb-3">
            <h1 class="text-4xl">Laporan Order </h1>
            <h1>{{now()}}</h1>
            <form class="py-3">
                <select name="bulan" id="" class="p-2 border uppercase">
                    <option value="january" {{($request->bulan == 'january') ? "selected":""}}>Januari</option>
                    <option value="february" {{($request->bulan == 'february') ? "selected":""}}>Februari</option>
                    <option value="march" {{($request->bulan == 'march') ? "selected":""}}>Maret</option>
                    <option value="april" {{($request->bulan == 'april') ? "selected":""}}>April</option>
                    <option value="may" {{($request->bulan == 'may') ? "selected":""}}>Mei</option>
                    <option value="june" {{($request->bulan == 'june') ? "selected":""}}>Juni</option>
                    <option value="july" {{($request->bulan == 'july') ? "selected":""}}>Juli</option>
                    <option value="august" {{($request->bulan == 'august') ? "selected":""}}>Agustus</option>
                    <option value="september" {{($request->bulan == 'september') ? "selected":""}}>September</option>
                    <option value="october" {{($request->bulan == 'october') ? "selected":""}}>Oktober</option>
                    <option value="november" {{($request->bulan == 'november') ? "selected":""}}>November</option>
                    <option value="december" {{($request->bulan == 'december') ? "selected":""}}>Desember</option>
                </select>
                <select name="tahun" id="" class="p-2 border uppercase">
                    @for($year = 2020; $year <= date('Y'); $year++) <option value="{{ $year }}"
                        {{($request->tahun == $year) ? "selected":""}}>{{ $year }}</option>
                        @endfor
                </select>
                <button class="border p-2 bg-slate-400">Submit</button>
                <button type="button" onclick="print()" class="border p-2 bg-slate-400">print</button>
            </form>
        </div>
        <div class="flex item-center w-full py-5">
            <table class="w-full ">
                <thead>
                    <tr>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400 border">Tanggal</th>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400 border">Kode</th>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400 border">Nama User</th>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400 border">Nama Produk</th>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400 border">Status</th>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400 border">Harga Produk</th>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400 border">Jumlah</th>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400 border">Total Harga</th>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400 border">Total Diskon</th>
                        <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400 border">Harga Setelah Diskon</th>


                    </tr>
                </thead>
                <tbody>
                    @forelse($datas as $data)
                    <tr class="hover:bg-slate-100 text-center">
                        <td class="text-sm  border">{{ $data['created_at'] }}</td>
                        <td class="text-sm  border">{{ $data['kode_222121'] ?? '-' }}</td>
                        <td class="text-sm  border">{{ $data->user['nama_222121'] }}</td>
                        <td class="text-sm  border">{{ $data->produk['nama_222121'] }}</td>
                        <td class="text-sm  border">{{ $data['status_222121'] }}</td>
                        <td class="text-sm  border">{{ number_format($data->produk['harga_222121']) }}</td>
                        <td class="text-sm  border">{{ $data['jumlah_222121'] }}</td>
                        <td class="text-sm  border">Rp. {{ number_format($data['total_222121']) }}</td>
                        <td class="text-sm  border">{{ $data->discount['discount_222121'] ?? 0}}%</td>
                        <td class="text-sm  border">Rp.
                            {{ number_format(( $data['total_222121'] -  $data['total_222121'] *  ($data->discount['discount_222121'] ?? 0) / 100) )  }}
                        </td>



                        @empty
                        <td>Tak Ada Data</td>
                    </tr>

                    @endforelse

                    <tr class="text-center p-3 text-sm ">
                        <td class="border" colspan="5"></td>
                        <td class="border">Total</td>
                        <td class="border bg-slate-400">{{ $datas->sum('jumlah_222121') }}</td>
                        <td class="border bg-slate-400">Rp. {{ number_format($datas->sum('total_222121')) }}</td>
                        <td class="border bg-slate-400">{{ number_format($datas->sum(function ($data) {
                            return $data->discount['discount_222121'] ?? 0;
                        })) }}%
                        </td>
                        <td class="border bg-slate-400"> Rp.
                        {{ number_format($datas->sum(function ($data) {
                            return $data['total_222121'] -  $data['total_222121'] *  ($data->discount['discount_222121'] ?? 0) / 100;
                        })) }}    
                    
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</x-app>