@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')

<div class="container-fluid p-0">
    <div class="slide-container" id="imageColumns"></div>
</div>
<div class="container-fluid p-0 bom">
    <!-- <img src="{{asset('lp-img/bom.png')}}" alt="" style="width: 100%;"> -->
    <div class="header-sub-menu">
        <section class="square me-3"></section>
        <h1 class="label m-0 mt-1" lang="idn">Dewan Pengurus</h1>
        <h1 class="label m-0 mt-1" lang="eng">Board Of Management</h1>
    </div>
    <div class="in-bom-page">
        <div class="container-fluid">
            <div class="period-container">
                <div class="label" lang="idn">PERIODE MANAJEMEN</div>
                <div class="label" lang="eng">MANAGEMENT PERIOD</div>
                <div class="year">2025 - 2029</div>
                <div class="garis-1"></div>
                <div class="garis-2"></div>
            </div>  
            <div class="label-person" lang="eng">Supervisory Board</div>
            <div class="label-person" lang="idn">Dewan Pengawas</div>
            <div class="person">
                <img src="{{asset('lp-img/BOM/dr-dian-budiani.png')}}" >
                <div class="text-person pl-1">
                    <div class="label-person-name">dr. Dian Budiani, MBA, FLMI, FLHC, AAIJ, FALU</div>
                </div>
            </div>
            <div class="person">
                <img src="{{asset('lp-img/BOM/dr-benny-h.png')}}" >
                <div class="text-person">
                    <div class="label-person-name">Dr. Benny Hadiwibowo, MM, FSAI, AAIJ, AAK, FLMI, AMRP, QIP, CNLA</div>
                </div>
            </div>
            <div class="person">
                <img src="{{asset('lp-img/BOM/dr-sri-rahayu.png')}}" >
                <div class="text-person">
                    <div class="label-person-name">dr. Sri Rahayu, AAAIJ, AAK QCRO, CPLHI</div>
                </div>
            </div>
            <div class="label-person" lang="eng">Board of Management</div>
            <div class="label-person" lang="idn">Dewan Pengurus</div>
            <div class="person-2">
                <img src="{{asset('lp-img/BOM/dr-dessy-kusumayati.png')}}" >
                <div class="text-person-2">
                    <div class="label-person-content" lang="eng">PRESIDENT</div>
                    <div class="label-person-content" lang="idn">KETUA</div>
                    <div class="label-person-name">dr. Dessy Kusumayati, AAAIJ, AAK, UND, CRGP, AMRP</div>
                    <div class="label-person-job">Director of Life & Health Business - PT Indoperkasa Suksesjaya Reasuransi</div>
                    
                    <div class="label-text-desc">
                        A graduate of the Medical School of UPN Veteran Jakarta, dr. Dessy holds the qualifications of AAAIJ (Ajun Ahli Asuransi Indonesia Jiwa) and AAK (Ahli Asuransi Kesehatan). She began her professional career in 2002 with ACE-INA, a general insurance company, and has amassed over 20 years of experience in the insurance industry, primarily focusing on operational roles. Before joining INARE as the Director of Life and Health Business, she served as the Director of Operations at JAGADIRI (PT Central Asia Financial), a digital insurance company.
                    </div>
                    
                    <div class="label-person-content" lang="eng">SECRETARY</div>
                    <div class="label-person-content" lang="idn">SEKRETARIS</div>
                    <div class="label-person-name">dr. Adi Kurnia Nur, FLMI, FALU, QCRO</div>
                    <div class="label-person-job">Head of Operations (interim) - PT FWD Insurance Indonesia</div>
                    
                    <div class="label-person-content" lang="eng">VICE SECRETARY</div>
                    <div class="label-person-content" lang="idn">WAKIL SEKRETARIS</div>
                    <div class="label-person-name">dr. Martrifena W. Joseph, MM, ALMI, QRGP</div>
                    <div class="label-person-job">VP, Head of New Business and Underwriting - PT AIA Financial</div>
                    
                    <div class="label-person-content" lang="eng">TREASURER</div>
                    <div class="label-person-content" lang="idn">BENDAHARA</div>
                    <div class="label-person-name">dr. Margareta Zenitha, AAAIJ, AAK, FLMI, ARA, QCRO</div>
                    <div class="label-person-job">Deputy Head of Life Reinsurance Technical Division (Underwriting and Retro) <br>- PT Maskapai Reasuransi Indonesia Tbk.</div>
                    
                    <div class="label-person-content" lang="eng">VICE TREASURER</div>
                    <div class="label-person-content" lang="idn">WAKIL BENDAHARA</div>
                    <div class="label-person-name">dr. Valencia S. Hahijary, CLI</div>
                    <div class="label-person-job">(PT PFI Mega Life Insurance)</div>
                    
                    <div class="label-person-content" lang="eng">HEAD OF MEMBERSHIP</div>
                    <div class="label-person-content" lang="idn">KETUA BIDANG KEANGGOTAAN</div>
                    <div class="label-person-name">dr. Hendrikus Dharmawan, AAK, CRGP</div>
                    <div class="label-person-job">VP, Head of Technical Operations - PT Equity Life Indonesia</div>

                    <div class="label-person-content" lang="eng">MEMBERSHIP</div>
                    <div class="label-person-content" lang="idn">KEANGGOTAAN</div>
                    <div class="label-person-name">Reinardo Simon Louhenapessy, SS, AWP, CRMP</div>
                    <div class="label-person-job">Manager, New Business and Underwriting - PT Asuransi Ciputra Indonesia</div>

                    <div class="label-person-content" lang="eng">HEAD OF EDUCATION & TRAINING</div>
                    <div class="label-person-content" lang="idn">KETUA BIDANG PENDIDIKAN DAN PELATIHAN</div>
                    <div class="label-person-name">Bianka Margareth Simatupang, SFarm, MFarm, QRMP</div>
                    <div class="label-person-job">Division Head of Group Operations - PT MSIG Life Insurance Indonesia Tbk.</div>
                    
                    <div class="label-person-content" lang="eng">EDUCATION & TRAINING</div>
                    <div class="label-person-content" lang="idn">BIDANG PENDIDIKAN DAN PELATIHAN</div>
                    <div class="label-person-name">dr. Dian Indriasari, MM, AAAIJ, AAAK, AIIS</div>
                    <div class="label-person-job">Life Underwriter - PT Reasuransi Nasional Indonesia</div>
                    
                    <div class="label-person-content" lang="eng">HEAD OF INSTITUTIONAL RELATIONS</div>
                    <div class="label-person-content" lang="idn">KETUA BIDANG HUBUNGAN KELEMBAGAAN</div>
                    <div class="label-person-name">Zulhamdi Rahman, SIA, AAIJ, QCRO</div>
                    <div class="label-person-job">Head of Life and Health Insurance Business - PT Indoperkasa Suksesjaya Reasuransi</div>
                    
                    <div class="label-person-content" lang="eng">INSTITUTIONAL RELATIONS</div>
                    <div class="label-person-content" lang="idn">BIDANG HUBUNGAN KELEMBAGAAN</div>
                    <div class="label-person-name">Dania Virjiyanti, SE, AAAIJ, AAK, CRMO</div>
                    <div class="label-person-job">Life Underwriter - PT Tugu Reasuransi Indonesia</div>
                    
                    <div class="label-person-content" lang="eng">INSTITUTIONAL RELATIONS</div>
                    <div class="label-person-content" lang="idn">BIDANG HUBUNGAN KELEMBAGAAN</div>
                    <div class="label-person-name">dr. Meivyta Husman, MPH (HPE), FLMI, ARA, ACS, ASFI, UND, AIIS, AAK, CGRP, AMRP, QCRO</div>
                    <div class="label-person-job">Senior VP, Head of Underwriting - PT Asuransi Jiwa Inhealth Indonesia</div>
                    
                    <div class="label-person-content" lang="eng">HEAD OF PUBLIC RELATIONS & WEBSITE</div>
                    <div class="label-person-content" lang="idn">KETUA BIDANG HUMAS & WEBSITE</div>
                    <div class="label-person-name">dr. Heru Sutomo, QCRO</div>
                    <div class="label-person-job">VP, Underwriting and Claims - PT Prudential Life Assurance Indonesia</div>
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

    arr_delayed = [];
    images.forEach((src, index) => {
        const col = document.createElement("div");
        col.classList.add("column");

        const img = document.createElement("img");
        img.src = src;
        img.alt = `Slice ${index + 1}`;

        const directionClass = index % 2 === 0 ? "slide-up" : "slide-down";
        img.classList.add(directionClass);
        img.style.animationDelay = `${getRandomIntInclusive(1,2)}s`;

        // col.appendChild(img);
        container.appendChild(img);
    });

    function getRandomIntInclusive(min, max) {
        return Math.random() * (max - min) + min;
    }
    console.log(arr_delayed)

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