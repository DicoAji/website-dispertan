@extends('layouts.admin') {{-- Sesuaikan dengan nama file layout admin Anda, misalnya layouts.app atau layouts.main --}}
@section('title', 'Data Laporan')
@section('header', 'Manajemen Laporan')
@section('content')
    <div class="container mx-auto px-4 py-8">

        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Daftar Laporan & Pengaduan</h1>
                <p class="text-sm text-gray-500 mt-1">Kelola semua laporan yang masuk dari masyarakat.</p>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                @if (session('success'))
                    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 border border-green-200">
                        <i class="fa-solid fa-circle-check mr-1"></i> {{ session('success') }}
                    </div>
                @endif
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-semibold">No</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Nama Pelapor</th>
                            <th scope="col" class="px-6 py-4 font-semibold">No WhatsApp</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Isi Laporan</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Tanggal Masuk</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporans as $index => $laporan)
                            <tr class="bg-white border-b border-gray-100 hover:bg-gray-50 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $laporan->nama }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        // Mengubah angka 0 di depan menjadi 62 agar bisa diklik ke WA
                                        $waNumber = preg_replace('/^0/', '62', $laporan->telp);
                                    @endphp
                                    <a href="https://wa.me/{{ $waNumber }}" target="_blank"
                                        class="inline-flex items-center gap-1.5 text-green-600 hover:text-green-800 font-medium transition">
                                        <i class="fa-brands fa-whatsapp text-lg"></i> {{ $laporan->telp }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 min-w-[300px]">
                                    {{-- Membatasi teks agar tidak terlalu panjang di tabel --}}
                                    {{ Str::limit($laporan->pengaduan, 80, '...') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $laporan->created_at->translatedFormat('d M Y, H:i') }}
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap flex justify-center gap-2">
                                    <button type="button"
                                        class="px-3 py-1.5 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 font-medium text-xs transition shadow-sm">
                                        <i class="fa-solid fa-eye"></i> Detail
                                    </button>

                                    <form action="{{ route('admin.laporan.destroy', $laporan->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan dari {{ $laporan->nama }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1.5 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 font-medium text-xs transition shadow-sm">
                                            <i class="fa-solid fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <i class="fa-solid fa-inbox text-4xl text-gray-300 mb-3"></i>
                                        <p>Belum ada data laporan yang masuk.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Jika nanti butuh pagination, munculkan di sini --}}
            {{-- <div class="px-6 py-4 border-t border-gray-100">
            {{ $laporans->links() }}
        </div> --}}
        </div>

    </div>
@endsection
