@extends('admin.layout.master')

@section('content')
<main class="pb-24">
    <div class="leftright mt-8">
        <div class="flex">
            <a href="{{ route('tambahBeritaAdmin') }}" class="px-6 py-1 bg-sky-600 hover:bg-cyan-700 rounded-md text-white">Tambah Berita</a>
        </div>
    </div>
    <div id="news" class="leftright mt-8 ">
        <div id="body-news">
            @foreach ($beritas as $berita)
                <div class="md:flex md:justify-start md:gap-4 mb-6">
                    <div class="md:w-1/3 select-none">
                        <img src="{{ $berita->gambar }}" alt="">
                    </div>
                    <div class="md:w-2/3 mt-3 md:mt-0">
                        <a href="#"
                            class="text-lg  font-bold leading-tight uppercase transition-all duration-500 ease-in-out hover:text-[#1abc9c]">
                            <h3>{{ $berita->judul }}</h3>
                        </a>
                        <div class="flex mt-2">
                            <p class="text-gray-600 text-xs md:text-sm cursor-default hover:text-black">
                                {{ $berita->created_at->format('d M Y H:i') }}
                            </p>
                        </div>
                        <div class="mt-2 cursor-default text-gray-800 text-base text-justify line-clamp-4">
                            {!!  $berita->konten !!}
                        </div>
                        <div class="flex gap-2 mt-2">
                            <a href="/admin/berita/{{ $berita->slug }}/{{ $berita->id }}" class="px-6 py-1 bg-cyan-600 hover:bg-cyan-700 rounded-md text-white">Detail</a>
                            <a href="/admin/berita/edit/{{ $berita->slug }}/{{ $berita->id }}" class="px-6 py-1 bg-amber-600 hover:bg-amber-700 rounded-md text-white">Edit</a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</main>
@endsection
