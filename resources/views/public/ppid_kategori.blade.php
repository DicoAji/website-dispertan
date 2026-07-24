@extends('layouts.public')
@section('title', 'Dokumen ' . $kategoriName)

@section('content')
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4 max-w-6xl">

            {{-- Tombol Kembali --}}
            <div class="mb-6">
                <a href="{{ route('public.ppid') }}"
                    class="inline-flex items-center text-sm font-semibold text-emerald-700 hover:text-emerald-900 transition-colors">
                    <i class="fa fa-arrow-left mr-2"></i> Kembali ke Menu PPID
                </a>
            </div>

            {{-- Kartu Daftar Dokumen --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                {{-- Header Tabel yang Lebih Sederhana & Menarik --}}
                <div class="px-6 py-5 bg-white border-b border-gray-100 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-base shadow-sm">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <div>
                            <h1 class="text-lg md:text-xl font-bold text-gray-800 tracking-tight">{{ $kategoriName }}</h1>
                            <p class="text-xs text-gray-400 mt-0.5">Menampilkan seluruh arsip dokumen publik terkait</p>
                        </div>
                    </div>

                    {{-- Badge Total Dokumen (Opsional, agar makin menarik) --}}
                    <span
                        class="px-3 py-1 bg-gray-50 border border-gray-200 text-gray-600 text-xs font-semibold rounded-full">
                        {{ $dokumen->count() }} Dokumen
                    </span>
                </div>

                {{-- Isi Tabel --}}
                <div class="p-6 md:p-8">
                    @if ($dokumen->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="border-b-2 border-gray-100 text-gray-500 text-sm uppercase tracking-wider">
                                        <th class="py-4 px-4 font-bold w-16 text-center">No</th>
                                        <th class="py-4 px-4 font-bold">Nama Dokumen</th>
                                        <th class="py-4 px-4 font-bold text-center w-56">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    @foreach ($dokumen as $item)
                                        <tr class="hover:bg-gray-50 transition-colors group">
                                            <td class="py-4 px-4 text-center text-gray-500">{{ $loop->iteration }}</td>
                                            <td class="py-4 px-4 font-medium text-gray-800">{{ $item->nama }}</td>
                                            <td class="py-4 px-4">
                                                <div class="flex items-center justify-center gap-2 flex-wrap">

                                                    {{-- Tampilkan Tombol Link jika ada --}}
                                                    @if ($item->link)
                                                        <a href="{{ $item->link }}" target="_blank"
                                                            class="inline-flex items-center px-4 py-2 bg-blue-50 text-blue-700 text-xs font-bold rounded-lg hover:bg-blue-600 hover:text-white transition-all shadow-sm">
                                                            <i class="fas fa-external-link-alt mr-1.5"></i> Buka Link
                                                        </a>
                                                    @endif

                                                    {{-- Tampilkan Tombol File jika ada --}}
                                                    @if ($item->file)
                                                        <a href="{{ asset('storage/ppid/' . $item->file) }}" target="_blank"
                                                            class="inline-flex items-center px-4 py-2 bg-emerald-50 text-emerald-700 text-xs font-bold rounded-lg hover:bg-emerald-600 hover:text-white transition-all shadow-sm">
                                                            <i class="fas fa-download mr-1.5"></i> Unduh
                                                        </a>
                                                    @endif

                                                    {{-- Jika tidak ada file dan tidak ada link sama sekali --}}
                                                    @if (!$item->file && !$item->link)
                                                        <span class="text-xs text-gray-400 italic">Tidak tersedia</span>
                                                    @endif

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        {{-- Tampilan jika kategori ini belum ada file sama sekali --}}
                        <div class="text-center py-16">
                            <i class="fas fa-folder-open text-6xl text-gray-200 mb-4"></i>
                            <p class="text-gray-500 font-medium">Belum ada dokumen untuk kategori ini.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
