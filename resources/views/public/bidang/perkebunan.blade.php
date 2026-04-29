@extends('layouts.public')

@section('title', 'Bidang Perkebunan')

@section('content')
    <div class="container mx-auto px-4 py-12 max-w-5xl">
        <div class="text-center mb-10">
            <h1 class="text-3xl md:text-4xl font-bold text-emerald-800 mb-4">Bidang Perkebunan</h1>
            <div class="w-24 h-1 bg-emerald-500 mx-auto rounded-full"></div>
        </div>

        <div class="space-y-6">
            @forelse ($bidang as $item)
                <div
                    class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden border border-gray-200 flex flex-col md:flex-row">

                    <div class="md:w-1/3 lg:w-1/4 shrink-0 bg-gray-50 border-b md:border-b-0 md:border-r border-gray-100">
                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->uraian }}"
                                class="w-full h-full object-cover object-center">
                        @else
                            <div class="w-full h-56 md:h-full flex flex-col items-center justify-center text-gray-400">
                                <i class="fa-solid fa-tree text-4xl mb-2 text-emerald-200"></i>
                                <span class="text-xs font-medium">Tanpa Gambar</span>
                            </div>
                        @endif
                    </div>

                    <div class="p-6 flex flex-col flex-grow">

                        <h3 class="text-2xl font-bold text-gray-800 mb-3 leading-tight">{{ $item->uraian }}</h3>

                        <div class="text-gray-600 mb-6 flex-grow text-sm md:text-base leading-relaxed">
                            @if ($item->deskripsi)
                                <p class="whitespace-pre-line">{{ $item->deskripsi }}</p>
                            @else
                                <p class="italic text-gray-400">Tidak ada deskripsi rinci untuk data ini.</p>
                            @endif
                        </div>

                        @if ($item->file)
                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                                    class="inline-flex items-center text-emerald-700 hover:text-emerald-900 font-semibold group bg-emerald-50 hover:bg-emerald-100 px-4 py-2.5 rounded-lg transition-colors w-fit">
                                    <i class="fa-solid fa-file-pdf mr-2 text-red-500 text-lg"></i>
                                    Lihat Dokumen Lampiran
                                </a>
                            </div>
                        @endif

                    </div>
                </div>
            @empty
                <div class="text-center py-16 bg-gray-50 rounded-2xl border border-dashed border-gray-300">
                    <i class="fa-regular fa-folder-open text-5xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-600">Belum ada informasi</h3>
                    <p class="text-gray-500 mt-2">Data untuk Bidang Perkebunan belum tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
