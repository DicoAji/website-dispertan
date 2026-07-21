@extends('layouts.public')

@section('title', 'Galeri ' . ucfirst($kategori ?? 'Umum'))

@section('content')
    <section class="pt-12 pb-16">
        <div class="container mx-auto px-4 max-w-7xl space-y-8">

            <div class="text-center">
                {{-- Judul Dinamis --}}
                <h2 class="text-2xl font-bold text-gray-900 mb-1 capitalize">
                    Galeri {{ ucfirst($kategori ?? 'Umum') }}
                </h2>
                <p class="text-green-600 italic">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}</p>
            </div>

            @if (isset($koleksiFoto) && count($koleksiFoto) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
                    @foreach ($koleksiFoto as $foto)
                        {{-- Logika thumbnail & link tetap sama seperti yang sudah kita buat sebelumnya --}}
                        {{-- ... (kode @foreach yang sama) ... --}}
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 text-gray-400">
                    <p>Belum ada data untuk kategori {{ $kategori }}.</p>
                </div>
            @endif
        </div>
    </section>
@endsection
