@extends('layouts.public') {{-- Sesuaikan dengan nama layout public Anda --}}
@section('title', 'Visi & Misi') {{-- Judul halaman untuk tag <title> --}}

@section('content')
    <section class="pt-8 md:pt-12 pb-12 md:pb-20 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl space-y-6 md:space-y-8">

            {{-- HEADER --}}
            <div class="text-center">
                <h2 class="text-xl md:text-3xl font-bold text-gray-900">Visi dan Misi</h2>
                <p class="text-gray-400 text-[11px] md:text-sm italic mt-1 md:mt-2">
                    {{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}
                </p>
            </div>

            {{-- VISI --}}
            <div
                class="bg-white rounded-xl md:rounded-2xl shadow-md border border-gray-100 p-4 sm:p-6 md:p-8 relative overflow-hidden">
                <i
                    class="fas fa-quote-right absolute text-6xl md:text-[90px] -right-2 md:-right-2 -top-2 md:-top-4 text-emerald-50"></i>
                <div class="flex items-center gap-2.5 md:gap-3 mb-3 md:mb-4 relative">
                    <div
                        class="w-8 h-8 md:w-10 md:h-10 rounded-lg md:rounded-xl bg-emerald-700 text-white flex items-center justify-center flex-shrink-0 text-sm md:text-base">
                        <i class="fas fa-flag"></i>
                    </div>
                    <h3 class="text-base md:text-lg font-bold text-emerald-800">Visi</h3>
                </div>

                <p class="text-[12px] md:text-sm text-gray-700 leading-relaxed text-justify relative">
                    @if ($profile && $profile->visi)
                        {{-- strip_tags akan menghilangkan semua tag HTML termasuk <br> --}}
                        {{ strip_tags($profile->visi) }}
                    @else
                        <span class="text-gray-400 italic">Data visi belum diisi.</span>
                    @endif
                </p>
            </div>

            {{-- MISI --}}
            <div class="bg-white rounded-xl md:rounded-2xl shadow-md border border-gray-100 p-4 sm:p-6 md:p-8">
                <div class="flex items-center gap-2.5 md:gap-3 mb-4 md:mb-5">
                    <div
                        class="w-8 h-8 md:w-10 md:h-10 rounded-lg md:rounded-xl bg-emerald-700 text-white flex items-center justify-center flex-shrink-0 text-sm md:text-base">
                        <i class="fas fa-list-check"></i>
                    </div>
                    <h3 class="text-base md:text-lg font-bold text-emerald-800">Misi</h3>
                </div>

                <div class="text-gray-700">
                    @if ($profile && $profile->misi)
                        @php
                            // Memecah teks berdasarkan baris baru (enter)
                            $misi_items = explode("\n", str_replace("\r", '', strip_tags($profile->misi)));
                        @endphp

                        <div class="space-y-2.5 md:space-y-3">
                            @php $no = 1; @endphp
                            @foreach ($misi_items as $item)
                                @if (trim($item) != '')
                                    <div class="flex items-start gap-2.5 md:gap-3 bg-emerald-50/60 rounded-xl p-2.5 md:p-3">
                                        <span
                                            class="w-5 h-5 md:w-6 md:h-6 rounded-full bg-emerald-700 text-white text-[10px] md:text-xs font-bold flex items-center justify-center flex-shrink-0 mt-0.5">
                                            {{ $no++ }}
                                        </span>
                                        <p class="text-[12px] md:text-sm leading-relaxed text-justify italic">
                                            {{ trim($item) }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <span class="text-gray-400 italic text-[12px] md:text-sm">Data misi belum diisi.</span>
                    @endif
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
