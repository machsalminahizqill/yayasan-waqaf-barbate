@extends('admin.layout.master')

@section('js')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
        selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | formatselect| bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
    </script>
@endsection

@section('content')
    <main class="leftright">
        <div id="form" class="mt-8 mb-24">
            <form action="{{ route('createBeritaAdmin') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="judul" class="block mb-1 text-sm  font-medium">Judul
                        <span class="text-emerald-400 ">
                            @error('judul')
                                | {{ $message }}
                            @enderror
                        </span>
                    </label>
                    <input type="judul" id="judul" name="judul" value="{{ old('judul') }}"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        >
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-1 text-sm font-medium text-gray-900">Konten
                        <span class="text-emerald-400 ">
                            @error('konten')
                                | {{ $message }}
                            @enderror
                        </span>
                    </label>
                    <textarea id="myeditorinstance" name="konten">{{ old('konten') }}</textarea>
                </div>
                <div class="mb-6">
                    <label for="gambar" class="block mb-1 text-sm  font-medium">gambar
                        <span class="text-emerald-400 ">
                            @error('gambar')
                                | {{ $message }}
                            @enderror
                        </span>
                    </label>
                    <input type="file" id="gambar" name="gambar" value="{{ old('gambar') }}"
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        >
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('beritaAdmin') }}" class="px-6 py-1 bg-slate-600 hover:bg-slate-700 rounded-md text-white">Kembali</a>
                    <button type="submit" class="px-6 py-1 bg-sky-600 hover:bg-cyan-700 rounded-md text-white">Simpan</button>
                </div>

            </form>
        </div>
    </main>
@endsection
