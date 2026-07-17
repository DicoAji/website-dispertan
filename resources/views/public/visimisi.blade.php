@extends('layouts.public') {{-- Sesuaikan dengan nama layout public Anda --}}
@section('title', 'Visi & Misi') {{-- Judul halaman untuk tag <title> --}}

@section('content')
    <section class="pt-12">
        <div class="container mx-auto px-4 max-w-6xl space-y-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-1">Visi dan Misi</h2>
                <p class="text-green-600  italic">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
            </div>
            <div class="w-full mx-auto mb-6">
                <div class="py-2 border-b border-gray-300 mb-2">
                    <h3 class="text-xl ps-2 font-bold text-green-700">Visi</h3>
                </div>

                <div class="bg-white">
                    <p class="text-gray-700 leading-relaxed text-justify py-2 ps-2">
                        @if ($profile && $profile->visi)
                            {{-- strip_tags akan menghilangkan semua tag HTML termasuk <br> --}}
                            {{ strip_tags($profile->visi) }}
                        @else
                            <span class="text-gray-400 italic">Data visi belum diisi.</span>
                        @endif
                    </p>
                </div>
            </div>

            <div class="w-full mx-auto mb-4">
                <div class="py-2 border-b border-gray-300 mb-2 mt-4">
                    <h3 class="text-xl ps-2 font-bold text-green-700">Misi</h3>
                </div>

                <div class="bg-white">
                    <div class="py-2 ps-2 text-gray-700">
                        @if ($profile && $profile->misi)
                            <ol class="list-decimal list-inside text-md italic space-y-3 leading-relaxed text-justify">
                                @php
                                    // Memecah teks berdasarkan baris baru (enter)
                                    $misi_items = explode("\n", str_replace("\r", '', strip_tags($profile->misi)));
                                @endphp

                                @foreach ($misi_items as $item)
                                    @if (trim($item) != '')
                                        <li>{{ trim($item) }}</li>
                                    @endif
                                @endforeach
                            </ol>
                        @else
                            <span class="text-gray-400 italic">Data misi belum diisi.</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function toggleDropdown(contentId, iconId) {
            const content = document.getElementById(contentId);
            const icon = document.getElementById(iconId);

            // Toggle class 'hidden' dari Tailwind untuk memunculkan/menyembunyikan konten
            content.classList.toggle('hidden');

            // Toggle class 'rotate-180' untuk memutar icon panah ke atas/bawah
            icon.classList.toggle('rotate-180');
        }
    </script>
@endsection
