@extends('guest.layouts.master')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
<style>
    .fslider {
        position: relative;
        display: block;
        width: 100%;
        height: auto;
        overflow: hidden;
        -webkit-backface-visibility: hidden;
        min-height: 32px;
    }

    .flexslider {
        position: relative;
        margin: 0;
        padding: 0;
    }

    .fslider .flexslider {
        position: relative;
        display: block;
        width: 100%;
        height: auto;
        overflow: hidden;
        -webkit-backface-visibility: hidden;
    }

    .fslider[data-animation="fade"][data-thumbs="true"] .flexslider {
        height: auto !important;
    }

    .slider-wrap {
        margin: 0;
        padding: 0;
        list-style: none;
        border: none;
    }

    .fslider .slider-wrap {
        position: relative;
        display: block;
        width: 100%;
        height: auto;
        overflow: hidden;
        -webkit-backface-visibility: hidden;
    }

    .slider-wrap:after {
        content: "\0020";
        display: block;
        clear: both;
        visibility: hidden;
        line-height: 0;
        height: 0;
    }



    .flex-control-nav {
        margin: 0;
        padding: 0;
        list-style: none;
        border: none;
        display: -ms-flexbox;
        display: flex;
        position: absolute;
        align-items: center;
        justify-content: center;
        width: auto;
        z-index: 10;
        text-align: center;
        top: 14px;
        right: 10px;
    }

    .flex-control-nav.flex-control-thumbs {
        position: relative;
        justify-content: left;
        top: 0;
        left: 0;
        right: 0;
        margin: 2px -2px -2px 0;
        height: auto;
    }

    .fslider.flex-thumb-grid .flex-control-nav.flex-control-thumbs {
        margin: 2px -2px -2px 0;
        height: auto;
    }



    .flex-direction-nav {
        margin: 0;
        padding: 0;
        list-style: none;
        border: none;
    }

    .fslider .slide {
        position: relative;
        display: block;
        width: 100%;
        height: auto;
        overflow: hidden;
        -webkit-backface-visibility: hidden;
    }

    .flexslider .slider-wrap>.slide {
        display: none;
        -webkit-backface-visibility: hidden;
    }


    .flex-control-nav li {
        display: block;
        margin: 0 3px;
        width: 0.625rem;
        height: 0.625rem;
    }

    .flex-control-nav.flex-control-thumbs li {
        margin: 0 2px 2px 0;
        display: block;
        width: 100px !important;
        height: auto !important;
    }

    .fslider.flex-thumb-grid .flex-control-nav.flex-control-thumbs li {
        -ms-flex-preferred-size: 0;
        flex-basis: 0;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%;
        height: auto !important;
        margin: 0;
        padding: 0 2px 2px 0;
    }

    .mb-0 {
        margin-bottom: 0 !important;
    }

    .entry {
        position: relative;
        margin-bottom: 50px;
    }

    .entry:after {
        content: "";
        position: relative;
        height: 2px;
        margin-top: 50px;
        background-color: #f5f5f5;
    }

    img {
        vertical-align: middle;
        max-width: 100%;
    }

    .flex-control-nav.flex-control-thumbs li img {
        cursor: pointer;
        text-indent: -9999px;
        border: 0;
        border-radius: 0;
        margin: 0;
        opacity: 0.5;
        -webkit-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
        display: block;
        width: 100px !important;
        height: auto !important;
    }

    .fslider.flex-thumb-grid .flex-control-nav.flex-control-thumbs li img {
        width: 100% !important;
        height: auto !important;
    }

    .flex-control-nav.flex-control-thumbs li:hover img {
        border-width: 0;
        opacity: 1;
    }

    .flex-control-nav.flex-control-thumbs li img.flex-active {
        border-width: 0;
        opacity: 1;
    }

    .flex-control-nav.flex-control-thumbs li:hover img,
    .flex-control-nav.flex-control-thumbs li img.flex-active {
        border-width: 0;
        opacity: 1;
    }



    .flex-prev {
        position: absolute;
        cursor: pointer;
        z-index: 10;
        top: 50%;
        left: 0;
        background-color: rgba(0, 0, 0, 0.3);
        width: 52px;
        height: 52px;
        border: 0;
        border-radius: 0 3px 3px 0;
        transform: translateY(-50%);
        -webkit-transition: background-color 0.3s ease-in-out;
        -o-transition: background-color 0.3s ease-in-out;
        transition: background-color 0.3s ease-in-out;
    }

    .fslider[data-thumbs="true"] .flex-prev {
        margin-top: -20px;
    }


    .flex-prev:hover {
        background-color: rgba(0, 0, 0, 0.6) !important;
        color: white;
    }

    .flex-next {
        position: absolute;
        cursor: pointer;
        z-index: 10;
        top: 50%;
        left: auto;
        background-color: rgba(0, 0, 0, 0.3);
        width: 52px;
        height: 52px;
        border: 0;
        border-radius: 3px 0 0 3px;
        transform: translateY(-50%);
        -webkit-transition: background-color 0.3s ease-in-out;
        -o-transition: background-color 0.3s ease-in-out;
        transition: background-color 0.3s ease-in-out;
        right: 0;
    }

    .fslider[data-thumbs="true"] .flex-next {
        margin-top: -20px;
    }

    .flex-next:hover {
        background-color: rgba(0, 0, 0, 0.6) !important;
    }

    .flexslider .slider-wrap img {
        width: 100%;
        display: block;
    }

    .bg-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        overflow: hidden;
        z-index: 5;
    }

    .flex-prev i {
        line-height: 50px;
        width: 100%;
        height: 100%;
        color: rgba(255, 255, 255, 0.8);
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);
        font-size: 34px;
        text-align: center;
        transition: color 0.3s ease-in-out;
    }

    .flex-next i {
        line-height: 50px;
        width: 100%;
        height: 100%;
        color: rgba(255, 255, 255, 0.8);
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);
        font-size: 34px;
        text-align: center;
        transition: color 0.3s ease-in-out;
    }

    .justify-content-start {
        justify-content: flex-start !important;
    }

    .align-items-end {
        align-items: flex-end !important;
    }

    .p-4 {
        padding: 1.5rem !important;
    }

    .bg-overlay-content {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        overflow: hidden;
        display: -ms-flexbox;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1;
        padding: 20px;
    }

    .text-overlay-mask {
        opacity: 0.85;
        top: auto;
        bottom: 0;
        height: auto;
        padding: 40px 15px 15px;
        background: -moz-linear-gradient(top,
                rgba(0, 0, 0, 0) 0%,
                rgba(0, 0, 0, 0.85) 100%);
        background: -webkit-gradient(linear,
                left top,
                left bottom,
                color-stop(0%, rgba(0, 0, 0, 0)),
                color-stop(100%, rgba(0, 0, 0, 0.85)));
        background: -webkit-linear-gradient(top,
                rgba(0, 0, 0, 0) 0%,
                rgba(0, 0, 0, 0.85) 100%);
        background: -o-linear-gradient(top,
                rgba(0, 0, 0, 0) 0%,
                rgba(0, 0, 0, 0.85) 100%);
        background: -ms-linear-gradient(top,
                rgba(0, 0, 0, 0) 0%,
                rgba(0, 0, 0, 0.85) 100%);
        background: linear-gradient(to bottom,
                rgba(0, 0, 0, 0) 0%,
                rgba(0, 0, 0, 0.85) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#a6000000', GradientType=0);
    }

    .dark {
        color: #eee;
    }

    .position-relative {
        position: relative !important;
    }

    .w-100 {
        width: 100% !important;
    }

    .nott {
        text-transform: none !important;
    }

    .entry-meta {
        position: relative;
        overflow: hidden;
        margin-top: 5px;
    }

    .ls0 {
        letter-spacing: 0px !important;
    }

    .fw-semibold {
        font-weight: 600 !important;
    }

    .entry-title h3 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .dark h3 {
        color: #eee;
    }

    .entry-title h3 {
        font-size: 20px;
        line-height: 1.4;
        margin-bottom: 20px;
    }

    .entry-title.nott h3 {
        text-transform: none;
    }

    .entry-meta ul {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        align-items: center;
        margin: 0 0 -10px -20px;
        list-style: none;
    }

    .entry-meta.no-separator ul {
        align-items: start;
        margin-left: 0;
    }

    .text-light {
        color: #f8f9fa !important;
    }

    .entry-title a {
        color: #333;
        -webkit-transition: color 0.3s ease;
        -o-transition: color 0.3s ease;
        transition: color 0.3s ease;
    }

    .entry-title h3 a {
        color: #333;
    }

    .dark .entry-title h3 a {
        color: #f7f7f7;
    }

    .entry-title h3 a:hover {
        color: #1abc9c;
    }

    .dark a:not([class*="btn-"]):hover {
        color: #eee;
    }

    .dark .entry-title h3 a:hover {
        color: #1abc9c;
    }

    .entry-meta i {
        position: relative;
        top: 1px;
        padding-left: 1px;
        margin-right: 5px;
    }

    .entry-meta a:not(:hover) {
        color: #999;
    }

    .dark .entry-meta a:not(:hover) {
        color: #bbb;
    }

    .entry-meta li {
        font-size: 0.875rem;
        margin: 0 15px 10px 0;
        color: #999;
    }

    .dark .entry-meta li {
        color: #bbb;
    }

    .entry-meta li a:not(:hover) {
        color: #aaa;
    }

</style>
@endsection


@section('js')
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
<script src="{{ asset('assets/js/functions.js') }}"></script>
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/plugins.min.js') }}"></script>
@endsection

@section('content')
<main>

    <section>
        <div class="relative ">
            <div class="-z-50 absolute h-full  top-0 left-0 right-0 bg-[url('/assets/images/peluncuran_YWBIC.jpg')] bg-no-repeat bg-center bg-cover"></div>
            <div class="-z-50 bg-gray-800/[85%] absolute top-0 left-0 right-0 h-full"></div>
            <div class="leftright w-full h-full lg:flex lg:justify-center gap-4">
                <div class="lg:w-1/3 flex flex-col items-center h-full py-16 lg:pt-14">
                    <div class="h-40">
                        <img class="w-32" src="{{ asset('assets/images/logo.png') }}" alt="">
                    </div>
                    <h2 class="text-gray-200 text-lg xl:text-xl mt-2">Yayasan Waqaf</h2>
                    <h2 class="text-white text-2xl xl:text-3xl font-semibold text-center">BARBATE ISLAMIC CITY</h2>
                    <a href="{{ route('donasiPage') }}" class="px-12 py-1.5 text-white bg-emerald-600 hover:bg-emerald-700 mt-8 rounded-md">Donasi</a>
                </div>
                <div class="hidden lg:block lg:w-2/3 py-20">
                    <h3 class="text-white font-bold lg:text-lg">Sekilas tentang Yayasan Waqaf Barbate Islamic City </h3>
                    <p class="text-white lg:text-sm xl:text-base text-justify text-gray-200 indent-12 mt-2 ">
                        Ide pendirian Yayasan Waqaf Barbate Islamic City (YWBIC) yang diawali dengan pendirian Dayah dan Madrasah Waqaf Barbate dikarenakan ada kerisauan dari beberapa orang Pengurus Komite MUQ Pagar Air (diketuai oleh Dr. Sofyan A.Gani, M.A) dan beberapa Petani Kurma di Blang Bintang Aceh Besar (diprakasai oleh Mahdi Muhammad,SE) terhadap masa depan Pendidikan anak yatim dan fakir miskin di Aceh. Mereka sering tidak memperoleh Pendidikan yang berkualitas bahkan ada yang drop out dari sekolah/madrasah karena terkendala dengan keuangan dan perhatian orang tua.
                    </p>
                    <p class="text-white lg:text-sm xl:text-base text-justify text-gray-200 indent-12 mt-4 ">
                        Kedua belah pihak kemudian sepakat untuk menghadirkan sebuah Dayah dan Madrasah berkualitas yang tidak berbayar di Serambi Mekkah ini yang mampu menampung sejumlah santri dengan prioritas anak yatim dan fakir miskin. Penerimaan santri (tingkat MTs) dilakukan secara bertahab setiap tahun sesuai dengan kemampuan Yayasan dan diawali dengan santri putra dari beberapa Kabupaten/Kota. Ini merupakan secercah cahaya untuk: “memberikan jalan atau Pendidikan kepada anak yang berhak, tetapi terkendala karena tidak ada orang tua dan terpuruk dari segi ekonomi”.
                    </p>
                </div>
            </div>
        </div>
        <div class="leftright lg:hidden mt-4">
            <h3 class="font-bold ">Sekilas tentang Yayasan Waqaf Barbate Islamic City </h3>
            <p class="text-justify text-gray-800 indent-12 mt-2 text-sm lg:text-base">
                Ide pendirian Yayasan Waqaf Barbate Islamic City (YWBIC) yang diawali dengan pendirian Dayah dan Madrasah Waqaf Barbate dikarenakan ada kerisauan dari beberapa orang Pengurus Komite MUQ Pagar Air (diketuai oleh Dr. Sofyan A.Gani, M.A) dan beberapa Petani Kurma di Blang Bintang Aceh Besar (diprakasai oleh Mahdi Muhammad,SE) terhadap masa depan Pendidikan anak yatim dan fakir miskin di Aceh. Mereka sering tidak memperoleh Pendidikan yang berkualitas bahkan ada yang drop out dari sekolah/madrasah karena terkendala dengan keuangan dan perhatian orang tua.
            </p>
            <p class="text-justify text-gray-800 indent-12 mt-2 text-sm lg:text-base">
                Kedua belah pihak kemudian sepakat untuk menghadirkan sebuah Dayah dan Madrasah berkualitas yang tidak berbayar di Serambi Mekkah ini yang mampu menampung sejumlah santri dengan prioritas anak yatim dan fakir miskin. Penerimaan santri (tingkat MTs) dilakukan secara bertahab setiap tahun sesuai dengan kemampuan Yayasan dan diawali dengan santri putra dari beberapa Kabupaten/Kota. Ini merupakan secercah cahaya untuk: “memberikan jalan atau Pendidikan kepada anak yang berhak, tetapi terkendala karena tidak ada orang tua dan terpuruk dari segi ekonomi”.
            </p>
        </div>
    </section>


    <div class=" leftright lg:flex lg:flex-row-reverse lg:justify-between gap-6 mt-4 md:mt-12">
        <div class="lg:w-1/3 relative ">
            <section class="mt-12 lg:mt-0">
                <p class="border-l-4 pl-2 font-semibold uppercase border-emerald-500 text-lg md:text-lg text-emerald-500">
                    Video Profil Yayasan Waqaf Barbate Islamic City
                </p>
                <div class="mt-4 lg:mt-6 ">

                    <iframe class="w-full h-72 md:h-96 lg:h-40 xl:h-52" src="https://www.youtube.com/embed/EodLPE50LGg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" ></iframe>
                </div>
            </section>
        </div>
        <div class="lg:w-2/3 mt-4 lg:mt-0">
            <section class="mt-10 lg:mt-0">
                <div id="header-news" class="mb-4">
                    <p class="border-l-4 pl-2 font-semibold uppercase border-emerald-500 text-lg md:text-2xl text-emerald-500">
                        Gallery
                    </p>
                    <div>
                        <div class="fslider flex-thumb-grid grid-8 mt-4 z-0" data-pagi="false" data-speed="3000" data-pause="3500" data-animation="fade" data-arrows="true" data-thumbs="true">
                            <div class="flexslider" style="height: 570.425px">
                                <div class="slider-wrap">
                                    <div class="slide" data-thumb="/assets/img/galeri/1.jpeg" data-thumb-alt="" style="
                                width: 100%;
                                float: left;
                                margin-right: -100%;
                                position: relative;
                                opacity: 0;
                                display: block;
                                overflow: hidden;
                                z-index: 1;
                              ">
                                        <div class="entry mb-0">
                                            <img src="/assets/img/galeri/1.jpeg" alt="Zikir dan Doa Kebangsaan 77 Tahun Indonesia Merdeka, 1 Agustus 2022" draggable="false" />
                                            <div class="bg-overlay">
                                                <div class="bg-overlay-content text-overlay-mask dark desc-sm align-items-end justify-content-start p-4">
                                                    <div class="position-relative w-100">
                                                        <div class="entry-title nott">
                                                            <h3 class="fw-semibold mb-2 ls0">
                                                                <a href="webpage/kegiatan/zikir-dan-doa-kebangsaan-77-tahun-indonesia-merdeka--1-agustus-2022.html" class="text-light">
                                                                    Zikir dan Doa Kebangsaan 77 Tahun Indonesia Merdeka, 1 Agustus
                                                                    2022
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="entry-meta no-separator">
                                                            <ul>
                                                                <i class="fa-sharp fa-solid fa-angle-left"> </i>
                                                                <a href="webpage/kegiatan/zikir-dan-doa-kebangsaan-77-tahun-indonesia-merdeka--1-agustus-2022.html">
                                                                    02 Aug 2022
                                                                </a>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide" data-thumb="/assets/img/galeri/2.jpeg" data-thumb-alt="" style="
                                width: 100%;
                                float: left;
                                margin-right: -100%;
                                position: relative;
                                opacity: 0;
                                display: block;
                                z-index: 1;
                              ">
                                        <div class="entry mb-0">
                                            <img src="/assets/img/galeri/2.jpeg" alt="Kunjungan Delegasi Y20 di Masjid Raya Baiturrahman" draggable="false" />
                                            <div class="bg-overlay">
                                                <div class="bg-overlay-content text-overlay-mask dark desc-sm align-items-end justify-content-start p-4">
                                                    <div class="position-relative w-100">
                                                        <div class="entry-title nott">
                                                            <h3 class="fw-semibold mb-2 ls0">
                                                                <a href="webpage/kegiatan/kunjungan-delegasi-y20-di-masjid-Masjid Raya Baiturrahman.html" class="text-light">
                                                                    Kunjungan Delegasi Y20 di Masjid Raya Baiturrahman
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="entry-meta no-separator">
                                                            <ul>
                                                                <li>
                                                                    <i class="fa-sharp fa-solid fa-angle-left"> </i>
                                                                    <a href="webpage/kegiatan/kunjungan-delegasi-y20-di-masjid-Masjid Raya Baiturrahman.html">
                                                                        20 Jul 2022
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide" data-thumb="/assets/img/galeri/1.jpeg" data-thumb-alt="" style="
                                width: 100%;
                                float: left;
                                margin-right: -100%;
                                position: relative;
                                opacity: 0;
                                display: block;
                                z-index: 1;
                              ">
                                        <div class="entry mb-0">
                                            <img src="/assets/img/galeri/1.jpeg" alt="Zikir dan Doa Kebangsaan 77 Tahun Indonesia Merdeka, 1 Agustus 2022" draggable="false" />
                                            <div class="bg-overlay">
                                                <div class="bg-overlay-content text-overlay-mask dark desc-sm align-items-end justify-content-start p-4">
                                                    <div class="position-relative w-100">
                                                        <div class="entry-title nott">
                                                            <h3 class="fw-semibold mb-2 ls0">
                                                                <a href="webpage/kegiatan/zikir-dan-doa-kebangsaan-77-tahun-indonesia-merdeka--1-agustus-2022.html" class="text-light">
                                                                    Zikir dan Doa Kebangsaan 77 Tahun Indonesia Merdeka, 1 Agustus
                                                                    2022
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="entry-meta no-separator">
                                                            <ul>
                                                                <i class="fa-sharp fa-solid fa-angle-left"> </i>
                                                                <a href="webpage/kegiatan/zikir-dan-doa-kebangsaan-77-tahun-indonesia-merdeka--1-agustus-2022.html">
                                                                    02 Aug 2022
                                                                </a>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide" data-thumb="/assets/img/galeri/2.jpeg" data-thumb-alt="" style="
                                width: 100%;
                                float: left;
                                margin-right: -100%;
                                position: relative;
                                opacity: 0;
                                display: block;
                                z-index: 1;
                              ">
                                        <div class="entry mb-0">
                                            <img src="/assets/img/galeri/2.jpeg" alt="Kunjungan Delegasi Y20 di Masjid Raya Baiturrahman" draggable="false" />
                                            <div class="bg-overlay">
                                                <div class="bg-overlay-content text-overlay-mask dark desc-sm align-items-end justify-content-start p-4">
                                                    <div class="position-relative w-100">
                                                        <div class="entry-title nott">
                                                            <h3 class="fw-semibold mb-2 ls0">
                                                                <a href="webpage/kegiatan/kunjungan-delegasi-y20-di-masjid-Masjid Raya Baiturrahman.html" class="text-light">
                                                                    Kunjungan Delegasi Y20 di Masjid Raya Baiturrahman
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="entry-meta no-separator">
                                                            <ul>
                                                                <li>
                                                                    <i class="fa-sharp fa-solid fa-angle-left"> </i>
                                                                    <a href="webpage/kegiatan/kunjungan-delegasi-y20-di-masjid-Masjid Raya Baiturrahman.html">
                                                                        20 Jul 2022
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide" data-thumb="/assets/img/galeri/1.jpeg" data-thumb-alt="" style="
                                width: 100%;
                                float: left;
                                margin-right: -100%;
                                position: relative;
                                opacity: 0;
                                display: block;
                                z-index: 1;
                              ">
                                        <div class="entry mb-0">
                                            <img src="/assets/img/galeri/1.jpeg" alt="Zikir dan Doa Kebangsaan 77 Tahun Indonesia Merdeka, 1 Agustus 2022" draggable="false" />
                                            <div class="bg-overlay">
                                                <div class="bg-overlay-content text-overlay-mask dark desc-sm align-items-end justify-content-start p-4">
                                                    <div class="position-relative w-100">
                                                        <div class="entry-title nott">
                                                            <h3 class="fw-semibold mb-2 ls0">
                                                                <a href="webpage/kegiatan/zikir-dan-doa-kebangsaan-77-tahun-indonesia-merdeka--1-agustus-2022.html" class="text-light">
                                                                    Zikir dan Doa Kebangsaan 77 Tahun Indonesia Merdeka, 1 Agustus
                                                                    2022
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="entry-meta no-separator">
                                                            <ul>
                                                                <i class="fa-sharp fa-solid fa-angle-left"> </i>
                                                                <a href="webpage/kegiatan/zikir-dan-doa-kebangsaan-77-tahun-indonesia-merdeka--1-agustus-2022.html">
                                                                    02 Aug 2022
                                                                </a>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide" data-thumb="/assets/img/galeri/2.jpeg" data-thumb-alt="" style="
                                width: 100%;
                                float: left;
                                margin-right: -100%;
                                position: relative;
                                opacity: 0;
                                display: block;
                                z-index: 1;
                              ">
                                        <div class="entry mb-0">
                                            <img src="/assets/img/galeri/2.jpeg" alt="Kunjungan Delegasi Y20 di Masjid Raya Baiturrahman" draggable="false" />
                                            <div class="bg-overlay">
                                                <div class="bg-overlay-content text-overlay-mask dark desc-sm align-items-end justify-content-start p-4">
                                                    <div class="position-relative w-100">
                                                        <div class="entry-title nott">
                                                            <h3 class="fw-semibold mb-2 ls0">
                                                                <a href="webpage/kegiatan/kunjungan-delegasi-y20-di-masjid-Masjid Raya Baiturrahman.html" class="text-light">
                                                                    Kunjungan Delegasi Y20 di Masjid Raya Baiturrahman
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="entry-meta no-separator">
                                                            <ul>
                                                                <li>
                                                                    <i class="fa-sharp fa-solid fa-angle-left"> </i>
                                                                    <a href="webpage/kegiatan/kunjungan-delegasi-y20-di-masjid-Masjid Raya Baiturrahman.html">
                                                                        20 Jul 2022
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide" data-thumb="/assets/img/galeri/1.jpeg" data-thumb-alt="" style="
                                width: 100%;
                                float: left;
                                margin-right: -100%;
                                position: relative;
                                opacity: 0;
                                display: block;
                                z-index: 1;
                              ">
                                        <div class="entry mb-0">
                                            <img src="/assets/img/galeri/1.jpeg" alt="Zikir dan Doa Kebangsaan 77 Tahun Indonesia Merdeka, 1 Agustus 2022" draggable="false" />
                                            <div class="bg-overlay">
                                                <div class="bg-overlay-content text-overlay-mask dark desc-sm align-items-end justify-content-start p-4">
                                                    <div class="position-relative w-100">
                                                        <div class="entry-title nott">
                                                            <h3 class="fw-semibold mb-2 ls0">
                                                                <a href="webpage/kegiatan/zikir-dan-doa-kebangsaan-77-tahun-indonesia-merdeka--1-agustus-2022.html" class="text-light">
                                                                    Zikir dan Doa Kebangsaan 77 Tahun Indonesia Merdeka, 1 Agustus
                                                                    2022
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="entry-meta no-separator">
                                                            <ul>
                                                                <i class="fa-sharp fa-solid fa-angle-left"> </i>
                                                                <a href="webpage/kegiatan/zikir-dan-doa-kebangsaan-77-tahun-indonesia-merdeka--1-agustus-2022.html">
                                                                    02 Aug 2022
                                                                </a>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide" data-thumb="/assets/img/galeri/2.jpeg" data-thumb-alt="" style="
                                width: 100%;
                                float: left;
                                margin-right: -100%;
                                position: relative;
                                opacity: 0;
                                display: block;
                                z-index: 1;
                              ">
                                        <div class="entry mb-0 ">
                                            <img src="/assets/img/galeri/2.jpeg" alt="Kunjungan Delegasi Y20 di Masjid Raya Baiturrahman" draggable="false" />
                                            <div class="bg-overlay">
                                                <div class="bg-overlay-content text-overlay-mask dark desc-sm align-items-end justify-content-start p-4">
                                                    <div class="position-relative w-100">
                                                        <div class="entry-title nott">
                                                            <h3 class="fw-semibold mb-2 ls0">
                                                                <a href="webpage/kegiatan/kunjungan-delegasi-y20-di-masjid-Masjid Raya Baiturrahman.html" class="text-light">
                                                                    Kunjungan Delegasi Y20 di Masjid Raya Baiturrahman
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div class="entry-meta no-separator">
                                                            <ul>
                                                                <li>
                                                                    <i class="fa-sharp fa-solid fa-angle-left"> </i>
                                                                    <a href="webpage/kegiatan/kunjungan-delegasi-y20-di-masjid-Masjid Raya Baiturrahman.html">
                                                                        20 Jul 2022
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <ul class="flex-direction-nav ">
                                    <li class="flex-nav-prev">
                                        <a class="flex-prev overflow-hidden " href="#">
                                            <div class="w-full h-full flex justify-center items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 text-white " viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                                                </svg>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="flex-nav-next">
                                        <a class="flex-next" href="#">
                                            <div class="w-full h-full flex justify-center items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-6 text-white " viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                                </svg>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="news" class="mt-12">
                <div id="header-news" class="mb-4">
                    <p class="border-l-4 pl-2 font-semibold uppercase border-emerald-500 text-lg md:text-2xl text-emerald-500">
                        Berita Terbaru
                    </p>
                </div>
                <div id="body-news">
                    @foreach ($beritas as $berita)
                    <div class="lg:flex lg:justify-start lg:gap-4 mb-6 p-4 lg:p-6 bg-slate-50">
                        <div class="lg:w-1/3 select-none">
                            <img src="{{ $berita->gambar }}" alt="">
                        </div>
                        <div class="lg:w-2/3 mt-3 lg:mt-0">
                            <a href="{{ '/berita/' . $berita->slug . '.' . $berita->id }}" class="text-lg  font-bold leading-tight uppercase transition-all duration-500 ease-in-out hover:text-[#1abc9c]">
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
                                <a href="{{ '/berita/' . $berita->slug . '.' . $berita->id }}" class="px-6 py-1.5 md:py-1.5 bg-emerald-600 hover:bg-emerald-700 rounded-md text-white">Lihat Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </section>
        </div>
    </div>

</main>

@endsection
