@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')
<style type="text/css">
    /* Board Of Management Page */
        
        .square {
            background-color: #F7941D;
            width: 50px;
            height: 50px;
        }

        .header-sub-menu {
            padding: 30px 0px;
            display: flex;
            justify-content: center;
            color: white;
            background-color: black;
        }
        .header-sub-menu .label-bom {
            font-size: 45px;
        }

        .in-bom-page {
            padding: 100px 0;
            background-color: #f0f0f0;
        }
        .in-bom-page .period-container {
            text-align: center;
            border-left: 3px solid #F7941D;
            border-right: 3px solid #F7941D;
            width: 200px;
        }
        .in-bom-page .period-container .label {
            font-size: 14px;
            font-weight:600;
        }
        .in-bom-page .period-container .year {
            font-size: 27px;
            font-weight:500;
        }

        .in-bom-page .container h2 {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .in-bom-page .label-person {
            font-size: 35px;
            padding-top: 40px;
            color: #F7941D;
        }
        .in-bom-page .label-person-content {
            font-size: 20px;
            font-weight:700;
        }
        .in-bom-page .label-person-name {
            font-size: 22px;
        }
        .in-bom-page .container .person{
            display: flex;
            align-items: center;
            padding: 20px 100px;
        }

        .in-bom-page .container .person-2{
            display: flex;
            padding: 20px 100px;
        }

    /* Close Board Of Management Page */
</style>
<!-- About -->
    <div class="container-fluid p-0">
        <img src="{{asset('lp-img/bom.png')}}" alt="" style="width: 100%;">
            <div class="header-sub-menu d-flex align-items-center">
                <section class="square me-3"></section>
                <div class="label-bom">Board Of Management</div>
            </div>
            <div class="in-bom-page">
                <div class="container">
                    <div class="period-container">
                        <div class="label">MANAGEMENT PERIOD</div>
                        <div class="year">2025 - 2029</div>
                    </div>  
                    <div class="label-person">Dewan Pengawas</div>
                    <div class="person">
                        <img src="{{asset('lp-img/b3e6ca7f567ed2a05fd39a6bab34170d509e686d.png')}}" alt="" style="width: 120px; height: 120px; border: 100%;object-fit: cover;border-radius: 100%;margin-right: 20px;">
                        <div class="text-person">
                            <div class="label-person-content">KETUA</div>
                            <div class="label-person-name">Bambang Lukito, FLMI, ALHC, ACS, AIAA</div>
                        </div>
                    </div>
                    <div class="person">
                        <img src="{{asset('lp-img/b3e6ca7f567ed2a05fd39a6bab34170d509e686d.png')}}" alt="" style="width: 120px; height: 120px; border: 100%;object-fit: cover;border-radius: 100%;margin-right: 20px;">
                        <div class="text-person">
                            <div class="label-person-content">ANGGOTA</div>
                            <div class="label-person-name">Agus Muharam</div>
                        </div>
                    </div>
                    <div class="person">
                        <img src="{{asset('lp-img/b3e6ca7f567ed2a05fd39a6bab34170d509e686d.png')}}" alt="" style="width: 120px; height: 120px; border: 100%;object-fit: cover;border-radius: 100%;margin-right: 20px;">
                        <div class="text-person">
                            <div class="label-person-content">ANGGOTA</div>
                            <div class="label-person-name">Faustinus Wirasadi</div>
                        </div>
                    </div>
                    <div class="person">
                        <img src="{{asset('lp-img/b3e6ca7f567ed2a05fd39a6bab34170d509e686d.png')}}" alt="" style="width: 120px; height: 120px; border: 100%;object-fit: cover;border-radius: 100%;margin-right: 20px;">
                        <div class="text-person">
                            <div class="label-person-content">ANGGOTA</div>
                            <div class="label-person-name">Amos Napitupulu</div>
                        </div>
                    </div>
                    <h2>Dewan Pengurus</h2>
                    <div class="person-2">
                        <img src="{{asset('lp-img/b3e6ca7f567ed2a05fd39a6bab34170d509e686d.png')}}" alt="" style="width: 120px; height: 120px; border: 100%;object-fit: cover;border-radius: 100%;margin-right: 20px;">
                        <div class="text-person-2">
                            <div class="label-person-content">KETUA</div>
                            <div class="label-person-name">de. Dessy Kusmayati</div>
                            <div style="font-size: 18px;">(PT Indoperkasa Suksesjaya Reasuransi)</div>
                            
                            <div style="margin-bottom: 30px;">
                                Ketua Dewan Pengawas ini lahir di Pati, 1 Juli 1943. Gelar yang beliau milki Fellow Life Managemen Institute (FLMI); Associate Customer Service (ACS); Associate Insurance Agency Administration (AIAA) dari Life Office Management Association (LOMA) dan Associate Life & Health Claims (ALHC) dari International Claim Association (ICA) Memulai karir asuransi pada Asuransi Jiwa Bumi Asih Jaya sebagai Underwriting, Claims & Reinsurance Manager (1973-1984); Direktur Underwriting, Claims & Reinsurance Asuransi Jiwa Manulife Indonesia (1984-2003). Saat ini sebagai Ajudikator BMAI.
                            </div>
                            
                            <div class="label-person-content">WAKIL KETUA</div>
                            <div class="label-person-name">dr. Aditia Gani Ardhi</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT Reasuransi Indonesia Utama)</div>
                            
                            <div class="label-person-content">SEKRETARIS</div>
                            <div class="label-person-name">dr. Adi Kurnia Nur</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT FWD Insurance Indonesia)</div>
                            
                            <div class="label-person-content">WAKIL SEKRETARIS</div>
                            <div class="label-person-name">dr. Martrifena W. Joseph</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT AIA Financial)</div>
                            
                            <div class="label-person-content">BENDAHARA</div>
                            <div class="label-person-name">dr. Margareta Zenitha</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT Maskapai Reasuransi Indonesia Tbk.)</div>
                            
                            <div class="label-person-content">WAKIL BENDAHARA</div>
                            <div class="label-person-name">dr. Valencia S. Hahijary</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT PFI Mega Life Insurance)</div>
                            
                            <div class="label-person-content">KETUA BIDANG KEANGGOTAAN</div>
                            <div class="label-person-name">dr. Hendrikus Dharmawan</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT Equity Life Indonesia)</div>

                            <div class="label-person-content">KEANGGOTAAN</div>
                            <div class="label-person-name">Reinardo Simon Louhenapessy</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT Asuransi Ciputra Indonesia)</div>

                            <div class="label-person-content">KETUA BIDANG PENDIDIKAN DAN PELATIHAN</div>
                            <div class="label-person-name">Bianka Margareth Simatupang</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT MSIG Life Insurance Indonesia Tbk.)</div>
                            
                            <div class="label-person-content">BIDANG PENDIDIKAN DAN PELATIHAN</div>
                            <div class="label-person-name">dr. Dian Indriasari</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT Reasuransi Nasional Indonesia)</div>
                            
                            <div class="label-person-content">KETUA BIDANG HUBUNGAN KELEMBAGAAN</div>
                            <div class="label-person-name">Zulhamdi Rahman</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT Indoperkasa Suksesjaya Reasuransi)</div>
                            
                            <div class="label-person-content">BIDANG HUBUNGAN KELEMBAGAAN</div>
                            <div class="label-person-name">Dania Virjiyanti</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT Tugu Reasuransi Indonesia)</div>
                            
                            <div class="label-person-content">BIDANG HUBUNGAN KELEMBAGAAN</div>
                            <div class="label-person-name">dr. Meivyta Husman</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT Asuransi Jiwa Inhealth)</div>
                            
                            <div class="label-person-content">KETUA BIDANG HUMAS & WEBSITE</div>
                            <div class="label-person-name">dr. Heru Sutomo</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT Prudential Life Assurance)</div>
                        </div>
                    </div>
                    <hr style="border: 2px solid #F7941D;margin-bottom: 40px;">
                    <div class="period-container">
                        <div class="label">MANAGEMENT PERIOD</div>
                        <div class="year">2021 - 2025</div>
                    </div>  
                    <div class="person-2">
                        <img src="{{asset('lp-img/b3e6ca7f567ed2a05fd39a6bab34170d509e686d.png')}}" alt="" style="width: 120px; height: 120px; border: 100%;object-fit: cover;border-radius: 100%;margin-right: 20px;">
                        <div class="text-person-2">
                            <div class="label-person-content">KETUA</div>
                            <div class="label-person-name">Radix Yunanto, ST, MM, AAIJ</div>
                            <div style="font-size: 18px;">(PT Reasuransi Indonesia Utama)</div>
                            
                            <div style="margin-bottom: 30px;">
                                Ketua Dewan Pengawas ini lahir di Pati, 1 Juli 1943. Gelar yang beliau milki Fellow Life Managemen Institute (FLMI); Associate Customer Service (ACS); Associate Insurance Agency Administration (AIAA) dari Life Office Management Association (LOMA) dan Associate Life & Health Claims (ALHC) dari International Claim Association (ICA) Memulai karir asuransi pada Asuransi Jiwa Bumi Asih Jaya sebagai Underwriting, Claims & Reinsurance Manager (1973-1984); Direktur Underwriting, Claims & Reinsurance Asuransi Jiwa Manulife Indonesia (1984-2003). Saat ini sebagai Ajudikator BMAI.
                            </div>

                            <div class="label-person-content">WAKIL KETUA</div>
                            <div class="label-person-name mb-3">dr. Sigit Adiwijaya</div>
                            
                            <div class="label-person-content">SEKRETARIS 1</div>
                            <div class="label-person-name mb-3">dr. Adi Kurnia Nur, FLMI</div>
                            
                            <div class="label-person-content">SEKRETARIS 2</div>
                            <div class="label-person-name mb-3">Erly Yuliantika</div>
                            
                            <div class="label-person-content">BENDAHARA 1</div>
                            <div class="label-person-name mb-3">dr. Margareta Zenitha</div>
                            
                            <div class="label-person-content">BENDAHARA 2</div>
                            <div class="label-person-name mb-3">Yosiana Herniyati Rezeki</div>
                            
                            <div class="label-person-content">ETIKA & PENGEMBANGAN ORGANISASI 1</div>
                            <div class="label-person-name mb-3">dr. Kiki Oditya Gunawardhana</div>
                            
                            <div class="label-person-content">ETIKA & PENGEMBANGAN ORGANISASI 2</div>
                            <div class="label-person-name mb-3">Erna Malikin</div>
                            
                            <div class="label-person-content">HUBUNGAN MASYARAKAT 1</div>
                            <div class="label-person-name mb-3">dr. Heru Sutomo</div>

                            <div class="label-person-content">HUBUNGAN MASYARAKAT 2</div>
                            <div class="label-person-name mb-3">Zulhamdi Rahman</div>

                            <div class="label-person-content">KEANGGOTAAN & PENGEMBANGAN PROFESI 1</div>
                            <div class="label-person-name mb-3">Ahmad Sundaludin</div>

                            <div class="label-person-content">KEANGGOTAAN & PENGEMBANGAN PROFESI 2</div>
                            <div class="label-person-name">Reinardo Simon Louhenapessy</div>
                            <div style="font-size: 18px;" class="mb-3">(PT MSIG Life Insurance Indonesia Tbk.)</div>
                            
                            <div class="label-person-content">KEANGGOTAAN & PENGEMBANGAN PROFESI 3</div>
                            <div class="label-person-name mb-3">Lia Amalia</div>
                            
                            <div class="label-person-content">KOMPETENSI & SERTIFIKASI PROFESI 1</div>
                            <div class="label-person-name mb-3">dr. Dessy Kusumayati</div>
                            
                            <div class="label-person-content">KOMPETENSI & SERTIFIKASI PROFESI 2</div>
                            <div class="label-person-name mb-3">dr. Meivyta Husman</div>
                            
                            <div class="label-person-content">KOMPETENSI & SERTIFIKASI PROFESI 3</div>
                            <div class="label-person-name mb-3">dr. Aditia Gani Ardhi</div>
                        </div>
                    </div>
                    <hr style="border: 2px solid #F7941D;margin-bottom: 40px;">
                    <div class="period-container">
                        <div class="label">MANAGEMENT PERIOD</div>
                        <div class="year">2018 - 2021</div>
                    </div>  
                    <div class="person-2">
                        <img src="{{asset('lp-img/b3e6ca7f567ed2a05fd39a6bab34170d509e686d.png')}}" alt="" style="width: 120px; height: 120px; border: 100%;object-fit: cover;border-radius: 100%;margin-right: 20px;">
                        <div class="text-person-2">
                            <div class="label-person-content">KETUA</div>
                            <div class="label-person-name">Radix Yunanto, ST, MM, AAIJ</div>
                            <div style="font-size: 18px;">(PT Reasuransi Indonesia Utama)</div>
                            
                            <div style="margin-bottom: 30px;">
                                Ketua Dewan Pengawas ini lahir di Pati, 1 Juli 1943. Gelar yang beliau milki Fellow Life Managemen Institute (FLMI); Associate Customer Service (ACS); Associate Insurance Agency Administration (AIAA) dari Life Office Management Association (LOMA) dan Associate Life & Health Claims (ALHC) dari International Claim Association (ICA) Memulai karir asuransi pada Asuransi Jiwa Bumi Asih Jaya sebagai Underwriting, Claims & Reinsurance Manager (1973-1984); Direktur Underwriting, Claims & Reinsurance Asuransi Jiwa Manulife Indonesia (1984-2003). Saat ini sebagai Ajudikator BMAI.
                            </div>

                            <div class="label-person-content">SEKRETARIS</div>
                            <div class="label-person-name">H.R. Yosiana</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT Reasuransi Indonesia Utama)</div>
                            
                            <div class="label-person-content">BENDAHARA</div>
                            <div class="label-person-name">dr. Margareta Zenitha</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT Maskapai Reasuransi Indonesia Tbk.)</div>
                            
                            <div class="label-person-content">KETUA BIDANG PENDIDIKAN & STANDAR KOMPETENSI</div>
                            <div class="label-person-name">dr. Dessy Kusumayati</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT Indoperkasa Suksesjaya Reasuransi)</div>
                            
                            <div class="label-person-content">KETUA BIDANG TEKNOLOGI INFORMASI</div>
                            <div class="label-person-name">dr. Sigit Adiwijaya</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT Tugu Reasuransi Indonesia)</div>
                            
                            <div class="label-person-content">KETUA BIDANG HUBUNGAN MASYARAKAT</div>
                            <div class="label-person-name">dr. Adi Kurnia Nur, FLMI</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT FWD Insurance Indonesia)</div>
                         </div>
                    </div>
                    <hr style="border: 2px solid #F7941D;margin-bottom: 40px;">
                    <div class="period-container">
                        <div class="label">MANAGEMENT PERIOD</div>
                        <div class="year">2014 - 2018</div>
                    </div>  
                    <div class="person-2">
                        <img src="{{asset('lp-img/b3e6ca7f567ed2a05fd39a6bab34170d509e686d.png')}}" alt="" style="width: 120px; height: 120px; border: 100%;object-fit: cover;border-radius: 100%;margin-right: 20px;">
                        <div class="text-person-2">
                            <div class="label-person-content">KETUA</div>
                            <div class="label-person-name">dr. Asri Wulan, AAAIJ, CPLHI, Certificate in Risk Selection</div>
                            <div style="font-size: 18px;">(PT Reasuransi Indonesia Utama)</div>
                            
                            <div style="margin-bottom: 30px;">
                                Ketua Dewan Pengawas ini lahir di Pati, 1 Juli 1943. Gelar yang beliau milki Fellow Life Managemen Institute (FLMI); Associate Customer Service (ACS); Associate Insurance Agency Administration (AIAA) dari Life Office Management Association (LOMA) dan Associate Life & Health Claims (ALHC) dari International Claim Association (ICA) Memulai karir asuransi pada Asuransi Jiwa Bumi Asih Jaya sebagai Underwriting, Claims & Reinsurance Manager (1973-1984); Direktur Underwriting, Claims & Reinsurance Asuransi Jiwa Manulife Indonesia (1984-2003). Saat ini sebagai Ajudikator BMAI.
                            </div>

                            <div class="label-person-content">SEKRETARIS</div>
                            <div class="label-person-name">H.R. Yosiana</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT Reasuransi Indonesia Utama)</div>
                            
                            <div class="label-person-content">BENDAHARA</div>
                            <div class="label-person-name">dr. Margareta Zenitha</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT Maskapai Reasuransi Indonesia Tbk.)</div>
                            
                            <div class="label-person-content">KETUA BIDANG PENDIDIKAN & STANDAR KOMPETENSI</div>
                            <div class="label-person-name">dr. Dessy Kusumayati</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT Indoperkasa Suksesjaya Reasuransi)</div>
                            
                            <div class="label-person-content">KETUA BIDANG TEKNOLOGI INFORMASI</div>
                            <div class="label-person-name">dr. Sigit Adiwijaya</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT Tugu Reasuransi Indonesia)</div>
                            
                            <div class="label-person-content">KETUA BIDANG HUBUNGAN MASYARAKAT</div>
                            <div class="label-person-name">dr. Adi Kurnia Nur, FLMI</div>
                            <div style="font-size: 18px;margin-bottom: 30px;">(PT FWD Insurance Indonesia)</div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<!-- Close About -->
@endsection