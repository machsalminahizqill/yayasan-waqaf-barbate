@extends('guest.layouts.master')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />

@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

<script>
    function toggleForm() {
        const tombolDonasi = document.getElementById('tombol-donasi');
        const formulir = document.getElementById('formDonasi');
        formulir.classList.toggle("hidden");
    }

    function togglePembayaran() {
        const buttonGantiPembayaran = document.querySelector('button');
        const metodePembayaran = document.getElementById('nama-bank');

        metodePembayaran.classList.toggle('hidden');
    }
</script>

{{-- <script type="text/javascript">


</script> --}}


    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-ojEypI047x7sFX1T"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript">
        var valJumlahDonasi = '10000';

        var rupiah = document.getElementById('donasi');
        rupiah.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka

            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split   		= number_string.split(','),
            sisa     		= split[0].length % 3,
            rupiah     		= split[0].substr(0, sisa),
            ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
            valJumlahDonasi = number_string;
            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }



        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('donasi-botton');
        var cekDOnasiButton = document.getElementById('has-donasi');
        var snapToken = '';
        var stsSnapToken = localStorage.getItem('value-barbate');
        if (stsSnapToken == null) {
            localStorage.setItem('value-barbate', ' ');
        } else if(stsSnapToken != ' '){
            snapToken = stsSnapToken
            cekDOnasiButton.classList.remove("hidden")
        }
        console.log(stsSnapToken);

        cekDOnasiButton.addEventListener('click', function () {
            showPopUp(snapToken)
        });
        payButton.addEventListener('click', function () {
            axios.post('/api/donasi/get-snaptoken', {
                nama: document.getElementById('nama').value,
                phone: document.getElementById('hp').value,
                totalDonasi : valJumlahDonasi,

            })
            .then(function (response) {
                snapToken = response.data.snap_token
                localStorage.setItem('value-barbate',  snapToken);
                showPopUp(snapToken)
                cekDOnasiButton.classList.remove("hidden")
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });



        });
        function send_response_to_form(result){

            console.log("Donasi Status");
        }

        function showPopUp(dataSnapToken) {
            window.snap.pay(snapToken, {
            // window.snap.pay('ed545e91-73f0-497f-a8e9-732adc84f876', {
                onSuccess: function(result){
                    /* You may add your own implementation here */
                    console.log(result);
                    send_response_to_form(result);
                },
                onPending: function(result){
                    /* You may add your own implementation here */
                    console.log(result);
                    send_response_to_form(result);
                },
                onError: function(result){
                    /* You may add your own implementation here */
                    console.log('error ' + result);
                    send_response_to_form(result);
                },
                onClose: function(){

                }
            })
        }
    </script>
@endsection

