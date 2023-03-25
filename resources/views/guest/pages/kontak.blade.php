@extends('guest.layouts.master')

@section('css')

@endsection


@section('js')
@endsection

@section('content')
    <main class="leftright mt-6 mb-8 lg:mb-8 ">
        {{-- <div id="about" class="mb-8">
            <div id="header-news" class="mb-4">
                <h2 class="border-l-4 pl-2 font-semibold border-emerald-500 text-lg lg:text-2xl text-emerald-500">
                    Tentang
                </h2>
            </div>
            <p class="p-2 text-gray-700 text-base md:text-lg text-justify">Ide pendirian Yayasan Waqaf Barbate Islamic City (YWBIC)
                yang diawali dengan
                pendirian
                Dayah dan Madrasah
                Waqaf Barbate
                dikarenakan ada kerisauan dari beberapa orang Pengurus Komite MUQ Pagar Air (diketuai oleh Dr. Sofyan
                A.Gani, M.A) dan
                beberapa Petani Kurma di Blang Bintang Aceh Besar (diprakasai oleh Mahdi Muhammad,SE) terhadap masa
                depan Pendidikan
                anak yatim dan fakir miskin di Aceh. Mereka sering tidak memperoleh Pendidikan yang berkualitas bahkan
                ada yang drop out
                dari sekolah/madrasah karena terkendala dengan keuangan dan perhatian orang tua.
                Kedua belah pihak kemudian sepakat untuk menghadirkan sebuah Dayah dan Madrasah berkualitas yang tidak
                berbayar di
                Serambi Mekkah ini yang mampu menampung sejumlah santri dengan prioritas anak yatim dan fakir miskin.
                Penerimaan santri
                (tingkat MTs) dilakukan secara bertahab setiap tahun sesuai dengan kemampuan Yayasan dan diawali dengan
                santri putra
                dari beberapa Kabupaten/Kota. Ini merupakan secercah cahaya untuk: “memberikan jalan atau Pendidikan
                kepada anak yang
                berhak, tetapi terkendala karena tidak ada orang tua dan terpuruk dari segi ekonomi”.
            </p>
        </div> --}}
        <div id="address" class="mb-8">
            <div id="header-news" class="mb-4">
                <h2 class="border-l-4 pl-2 font-semibold border-emerald-500 text-lg lg:text-2xl text-emerald-500">
                    Alamat
                </h2>
            </div>
            <iframe class="w-full h-64 md:w-[600px] md:h-[450px]"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.155699007324!2d95.50731071409152!3d5.54391833531409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30404f39bb25abad%3A0x37686ed07b23287b!2sKebun%20Kurma%20Barbate%20Al-Mahdy!5e0!3m2!1sid!2sid!4v1668695113552!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div id="contact" class="my-6 lg:my-10">
            <div id="header-news" class="mb-4">
                <h2 class="border-l-4 pl-2 font-semibold border-emerald-500 text-lg lg:text-2xl text-emerald-500">
                    Hubungi Kami Melalui :
                </h2>
            </div>
            <ul
                class=" h-12 lg:h-16 flex justify-center items-center gap-5 mt-2 rounded-md">
                <li><a href="" class="transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 "><img
                            src="/assets/images/whatsapp (1).png" alt=""
                            class="w-8 md:w-10 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"></a>
                </li>
                <li><a href=""><img src="/assets/images/instagram.png" alt=""
                            class="w-8 md:w-10 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"></a>
                </li>
                <li><a href=""><img src="/assets/images/facebook.png" alt=""
                            class="w-8 md:w-10 transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110 duration-300"></a>
                </li>
            </ul>
        </div>
        <div class="min-h-[20vh] lg:min-h-0"></div>
    </main>
@endsection
