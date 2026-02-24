@extends('layouts.public') {{-- Sesuaikan dengan nama layout public Anda --}}
@section('title', 'Visi & Misi') {{-- Judul halaman untuk tag <title> --}}

@section('content')
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="text-center mb-5 mt-12">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Visi & Misi</h2>
                <div class="h-1 w-24 bg-green-600 mx-auto rounded-full"></div>
                <p class="text-gray-600 mt-4">{{ $profile->nama_opd ?? 'Dinas Pertanian Kabupaten Grobogan' }}</p>
            </div>

            <div class="">
                <div class="rounded-2xl   relative overflow-hidden">
                    <h3 class="text-xl text-center font-bold text-green-700 uppercase  mb-2 ">
                        Visi
                    </h3>
                    <div class="text-md text-gray-700 leading-relaxed italic text-center px-4">
                        @if ($profile && $profile->visi)
                            {{-- strip_tags akan menghilangkan semua tag HTML termasuk <br> --}}
                            "{{ strip_tags($profile->visi) }}"
                        @else
                            <span class="text-gray-400">Data visi belum diisi.</span>
                        @endif
                    </div>
                </div>
            </div>

            <div>
                <div class=" px-8 mt-4  rounded-2xl   relative overflow-hidden">
                    <h3 class="text-xl text-center font-bold text-green-700 uppercase  mb-2 ">
                        Misi
                    </h3>
                    <div class="pros text-md prose-green max-w-none text-gray-700 ">
                        @if ($profile && $profile->misi)
                            <ol class="list-decimal list-inside text-md italic space-y-3">
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
                            <p class="text-gray-400">Data misi belum diisi.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