@section('content')
<main class="">


    <section class="px-4 sm:px-10 md:px-20 mx-auto w-full   pt-1 lg:w-8/12">
        <!-- carousel -->
        <div id="carouselExampleControls" class="carousel slide relative mt-6" data-bs-ride="carousel">
            <div class="carousel-inner relative w-full overflow-hidden">
                <div class="carousel-item active relative float-left w-full">
                    <img src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp" class="block w-full" alt="Wild Landscape" />
                </div>
                <div class="carousel-item relative float-left w-full">
                    <img src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp" class="block w-full" alt="Camera" />
                </div>
                <div class="carousel-item relative float-left w-full">
                    <img src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp" class="block w-full" alt="Exotic Fruits" />
                </div>
            </div>
            <button class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="pb-24 px-4 md:px-0">
            <div class=" flex-col lg:flex-row flex lg:justify-center lg:gap-4 mt-8">
                <button id="tombol-donasi" onclick="toggleForm()" class="block px-16 py-1 lg:py-1.5 mb-4  text-center text-md bg-emerald-500 rounded-lg text-gray-100 hover:bg-emerald-600 hover:font-semibold md:text-base">
                    Donasi Sekarang
                </button>
                <button id="has-donasi" class="hidden block px-16 py-1 lg:py-1.5 mb-4 text-center text-md bg-sky-600 rounded-lg text-gray-100 hover:bg-sky-700 hover:font-semibold md:text-base">
                    Cek Status Donasi
                </button>
            </div>
            <div class="hidden" id="formDonasi">
                <form class="">
                    <div>
                        <div class="border border-gray-300 p-3 mb-8">
                            <label for="donasi" class="block mb-4 text-sm font-semibold">Nominal Donasi <span class="text-red-500">*</span></label>
                            <input type="text" placeholder="0" id="donasi" name="donasi" value="Rp. 10.000"
                                class="border bg-gray-200 border-gray-300  placeholder:text-gray-900 text-gray-900 text-sm rounded-sm focus:ring-emerald-500 focus:border-emerald-500 block w-full px-2.5 py-1 pt-2">
                            <p class="text-xs text-gray-700 mt-1">miminal donasi Rp. 10.000</p>
                        </div>
                        <div class="border border-gray-300 p-3 mb-8">
                            <p class="mb-4 text-sm font-semibold">Lengkapi Data Donatur</p>
                            <label for="nama" class="block text-sm mb-2">Nama Lengkap</label>
                            <input required type="text" id="nama" name="nama" value="{{ old('nama') }}"
                                class="mb-4 border bg-gray-200 border-gray-300  placeholder:text-gray-900 text-gray-900 text-sm rounded-sm focus:ring-emerald-500 focus:border-emerald-500 block w-full px-2.5 py-1 pt-1.5">

                            <label for="hp" class="block text-sm mb-2">Hp</label>
                            <input required type="number" id="hp" name="hp" value="{{ old('hp') }}"
                            class="mb-4 border bg-gray-200 border-gray-300  placeholder:text-gray-900 text-gray-900 text-sm rounded-sm focus:ring-emerald-500 focus:border-emerald-500 block w-full px-2.5 py-1 pt-1.5">

                        </div>
                    </div>
                </form>
                <form action="/api/donasi/payments/midtrans-notification" id="submit_form" method="POST">
                    @csrf
                    <input type="hidden" name="json" id="json_callback">
                </form>
                <div class="w-full  mb-8">
                    <button id="donasi-botton"  class="w-full bg-sky-600 hover:bg-sky-700 py-1 text-white rounded">Lanjutkan Donasi</button>
                </div>
            </div>


            <p class="mt-2 mb-5 text-center text-sm md:text-lg">atau donasi melalui</p>
            <div class="flex gap-4 p-4 border border-slate-200">
                <a href="" class=" w-10/12 border border-slate-200 bg-slate-100 hover:bg-slate-200 rounded-md py-2 md:w-11/12">
                    <img src="{{ asset('assets/donasi/image/logo-kitabisa.jpg') }}" alt="" class="w-10 rounded-full mb-3 inline-block ml-2">
                    <span class="items-center ml-1 text-sm">Kitabisa.com</span>
                    <img  src="{{ asset('assets/images/peluncuran_YWBIC.jpg') }}" alt="">
                    <p class="py-4 px-6 text-center md:text-sm md:px-2">Ayo bantu saudara kita yang sedang
                        menempuh pendidikan dengan
                        membangun
                        gedung
                        sekolah</p>
                </a>
                <a href="" class=" w-10/12 border border-slate-200 bg-slate-100 hover:bg-slate-200 rounded-md py-2 md:w-11/12">
                    <img src="{{ asset('assets/donasi/image/logo-kitabisa.jpg') }}" alt="" class="w-10 rounded-full mb-3 inline-block ml-2">
                    <span class="items-center ml-1 text-sm">Kitabisa.com</span>
                    <img  src="{{ asset('assets/images/peluncuran_YWBIC.jpg') }}" alt="">
                    <p class="py-4 px-6 text-center md:text-sm md:px-2">Ayo bantu saudara kita yang sedang
                        menempuh pendidikan dengan
                        membangun
                        gedung
                        sekolah</p>
                </a>
                <!-- <a href="" class="mb-4 inline-block w-3/4">
                        <img src="../images/logo-kitabisa.jpg" alt="" class="w-10 rounded-full mb-3 inline-block">
                        <span class="items-center ml-1"></span>Kitabisa.com</span>
                        <img src="../images/ilustrasi donasi.jpg" alt="">
                        <p>Ayo bantu saudara kita yang sedang menempuh pendidikan dengan membangun gedung sekolah</p>
                    </a> -->
            </div>
        </div>

        <!-- <div>
                <form action="">
                    <ul>
                        <li>
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="bg-blue-300">
                        </li>
                        <li>
                            <label for=""></label>
                        </li>
                    </ul>
                </form>
            </div> -->
        <!-- <img src="../images/percobaan.jpg" alt=""> -->
    </main>
</main>
@endsection
