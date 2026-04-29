@extends('layouts.public')
@section('title', 'Bidang Hortikultura')
@section('content')
    <div class="container mx-auto px-4 py-12 max-w-5xl">
        <div class="text-center mb-10">
            <h1 class="text-3xl md:text-4xl font-bold text-emerald-800 mb-4">Bidang Hortikultura</h1>
            <div class="w-24 h-1 bg-emerald-500 mx-auto rounded-full"></div>
        </div>
        <div class="space-y-6">
            @forelse ($bidang as $item)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200 flex flex-col md:flex-row">
                    <div class="md:w-1/3 shrink-0 bg-gray-50 md:border-r border-gray-100">
                        @if ($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                class="w-full h-full object-cover object-center">
                        @else
                            <div class="w-full h-64 flex flex-col items-center justify-center text-gray-400">
                                <i class="fa-solid fa-seedling text-4xl mb-2 text-emerald-200"></i>
                                <span class="text-xs">Tanpa Gambar</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-gray-800 mb-3">{{ $item->uraian }}</h3>
                        <p class="text-gray-600 mb-6 text-sm md:text-base flex-grow">
                            {{ $item->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
                        @if ($item->file)
                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                                    class="inline-flex items-center text-emerald-700 font-semibold bg-emerald-50 px-4 py-2 rounded-lg hover:bg-emerald-100 transition">
                                    <i class="fa-solid fa-file-pdf mr-2 text-red-500"></i> Lihat Dokumen
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center py-16 bg-gray-50 rounded-2xl border border-dashed border-gray-300">
                    <p class="text-gray-500">Data belum tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
