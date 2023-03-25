@extends('guest.layouts.master')

@section('content')
    <main class="leftright my-8 min-h-[80vh]">
        <div class="lg:flex gap-4">
            <div class="w-full lg:w-3/4 ">
                <h1 class="text-lg md:text-2xl lg:text-2xl font-semibold leading-5">
                    {{ $berita->judul }}
                </h1>
                <div class="mt-2">
                    <p class="text-gray-600 text-sm md:text-base  cursor-default hover:text-black">
                        {{ $berita->created_at->format('d M Y H:i') }}
                    </p>
                </div>
                <div class="mt-4 md:mt-6">
                    <img src="{{ $berita->gambar }}" alt="">
                </div>
                <div class="mt-4 md:mt-6">
                    <div class="text-justify leading-6 text-[#3b3b3b] mt-1">
                        {!! $berita->konten !!}
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/4 mt-4 md:mt-0 relative">
                <div class="md:sticky md:top-24 md:left-0">
                    <h3 class="text-lg lg:text-xl font-semibold"> Berita Lainnya</h3>
                    <div class="line line-xs line-market"></div>
                    <div class="flex-row gap-4 pt-2">
                        @foreach ($beritas as $item)

                            <div class="flex gap-2 mb-4 w-full">
                                <div class="w-2/6">
                                    <img class="rounded mt-1" src="{{ $item->gambar }}" alt="">
                                </div>
                                <div class="w-5/6">
                                    <a href="{{ '/berita/' . $item->slug . '.' . $item->id }}" class="text-sm  line-clamp-2 leading-4  transition-all duration-300 ease-in-out hover:text-[#1abc9c]">
                                        {{ $item->judul }}
                                    </a>
                                    <div class="mt-1">
                                        <p class="text-gray-600 text-xs  cursor-default hover:text-black"> {{ $item->created_at->format('d M Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
