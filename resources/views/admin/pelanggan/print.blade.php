<x-app>
    <div class=" item-center w-full p-10">
        <div class="pb-3">
            <a href="{{ route('pelanggan.index') }}" class="underline">Kembali</a>
        </div>
        <div class="pb-3">
            <h1 class="text-4xl">Laporan Pelanggan</h1>
            <h1>{{now()}}</h1>
            <form class="py-3">
                <select name="bulan" id="" class="p-2 border uppercase">
                    <option value="01" {{($request->bulan == 'january') ? "selected":""}}>Januari</option>
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
        <table class="w-full ">
            <thead>
                <tr>
                    <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Nama</th>
                    <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Alamat</th>
                    <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Email</th>
                    <th class="px-3 py-1 text-sm w-auto font-semibold bg-slate-400">Tanggal Dibuat</th>
                </tr>
            </thead>
            <tbody>
                @forelse($datas as $data)
                <tr class="hover:bg-slate-100">
                    <td class="text-sm text-center border">{{ $data['nama_222121'] }}</td>
                    <td class="text-sm text-center border">{{ $data['alamat_222121'] }}</td>
                    <td class="text-sm text-center border">{{ $data['email_222121'] }}</td>
                    <td class="text-sm text-center border">{{ $data['created_at'] }}</td>
                   
                    @empty
                    <td>Tak Ada Data</td>
                </tr>

                @endforelse

            </tbody>
        </table>
    </div>
</x-app>