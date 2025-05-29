@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')
<style>
    .slide-container {
        display: flex;
        width: 100%;
        height: 100vh;
    }

    .column {
        flex: 1;
        overflow: hidden;
        position: relative;
    }

    .column img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        visibility: hidden;
        animation-fill-mode: forwards;
    }

    @keyframes slideUpOnce {
        0% {
            transform: translateY(100%);
            opacity: 0;
            visibility: visible;
        }
        100% {
            transform: translateY(0%);
            opacity: 1;
            visibility: visible;
        }
    }

    @keyframes slideDownOnce {
        0% {
            transform: translateY(-100%);
            opacity: 0;
            visibility: visible;
        }
        100% {
            transform: translateY(0%);
            opacity: 1;
            visibility: visible;
        }
    }

    .slide-up {
        animation-name: slideUpOnce;
        animation-duration: 2s;
        animation-timing-function: ease-out;
    }

    .slide-down {
        animation-name: slideDownOnce;
        animation-duration: 2s;
        animation-timing-function: ease-out;
    }
</style>
<div class="container-fluid p-0">
    <div class="slide-container" id="imageColumns"></div>
</div>
<div class="container-fluid p-0">
    <!-- <img src="{{asset('lp-img/bom.png')}}" alt="" style="width: 100%;"> -->
    <div class="header-sub-menu d-flex align-items-center">
        <section class="square me-3"></section>
        <div class="label">Board Of Management</div>
    </div>
    <div class="in-bom-page">
        <div class="container">
            <div class="period-container">
                <div class="label">MANAGEMENT PERIOD</div>
                <div class="year">2025 - 2029</div>
            </div>  
            <div class="label-person">Dewan Pengawas</div>
            <div class="person">
                <img src="{{asset('lp-img/BOM/dr-dian-budiani.png')}}" alt="" style="width: 120px; height: 120px; border: 100%;object-fit: cover;border-radius: 100%;margin-right: 20px;">
                <div class="text-person">
                    <div class="label-person-name">dr. Dian Budiani, MBA, FLMI, FLHC, AAIJ, FALU</div>
                </div>
            </div>
            <div class="person">
                <img src="{{asset('lp-img/BOM/dr-benny-h.png')}}" alt="" style="width: 120px; height: 120px; border: 100%;object-fit: cover;border-radius: 100%;margin-right: 20px;">
                <div class="text-person">
                    <div class="label-person-name">Dr. Benny Hadiwibowo, MM, FSAI, AAIJ, AAK, FLMI, AMRP, QIP, CNLA</div>
                </div>
            </div>
            <div class="person">
                <img src="{{asset('lp-img/BOM/dr-sri-rahayu.png')}}" alt="" style="width: 120px; height: 120px; border: 100%;object-fit: cover;border-radius: 100%;margin-right: 20px;">
                <div class="text-person">
                    <div class="label-person-name">dr. Sri Rahayu, AAAIJ, AAK QCRO, CPLHI</div>
                </div>
            </div>
            <div class="label-person">Dewan Pengurus</div>
            <div class="person-2">
                <img src="{{asset('lp-img/BOM/dr-dessy-kusumayati.png')}}" alt="" style="width: 120px; height: 120px; border: 100%;object-fit: cover;border-radius: 100%;margin-right: 20px;">
                <div class="text-person-2">
                    <div class="label-person-content">KETUA</div>
                    <div class="label-person-name">dr. Dessy Kusumayati, AAAIJ, AAK, UND, CRGP, AMRP</div>
                    <div style="font-size: 18px;">Director of Life & Health Business - PT Indoperkasa Suksesjaya Reasuransi</div>
                    
                    <div style="margin-bottom: 30px;">
                        A graduate of the Medical School of UPN Veteran Jakarta, dr. Dessy holds the qualifications of AAAIJ (Ajun Ahli Asuransi Indonesia Jiwa) and AAK (Ahli Asuransi Kesehatan). She began her professional career in 2002 with ACE-INA, a general insurance company, and has amassed over 20 years of experience in the insurance industry, primarily focusing on operational roles. Before joining INARE as the Director of Life and Health Business, she served as the Director of Operations at JAGADIRI (PT Central Asia Financial), a digital insurance company.
                    </div>
                    
                    <div class="label-person-content">WAKIL KETUA</div>
                    <div class="label-person-name">dr. Aditia Gani Ardhi, AAAIJ, AAK, CRMO</div>
                    <div style="font-size: 18px;margin-bottom: 30px;">Head of Claims Department - PT Reasuransi Indonesia Utama</div>
                    
                    <div class="label-person-content">SEKRETARIS</div>
                    <div class="label-person-name">dr. Adi Kurnia Nur, FLMI, FALU, QCRO</div>
                    <div style="font-size: 18px;margin-bottom: 30px;">Head of Operations (interim) - PT FWD Insurance Indonesia</div>
                    
                    <div class="label-person-content">WAKIL SEKRETARIS</div>
                    <div class="label-person-name">dr. Martrifena W. Joseph, MM, ALMI, QRGP</div>
                    <div style="font-size: 18px;margin-bottom: 30px;">VP, Head of New Business and Underwriting - PT AIA Financial</div>
                    
                    <div class="label-person-content">BENDAHARA</div>
                    <div class="label-person-name">dr. Margareta Zenitha, AAAIJ, AAK, FLMI, ARA, QCRO</div>
                    <div style="font-size: 18px;margin-bottom: 30px;">Deputy Head of Life Reinsurance Technical Division (Underwriting and Retro) - PT Maskapai Reasuransi Indonesia Tbk.</div>
                    
                    <div class="label-person-content">WAKIL BENDAHARA</div>
                    <div class="label-person-name">dr. Valencia S. Hahijary</div>
                    <div style="font-size: 18px;margin-bottom: 30px;">(PT PFI Mega Life Insurance)</div>
                    
                    <div class="label-person-content">KETUA BIDANG KEANGGOTAAN</div>
                    <div class="label-person-name">dr. Hendrikus Dharmawan, AAK, CRGP</div>
                    <div style="font-size: 18px;margin-bottom: 30px;">VP, Head of Technical Operations - PT Equity Life Indonesia</div>

                    <div class="label-person-content">KEANGGOTAAN</div>
                    <div class="label-person-name">Reinardo Simon Louhenapessy, SS, AWP, CRMP</div>
                    <div style="font-size: 18px;margin-bottom: 30px;">Manager, New Business and Underwriting - PT Asuransi Ciputra Indonesia</div>

                    <div class="label-person-content">KETUA BIDANG PENDIDIKAN DAN PELATIHAN</div>
                    <div class="label-person-name">Bianka Margareth Simatupang, SFarm, MFarm, QRMP</div>
                    <div style="font-size: 18px;margin-bottom: 30px;">Division Head of Group Operations - PT MSIG Life Insurance Indonesia Tbk.</div>
                    
                    <div class="label-person-content">BIDANG PENDIDIKAN DAN PELATIHAN</div>
                    <div class="label-person-name">dr. Dian Indriasari, MM, AAAIJ, AAAK, AIIS</div>
                    <div style="font-size: 18px;margin-bottom: 30px;">Life Underwriter - PT Reasuransi Nasional Indonesia</div>
                    
                    <div class="label-person-content">KETUA BIDANG HUBUNGAN KELEMBAGAAN</div>
                    <div class="label-person-name">Zulhamdi Rahman, SIA, AAIJ, QCRO</div>
                    <div style="font-size: 18px;margin-bottom: 30px;">Head of Life and Health Insurance Business - PT Indoperkasa Suksesjaya Reasuransi</div>
                    
                    <div class="label-person-content">BIDANG HUBUNGAN KELEMBAGAAN</div>
                    <div class="label-person-name">Dania Virjiyanti, SE, AAAIJ, AAK, CRMO</div>
                    <div style="font-size: 18px;margin-bottom: 30px;">Life Underwriter - PT Tugu Reasuransi Indonesia</div>
                    
                    <div class="label-person-content">BIDANG HUBUNGAN KELEMBAGAAN</div>
                    <div class="label-person-name">dr. Meivyta Husman, MPH (HPE), FLMI, ARA, ACS, ASFI, UND, AIIS, AAK, CGRP, AMRP, QCRO</div>
                    <div style="font-size: 18px;margin-bottom: 30px;">Senior VP, Head of Underwriting - PT Asuransi Jiwa Inhealth Indonesia</div>
                    
                    <div class="label-person-content">KETUA BIDANG HUMAS & WEBSITE</div>
                    <div class="label-person-name">dr. Heru Sutomo, QCRO</div>
                    <div style="font-size: 18px;margin-bottom: 30px;">VP, Underwriting and Claims - PT Prudential Life Assurance Indonesia</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const images = [
        "{{asset('lp-img/BOM/Board-1.png')}}", "{{asset('lp-img/BOM/Board-2.png')}}", "{{asset('lp-img/BOM/Board-3.png')}}", "{{asset('lp-img/BOM/Board-4.png')}}", "{{asset('lp-img/BOM/Board-5.png')}}",
        "{{asset('lp-img/BOM/Board-6.png')}}", "{{asset('lp-img/BOM/Board-7.png')}}", "{{asset('lp-img/BOM/Board-8.png')}}", "{{asset('lp-img/BOM/Board-9.png')}}", "{{asset('lp-img/BOM/Board-10.png')}}",
        "{{asset('lp-img/BOM/Board-11.png')}}", "{{asset('lp-img/BOM/Board-12.png')}}", "{{asset('lp-img/BOM/Board-13.png')}}", "{{asset('lp-img/BOM/Board-14.png')}}"
    ];
    const images_odd = [
        "{{asset('lp-img/BOM/Board-1.png')}}",  "{{asset('lp-img/BOM/Board-3.png')}}", "{{asset('lp-img/BOM/Board-5.png')}}", "{{asset('lp-img/BOM/Board-7.png')}}", "{{asset('lp-img/BOM/Board-9.png')}}", "{{asset('lp-img/BOM/Board-11.png')}}", "{{asset('lp-img/BOM/Board-13.png')}}"
    ];
    const images_even = [
        "{{asset('lp-img/BOM/Board-2.png')}}", "{{asset('lp-img/BOM/Board-4.png')}}", "{{asset('lp-img/BOM/Board-6.png')}}", "{{asset('lp-img/BOM/Board-8.png')}}", "{{asset('lp-img/BOM/Board-10.png')}}", "{{asset('lp-img/BOM/Board-12.png')}}","{{asset('lp-img/BOM/Board-14.png')}}"
    ];

    const container = document.getElementById("imageColumns");

    images.forEach((src, index) => {
        const col = document.createElement("div");
        col.classList.add("column");

        const img = document.createElement("img");
        img.src = src;
        img.alt = `Slice ${index + 1}`;

        const directionClass = index % 2 === 0 ? "slide-up" : "slide-down";
        img.classList.add(directionClass);
        // img.style.animationDelay = `${index * 1}s`;

        col.appendChild(img);
        container.appendChild(col);
    });

    // images_even.forEach((src, index) => {
    //     const col = document.createElement("div");
    //     col.classList.add("column");

    //     const img = document.createElement("img");
    //     img.src = src;
    //     img.alt = `Slice ${index + 1}`;

    //     const directionClass = index % 2 === 0 ? "slide-up" : "slide-down";
    //     img.classList.add(directionClass);
    //     // img.style.animationDelay = `${index * 1}s`;

    //     col.appendChild(img);
    //     container.appendChild(col);
    // });
</script>
@endsection