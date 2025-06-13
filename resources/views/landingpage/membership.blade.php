@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')
    <style>
        .membership-bg-img{
            background-image: url('{{asset("lp-img/terms-condition.png")}}');
        }
        @media(max-width: 600px){
            .membership-bg{
                height: 17.5rem !important;
            }
        }
    </style>
    <div class="container-fluid p-0 terms">
        <div class="membership-bg membership-bg-img" style="">
            
        </div>
        <!-- <img src="" alt="" > -->
        <div class="menu-tc-page">
            <div class="header-sub-menu">
                <section class="square me-3"></section>
                <h1 class="label m-0 mt-1" lang="idn">Membership</h1>
                <h1 class="label m-0 mt-1" lang="eng">Keanggotaan</h1>
            </div>
            <div class="container-fluid gpe-l gpe-r">
                <div class="d-flex flex-column justify-content-center gpe-l gpe-r">
                    <div class="content gpe-l gpe-r">
                        <h3 class="m-0" lang="idn">Syarat & Ketentuan</h3>
                        <h3 class="m-0" lang="eng">Terms & Condition</h3>
                         <ol class="m-0" lang="idn">
                            <li>
                                Saat ini bekerja di Departemen Penjaminan Emisi dan/atau terlibat dalam proses Seleksi Risiko.
                            </li>
                            <li>
                                Lengkapi formulir pendaftaran secara online.
                            </li>
                            <li>
                                Bayar Biaya Pendaftaran
                            </li>
                            <li>
                                Bayar Biaya Keanggotaan tahunan.
                            </li>
                            <li>
                                Serahkan dokumen administratif yang diperlukan: bukti pembayaran, salinan tanda pengenal, surat dari pemberi kerja Anda saat ini, dan bukti kualifikasi atau sertifikasi profesional (jika tersedia).
                            </li>
                        </ol>
                        <ol class="m-0" lang="eng">
                            <li>
                                Currently employed in an Underwriting Department and/or involved in the Risk Selection process.
                            </li>
                            <li>
                                Complete the online registration form.
                            </li>
                            <li>
                                Pay the registration fee.
                            </li>
                            <li>
                                Pay the annual membership fee.
                            </li>
                            <li>
                                Submit the required administrative documents: proof of payment, a copy of your identification, a letter from your current employer, and proof of professional qualification or certification (if available).
                            </li>
                        </ol>
                    </div>
                    <div class="content gpe-l gpe-r">
                        <h3 class="m-0" lang="idn">Manfaat</h3>
                        <h3 class="m-0" lang="eng">Benefits</h3>
                        <ol class="m-0" lang="idn">
                            <li>
                                Kartu Keanggotaan.
                            </li>
                            <li>
                                Prioritaskan pada pendaftaran pelatihan/lokakarya/konferensi tingkat tinggi.
                            </li>
                            <li>
                                Harga khusus untuk mitra Rumah Sakit/Laboratorium.
                            </li>
                            <li>
                                Harga spesial Merchandise PERUJI.
                            </li>
                            <li>
                                Harga khusus untuk kemitraan di masa mendatang.
                            </li>
                        </ol>
                        <ol class="m-0" lang="eng">
                            <li>
                                Membership Card.
                            </li>
                            <li>
                                Prioritize in training/workshop/summit registration.
                            </li>
                            <li>
                                Special price for Hospital / Laboratory partner.
                            </li>
                            <li>
                                Special price for PERUJI Merchandise.
                            </li>
                            <li>
                                Special price for future partnership.
                            </li>
                        </ol>
                    </div>
                    <div class="content gpe-l gpe-r">
                        <h3 class="m-0" lang="idn">Cara Untuk Bergabung</h3>
                        <h3 class="m-0" lang="eng">How To Join</h3>
                        <ol class="m-0" lang="idn">
                            <li>
                                Isi formulir pendaftaran melalui Google Forms ( <a href="https://forms.gle/wDrBRnkoWqtNcD2P6" style="background: transparent; color:blue;">https://forms.gle/wDrBRnkoWqtNcD2P6</a> ) atau kirimkan versi cetak.
                            </li>
                            <li>
                                Transfer biaya pendaftaran sebesar Rp100.000.
                            </li>
                            <li>
                                Transfer biaya keanggotaan tahunan sebesar Rp300.000 (biaya ini akan dibebaskan jika Anda menghadiri Underwriting Summit tahunan).
                            </li>
                            <li>
                                Kirimkan dokumen yang dibutuhkan.
                            </li>
                            <li>
                                Keanggotaan berlaku selama satu tahun dan dapat diperbarui.
                            </li>
                        </ol>
                        <ol class="m-0" lang="eng">
                            <li>
                                Complete the registration form via Google Forms ( <a href="https://forms.gle/wDrBRnkoWqtNcD2P6" style="background: transparent; color:blue;">https://forms.gle/wDrBRnkoWqtNcD2P6</a> ) or submit a hardcopy version.
                            </li>
                            <li>
                                Transfer the registration fee of Rp100,000.
                            </li>
                            <li>
                                Transfer the annual membership fee of Rp300,000 (this fee will be waived if you attend the annual Underwriting Summit).
                            </li>
                            <li>
                                Submit the required documents.
                            </li>
                            <li>
                                Membership is valid for one year and is renewable.
                            </li>
                        </ol>
                    </div>
                    <div class="content content-button gpe-l gpe-r">
                        <a href="{{route('membership-signup')}}" class="text-decoration-none px-4 py-2" id="button" lang="idn"
                        style="max-width:120px; text-align: center;">Daftar</a>
                        <a href="{{route('membership-signup')}}" class="text-decoration-none px-4 py-2" id="button" lang="eng"
                        style="max-width:120px; text-align: center;"
                        >SIGN UP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection