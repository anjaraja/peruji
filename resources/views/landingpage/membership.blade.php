@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')
<style type="text/css">
    /* Terms & Coindition Page */

        
        .container-fluid {
            background-color: #f0f0f0;
        }
        
        .container-fluid .header-sub-menu {
            padding: 30px 0px;
            display: flex;
            justify-content: center;
            color: white;
            background-color: black;
        }

        .container-fluid .header-sub-menu .square {
            background-color: #F7941D;
            width: 50px;
            height: 50px;
        }

        .container-fluid .container {
            padding: 80px 0;
        }

        .container-fluid .container .label-page {
            font-size: 30px;
            font-weight: 600;
            padding-bottom: 20px;
        }

    /* Close Terms & Condition Page */
</style>

<!-- Membership -->
    <div class="container-fluid p-0">
        <img src="{{asset('lp-img/terms&condition.png')}}" alt="" style="width: 100%;">
        <div class="menu-tc-page">
            <div class="header-sub-menu">
                <section class="square me-3"></section>
                <h1 id="terms-condition">Terms & Condition</h1>
            </div>
            <div class="container">
                <div class="row align-items-center mb-4">
                    <div class="col-12 col-md-3 text-end">
                        <img src="{{asset('lp-img/terms&condition/4dd55f1e94f5e5df844bb2af1918210f659a22a2.png')}}" alt="" style="width: 250px; height: 250px;background-size: cover;background-position: center;object-fit: cover;">
                    </div>
                    <div class="col-12 col-md-9 py-5 pe-5">
                        <div class="label-page">Professional</div>
                        <div class="desc">
                            Perkumpulan Underwriter Jiwa Indonesia (PERUJI) hadir sebagai wadah bagi para profesional di bidang seleksi risiko asuransi jiwa. Profesi Underwriter Jiwa memegang peran krusial dalam menilai dan mengelola risiko di industri asuransi jiwa, dan keberhasilannya sangat bergantung pada semangat persatuan serta kolaborasi yang kuat. Sebagai organisasi profesi yang mandiri, PERUJI berkomitmen untuk mendukung pengembangan kompetensi, integritas, dan standar profesionalisme bagi para Underwriter Jiwa di Indonesia.
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-4">
                    <div class="col-12 col-md-3 text-end">
                        <img src="{{asset('lp-img/terms&condition/148111f719b9a5772d9126ca84333366955f8c67.png')}}" alt="" style="width: 250px; height: 250px;background-size: cover;background-position: center;object-fit: cover;">
                    </div>
                    <div class="col-12 col-md-9 py-5 pe-5">
                        <div class="label-page">General</div>
                        <div class="desc">
                            Perkumpulan Underwriter Jiwa Indonesia (PERUJI) hadir sebagai wadah bagi para profesional di bidang seleksi risiko asuransi jiwa. Profesi Underwriter Jiwa memegang peran krusial dalam menilai dan mengelola risiko di industri asuransi jiwa, dan keberhasilannya sangat bergantung pada semangat persatuan serta kolaborasi yang kuat. Sebagai organisasi profesi yang mandiri, PERUJI berkomitmen untuk mendukung pengembangan kompetensi, integritas, dan standar profesionalisme bagi para Underwriter Jiwa di Indonesia.
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-sub-menu">
                <section class="square me-3"></section>
                <h1 id="benefits">Membership Benefits</h1>
            </div>
            <div class="container">
                <div class="row align-items-center mb-4">
                    <div class="col-12 col-md-3 text-end">
                        <img src="{{asset('lp-img/terms&condition/d1635cade8b878885384cce2b61cc25118440a02.png')}}" alt="" style="width: 250px; height: 250px;background-size: cover;background-position: center;object-fit: cover;">
                    </div>
                    <div class="col-12 col-md-9 py-5 pe-5">
                        <div class="label-page">Professional</div>
                        <div class="desc">
                            Perkumpulan Underwriter Jiwa Indonesia (PERUJI) hadir sebagai wadah bagi para profesional di bidang seleksi risiko asuransi jiwa. Profesi Underwriter Jiwa memegang peran krusial dalam menilai dan mengelola risiko di industri asuransi jiwa, dan keberhasilannya sangat bergantung pada semangat persatuan serta kolaborasi yang kuat. Sebagai organisasi profesi yang mandiri, PERUJI berkomitmen untuk mendukung pengembangan kompetensi, integritas, dan standar profesionalisme bagi para Underwriter Jiwa di Indonesia.
                        </div>
                    </div>
                </div>
                <div class="row align-items-center mb-4">
                    <div class="col-12 col-md-3 text-end">
                        <img src="{{asset('lp-img/terms&condition/24571e758b16ffa4f497e8931c33caac45a5d5bc.png')}}" alt="" style="width: 250px; height: 250px;background-size: cover;background-position: center;object-fit: cover;">
                    </div>
                    <div class="col-12 col-md-9 py-5 pe-5">
                        <div class="label-page">General</div>
                        <div class="desc">
                            Perkumpulan Underwriter Jiwa Indonesia (PERUJI) hadir sebagai wadah bagi para profesional di bidang seleksi risiko asuransi jiwa. Profesi Underwriter Jiwa memegang peran krusial dalam menilai dan mengelola risiko di industri asuransi jiwa, dan keberhasilannya sangat bergantung pada semangat persatuan serta kolaborasi yang kuat. Sebagai organisasi profesi yang mandiri, PERUJI berkomitmen untuk mendukung pengembangan kompetensi, integritas, dan standar profesionalisme bagi para Underwriter Jiwa di Indonesia.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Close Membership -->
@endsection