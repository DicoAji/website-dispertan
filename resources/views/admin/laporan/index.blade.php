@extends('layouts.admin') {{-- Sesuaikan dengan nama file layout admin Anda, misalnya layouts.app atau layouts.main --}}
@section('title', 'Data Laporan')
@section('header', 'Manajemen Laporan')
@section('content')
    <div class="max-w-5xl mx-auto space-y-6 pb-10">

        {{-- HEADER --}}
        <div>
            <p class="text-[11px] font-bold tracking-widest uppercase text-[#C68A2E]">Layanan Masyarakat</p>
            <h3 class="text-base font-semibold text-[#4A3728]">Daftar Laporan &amp; Pengaduan</h3>
            <p class="text-xs text-gray-500 mt-1">Kelola semua laporan yang masuk dari masyarakat.</p>
        </div>

        @if (session('success'))
            <div class="flex items-center p-4 bg-white border-l-4 border-[#3C7245] rounded-r-xl shadow-sm">
                <i class="fa-solid fa-circle-check text-lg text-[#3C7245] mr-3"></i>
                <p class="text-sm text-[#234D2C]">{{ session('success') }}</p>
            </div>
        @endif

        {{-- LIST LAPORAN --}}
        <div class="bg-white border border-[#E7E1D2] rounded-2xl overflow-hidden">
            @forelse ($laporans as $index => $laporan)
                @php
                    // Mengubah angka 0 di depan menjadi 62 agar bisa diklik ke WA
                    $waNumber = preg_replace('/^0/', '62', $laporan->telp);
                @endphp
                <div
                    class="flex flex-col sm:flex-row sm:items-start gap-4 px-5 py-4 {{ !$loop->last ? 'border-b border-[#E7E1D2]' : '' }} hover:bg-[#F6F2E6]/50 transition-colors">

                    <div
                        class="w-9 h-9 rounded-lg bg-[#F6F2E6] text-[#234D2C] flex items-center justify-center flex-shrink-0 text-xs font-bold">
                        {{ $index + 1 }}
                    </div>

                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-3 flex-wrap mb-1">
                            <p class="text-sm font-semibold text-[#4A3728]">{{ $laporan->nama }}</p>
                            <a href="https://wa.me/{{ $waNumber }}" target="_blank"
                                class="inline-flex items-center gap-1.5 text-xs text-[#3C7245] hover:text-[#17331D] font-medium transition">
                                <i class="fa-brands fa-whatsapp"></i> {{ $laporan->telp }}
                            </a>
                        </div>
                        <p class="text-sm text-gray-600 leading-relaxed mb-1.5">
                            {{ Str::limit($laporan->pengaduan, 120, '...') }}
                        </p>
                        <span class="inline-flex items-center text-xs text-gray-400">
                            <i
                                class="fas fa-clock mr-1.5 text-[#C68A2E]"></i>{{ $laporan->created_at->translatedFormat('d M Y, H:i') }}
                        </span>
                    </div>

                    <div class="flex items-center gap-2 flex-shrink-0 self-start">

                        <form action="{{ route('admin.laporan.destroy', $laporan->id) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan dari {{ $laporan->nama }}?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-8 h-8 flex items-center justify-center rounded-lg text-red-400 hover:bg-red-50 hover:text-red-600 transition-colors">
                                <i class="fa-solid fa-trash text-sm"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-center py-14 text-gray-400">
                    <i class="fa-solid fa-inbox fa-2x mb-3"></i>
                    <p class="text-sm">Belum ada data laporan yang masuk.</p>
                </div>
            @endforelse
        </div>

        {{-- Jika nanti butuh pagination, munculkan di sini --}}
        {{-- <div class="pt-2">
            {{ $laporans->links() }}
        </div> --}}

    </div>
@endsection
