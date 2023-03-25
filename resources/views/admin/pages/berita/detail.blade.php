@extends('admin.layout.master')

@section('content')
    <main class="leftright my-8">
        <div class="lg:flex lg:flex-row-reverse gap-4">
            <div class="w-full md:w-1/4 mt-4 md:mt-0 relative mb-4">
                <div class="md:sticky md:top-24 md:left-0">
                    <h3 class="hidden md:block text-lg lg:text-xl font-semibold">Action</h3>
                    <div class="w-full flex lg:flex-col gap-2 text-center">
                        <a href="/admin/berita/edit/{{ $berita->slug }}/{{ $berita->id }}" class="px-6 py-1 bg-amber-600 hover:bg-amber-700 rounded-md text-white">Edit</a>
                        <a href="/admin/berita/hapus/{{ $berita->slug }}/{{ $berita->id }}" class="px-6 py-1 bg-red-600 hover:bg-red-700 rounded-md text-white">Hapus</a>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-3/4 min-h-screen">
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
                    <p class="text-justify leading-6 text-[#3b3b3b] mt-1">
                        {!! $berita->konten !!}
                    </p>
                </div>
            </div>

        </div>
    </main>
@endsection
