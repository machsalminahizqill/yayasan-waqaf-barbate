@extends('guest.layouts.master')

@section('css')
    @foreach ($beritas as $item)
    <link rel="preload" as="image" href="{{ $item->gambar }}" >
    @endforeach
@endsection

@section('js')

@endsection

@section('content')
    <main id="news" class="leftright py-4 lg:py-8 min-h-[80vh]">
        <div id="header-news" class="mb-4">
            <p class="border-l-4 pl-2 font-semibold border-emerald-500 text-lg lg:text-2xl text-emerald-500">
                Semua Berita
            </p>
        </div>
        <div id="body-news">
            @foreach ($beritas as $berita)
                <div class="lg:flex lg:justify-start lg:gap-4 mb-6 p-4 lg:p-6 bg-slate-50">
                    <div class="lg:w-1/3 select-none">
                        <img src="{{ $berita->gambar }}" alt="">
                    </div>
                    <div class="lg:w-2/3 mt-3 lg:mt-0">
                        <a href="{{ '/berita/' . $berita->slug . '.' . $berita->id }}"
                            class="text-lg  font-bold leading-tight uppercase transition-all duration-500 ease-in-out hover:text-[#1abc9c]">
                            <h3>{{ $berita->judul }}</h3>
                        </a>
                        <div class="flex mt-2">
                            <p class="text-gray-600 text-xs md:text-sm cursor-default hover:text-black">
                                {{ $berita->created_at->format('d M Y H:i') }}
                            </p>
                        </div>
                        <div class="mt-2 cursor-default text-gray-800 text-base text-justify line-clamp-4">
                            {!! $berita->konten !!}
                        </div>
                        <div class="mt-4 md:mt-8">
                            <a href="{{ '/berita/' . $berita->slug . '.' . $berita->id }}"
                                class="px-6 py-1.5 md:py-1.5 bg-emerald-600 hover:bg-emerald-700 rounded-md text-white">Lihat
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach

            {{ $beritas->links('pagination::tailwind') }}
        </div>
    </main>
@endsection
