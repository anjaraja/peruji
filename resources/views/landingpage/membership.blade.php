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
                        <ol class="m-0">
                            <li lang="idn">
                                Saat ini bekerja di Departemen Penjaminan Emisi dan/atau terlibat dalam proses Seleksi Risiko.
                            </li>
                            <li lang="eng">
                                Currently employed in an Underwriting Department and/or involved in the Risk Selection process.
                            <li lang="idn">
                                Lengkapi formulir pendaftaran secara online.
                            </li>
                            <li lang="eng">
                                Complete the online registration form.
                            </li>
                            <li lang="idn">
                                Bayar Biaya Pendaftaran
                            </li>
                            <li lang="eng">
                                Pay the registration fee.
                            </li>
                            <li lang="idn">
                                Bayar Biaya Keanggotaan tahunan.
                            </li>
                            <li lang="eng">
                                Pay the annual membership fee.
                            </li>
                            <li lang="idn">
                                Serahkan dokumen administratif yang diperlukan: bukti pembayaran, salinan tanda pengenal, surat dari pemberi kerja Anda saat ini, dan bukti kualifikasi atau sertifikasi profesional (jika tersedia).
                            </li>
                            <li lang="eng">
                                Submit the required administrative documents: proof of payment, a copy of your identification, a letter from your current employer, and proof of professional qualification or certification (if available).
                            </li>
                        </ol>
                    </div>
                    <div class="content gpe-l gpe-r">
                        <h3 class="m-0" lang="idn">Manfaat</h3>
                        <h3 class="m-0" lang="eng">Benefits</h3>
                        <ol class="m-0">
                            <li lang="idn">
                                Kartu Keanggotaan.
                            </li>
                            <li lang="eng">
                                Membership Card.
                            </li>
                            <li lang="idn">
                                Prioritaskan pada pendaftaran pelatihan/lokakarya/konferensi tingkat tinggi.
                            <li>
                            <li lang="eng">
                                Prioritize in training/workshop/summit registration.
                            </li>
                            <li lang="idn">
                                Harga khusus untuk mitra Rumah Sakit/Laboratorium.
                            </li>
                            <li lang="eng">
                                Special price for Hospital / Laboratory partner.
                            </li>
                            <li lang="idn">
                                Harga spesial Merchandise PERUJI.
                            </li>
                            <li lang="eng">
                                Special price for PERUJI Merchandise.
                            </li>
                            <li lang="idn">
                                Harga khusus untuk kemitraan di masa mendatang.
                            </li>
                            <li lang="eng">
                                Special price for future partnership.
                            </li>
                        </ol>
                    </div>
                    <div class="content gpe-l gpe-r">
                        <h3 class="m-0" lang="idn">How To Join</h3>
                        <h3 class="m-0" lang="eng">How To Join</h3>
                        <ol class="m-0">
                            <li lang="idn">
                                Isi formulir pendaftaran melalui Google Forms (https://forms.gle/wDrBRnkoWqtNcD2P6) atau kirimkan versi cetak.
                            </li>
                            <li lang="eng">
                                Complete the registration form via Google Forms (https://forms.gle/wDrBRnkoWqtNcD2P6) or submit a hardcopy version.
                            </li>
                            <li lang="idn">
                                Transfer biaya pendaftaran sebesar Rp100.000.
                            </li>
                            <li lang="eng">
                                Transfer the registration fee of Rp100,000.
                            </li>
                            <li lang="idn">
                                Transfer biaya keanggotaan tahunan sebesar Rp300.000 (biaya ini akan dibebaskan jika Anda menghadiri Underwriting Summit tahunan).
                            </li>
                            <li lang="eng">
                                Transfer the annual membership fee of Rp300,000 (this fee will be waived if you attend the annual Underwriting Summit).
                            </li>
                            <li lang="idn">
                                Kirimkan dokumen yang dibutuhkan.
                            </li>
                            <li lang="eng">
                                Submit the required documents.
                            </li>
                            <li lang="idn">
                                Keanggotaan berlaku selama satu tahun dan dapat diperbarui.
                            </li>
                            <li lang="eng">
                                Membership is valid for one year and is renewable.
                            </li>
                        </ol>
                    </div>
                    <div class="content content-button gpe-l gpe-r">
                        <a href="{{route('membership-signup')}}" class="text-decoration-none px-4 py-2" id="button" lang="idn">Daftar</a>
                        <a href="{{route('membership-signup')}}" class="text-decoration-none px-4 py-2" id="button" lang="eng">SIGN UP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection