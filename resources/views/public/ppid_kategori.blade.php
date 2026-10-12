@extends('layouts.public')
@section('title', 'Dokumen ' . $kategoriName)

@section('content')
    <div class="py-8 md:py-12 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4 max-w-6xl">

            {{-- Tombol Kembali --}}
            <div class="mb-5 md:mb-6">
                <a href="{{ route('public.ppid') }}"
                    class="inline-flex items-center text-xs md:text-sm font-semibold text-emerald-700 hover:text-emerald-900 transition-colors">
                    <i class="fa fa-arrow-left mr-2"></i> Kembali ke Menu PPID
                </a>
            </div>

            {{-- Kartu Daftar Dokumen --}}
            <div class="bg-white rounded-xl md:rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                {{-- Header Tabel --}}
                <div
                    class="px-4 md:px-6 py-4 md:py-5 bg-white border-b border-gray-100 flex items-center justify-between gap-3">
                    <div class="flex items-center gap-2.5 md:gap-3 min-w-0">
                        <div
                            class="w-8 h-8 md:w-10 md:h-10 rounded-lg md:rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-sm md:text-base shadow-sm flex-shrink-0">
                            <i class="fas fa-folder-open"></i>
                        </div>
                        <div class="min-w-0">
                            <h1 class="text-sm md:text-xl font-bold text-gray-800 tracking-tight truncate">
                                {{ $kategoriName }}</h1>
                            <p class="text-[10px] md:text-xs text-gray-400 mt-0.5">Menampilkan seluruh arsip dokumen publik
                                terkait</p>
                        </div>
                    </div>

                    {{-- Badge Total Dokumen --}}
                    <span
                        class="px-2.5 py-0.5 md:px-3 md:py-1 bg-gray-50 border border-gray-200 text-gray-600 text-[10px] md:text-xs font-semibold rounded-full flex-shrink-0">
                        {{ $dokumen->count() }} Dokumen
                    </span>
                </div>

                {{-- Isi Tabel --}}
                <div class="p-3 sm:p-6 md:p-8">
                    @if ($dokumen->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr
                                        class="border-b-2 border-gray-100 text-gray-500 text-[11px] md:text-sm uppercase tracking-wider">
                                        <th class="py-3 px-2 md:py-4 md:px-4 font-bold w-12 md:w-16 text-center">No</th>
                                        <th class="py-3 px-2 md:py-4 md:px-4 font-bold">Nama Dokumen</th>
                                        <th class="py-3 px-2 md:py-4 md:px-4 font-bold text-center w-36 md:w-56">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    @foreach ($dokumen as $item)
                                        <tr class="hover:bg-gray-50 transition-colors group">
                                            <td
                                                class="py-3 px-2 md:py-2 md:px-3 text-center text-gray-500 text-xs md:text-sm">
                                                {{ $loop->iteration }}</td>
                                            <td
                                                class="py-3 px-2 md:py-2 md:px-3 text-xs md:text-sm text-gray-800 leading-snug">
                                                {{ $item->nama }}</td>
                                            <td class="py-3 px-2 md:py-2 md:px-3 text-center">
                                                <div class="flex items-center justify-center gap-1.5 md:gap-2 flex-wrap">

                                                    {{-- Tampilkan Tombol Link jika ada --}}
                                                    @if ($item->link)
                                                        <a href="{{ $item->link }}" target="_blank"
                                                            class="inline-flex items-center px-2.5 py-1.5 md:px-3 md:py-2 bg-blue-50 text-blue-700 text-[10px] md:text-xs font-bold rounded-md md:rounded-lg hover:bg-blue-600 hover:text-white transition-all shadow-sm">
                                                            <i class="fas fa-external-link-alt mr-1"></i> Buka Link
                                                        </a>
                                                    @endif

                                                    {{-- Tampilkan Tombol File jika ada --}}
                                                    @if ($item->file)
                                                        <a href="{{ asset('storage/ppid/' . $item->file) }}" target="_blank"
                                                            class="inline-flex items-center px-3 py-1.5 md:px-4 md:py-2 bg-emerald-50 text-emerald-700 text-[10px] md:text-xs font-bold rounded-md md:rounded-lg hover:bg-emerald-600 hover:text-white transition-all shadow-sm">
                                                            <i class="fas fa-download mr-1"></i> Unduh
                                                        </a>
                                                    @endif

                                                    {{-- Jika tidak ada file dan tidak ada link sama sekali --}}
                                                    @if (!$item->file && !$item->link)
                                                        <span class="text-[11px] text-gray-400 italic">Tidak tersedia</span>
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
                        <div class="text-center py-12 md:py-16">
                            <i class="fas fa-folder-open text-4xl md:text-6xl text-gray-200 mb-3 md:mb-4"></i>
                            <p class="text-gray-500 text-xs md:text-sm font-medium">Belum ada dokumen untuk kategori ini.
                            </p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
