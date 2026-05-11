@extends('layouts.public')
@section('title', $item->menu)

@section('content')
    <section class="pt-12 pb-20">
        <div class="container mx-auto px-4 max-w-7xl">

            <div class="p-6 md:p-10  border rounded-lg bg-white">
                @if ($item->file)
                    <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="flex items-center gap-4">
                            <div class="p-2 bg-red-50 text-red-600  flex items-center justify-center text-2xl">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            <div>
                                <h3 class="text-md font-semibold text-gray-600">{{ $item->menu }}</h3>
                            </div>
                        </div>

                        <a href="{{ asset('storage/menu_files/' . $item->file) }}" download
                            class="w-full md:w-auto inline-flex items-center justify-center px-5 py-2 bg-green-600 hover:bg-green-700 text-white  transition-all  rounded-lg">
                            <i class="fas fa-download mr-2"></i> Unduh Dokumen
                        </a>
                    </div>
                @else
                    <div class="text-center py-20">
                        <i class="fas fa-exclamation-circle fa-4x text-gray-200 mb-4"></i>
                        <p class="text-gray-500">Maaf, file dokumen tidak ditemukan.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
