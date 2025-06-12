@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')
<style>
    .video-wrapper {
        position: relative;
        width: 100%;
        padding-top: 56.25%; /* 16:9 aspect ratio (9 / 16 = 0.5625) */
        overflow: hidden;
    }
    .responsive-video {
        position: absolute;
        top: 0; left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .about-static-image{
        display: none;
    }
    @media(max-width: 600px){
        .about-static-image{
            display: block;
            position: relative;
            width: 100%;
            padding-top: 3rem;
        }
        .video-wrapper{
            padding-top: 3rem;
            height: 17.5rem;
            /*display: none;*/
        }
    }

</style>
    <div class="container-fluid p-0 eve">
        <!-- <img src="{{asset('lp-img/about-page.png')}}" class="about-static-image"> -->
        <div class="video-wrapper">
          <video class="responsive-video" autoplay muted loop playsinline>
            <source src="{{asset('lp-img/about-page.webm')}}" type="video/webm">
            Your browser does not support the video tag.
          </video>
        </div>
        <div class="header-sub-menu">
            <section class="square me-3"></section>
            <h1 class="label m-0 mt-1" lang="idn">Tentang PERUJI</h1> 
            <h1 class="label m-0 mt-1" lang="eng">About PERUJI</h1> 
        </div> 
        <div class="d-flex justify-content-center flex-column" id="role">
            <div class="pt-section">
                <div class="label-isi-content" lang="idn">Peran</div>
                <div class="label-isi-content" lang="eng">The Role</div>
            </div>
            <div class="pt-section-content align-self-center">
                <div class="desc-isi-content" lang="idn">
                    Perkumpulan Underwriter Jiwa Indonesia (PERUJI) merupakan wadah utama bagi para profesional underwriter asuransi jiwa di seluruh Indonesia. Dalam industri asuransi jiwa, peran seorang underwriter jiwa sangatlah penting; mereka bertanggung jawab untuk mengevaluasi dan mengelola risiko secara cermat. Menyadari bahwa keberhasilan bergantung pada persatuan dan kolaborasi yang kuat, PERUJI berkomitmen untuk menumbuhkan nilai-nilai tersebut di antara para anggotanya. Sebagai organisasi profesional independen, PERUJI berdedikasi untuk meningkatkan kompetensi, integritas, dan standar profesional seluruh underwriter jiwa di Indonesia.
                </div>
                <div class="desc-isi-content" lang="eng">
                    Perkumpulan Underwriter Jiwa Indonesia (PERUJI) serves as the central hub for life insurance underwriting professionals across Indonesia. In the life insurance industry, the role of a Life Underwriter is critical; they are responsible for meticulously evaluating and managing risk. Recognizing that success hinges on strong unity and collaboration, PERUJI is committed to cultivating these principles among its members. As an independent professional body, PERUJI is dedicated to advancing the competence, integrity, and professional standards of all life underwriters in Indonesia.
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center flex-column" id="vision-mission">
            <div class="pt-section">
                <div class="label-isi-content" lang="idn">Visi & Misi</div>
                <div class="label-isi-content" lang="eng">Vision & Mission</div>
            </div>
            <div class="pt-section-content align-self-center">
                <div class="desc-isi-content" lang="idn">
                    The Life Underwriter Club Indonesia (LUCI) secara resmi didirikan setelah terselenggaranya acara Underwriter Gathering yang diinisiasi oleh ReINDO pada tanggal 18–19 Juni 2014 di Michael Resort. Pertemuan penting ini mempertemukan 30 underwriter yang mewakili 32 perusahaan asuransi jiwa, menciptakan forum yang vital untuk kolaborasi industri dan dialog profesional. Keberhasilan inisiatif ini secara langsung mendorong terbentuknya LUCI sebagai komunitas profesional yang berdedikasi, dengan penunjukan tujuh orang formatur untuk membentuk dan menjalankan kepengurusan perdana.
                </div>
                <div class="desc-isi-content" lang="eng">
                    The Life Underwriter Club Indonesia (LUCI) was formally established following the Underwriter Gathering, an event orchestrated by ReINDO on June 18–19, 2014, at Michael Resort. This significant gathering convened 30 underwriters representing 32 life insurance companies, creating a vital forum for industry collaboration and professional dialogue. The success of this initiative directly led to the founding of LUCI as a dedicated professional community, with a seven-member formateur board appointed to serve as its inaugural executive committee.
                </div>
            </div>
        </div>
        <div class="d-flex pt-section-content-img justify-content-center">
            <img src="{{asset('lp-img/about-page-2.png')}}" style="width: 100%;" alt="">
        </div>
        <div class="d-flex justify-content-center flex-column" id="milestone">
            <div class="pt-section-content-img">
                <div class="label-isi-content" lang="idn">Pencapaian</div>
                <div class="label-isi-content" lang="eng">Milestone</div>
            </div>
            <div class="pt-section-content align-self-center">
                <div class="desc-isi-content" lang="idn">
                    The Life Underwriter Club Indonesia (LUCI) awalnya muncul dari acara Underwriter Gathering yang diselenggarakan secara profesional oleh ReINDO di Michael Resort pada tanggal 18–19 Juni 2014. Pertemuan penting ini mempertemukan 30 underwriter dari 32 perusahaan asuransi jiwa, membentuk sebuah platform yang vital untuk pertukaran profesional dan kolaborasi antar pelaku industri. Keberhasilan acara tersebut menghasilkan pembentukan LUCI sebagai komunitas profesional yang resmi, dengan penunjukan tujuh orang formatur sebagai tim eksekutif pendiri.
                </div>
                <div class="desc-isi-content" lang="eng">
                    The Life Underwriter Club Indonesia (LUCI) initially emerged from the Underwriter Gathering, an event expertly organized by ReINDO at Michael Resort on June 18–19, 2014. This crucial gathering brought together 30 underwriters from 32 life insurance companies, establishing a vital platform for professional exchange and industry collaboration. The successful event culminated in the formation of LUCI as a formal professional community, with a seven-member formateur board appointed to serve as its founding executive committee.
                </div>
            </div>
            <div class="pt-section-content align-self-center">
                <div class="desc-isi-content" lang="idn">
                    Selama proses legalisasi LUCI, diketahui bahwa sebelumnya telah ada organisasi serupa bernama PUJI, yang pernah berperan sebagai forum profesional bagi para underwriter asuransi jiwa. Meskipun PUJI sudah tidak lagi aktif, kontribusinya yang bersejarah dalam industri ini tidak dapat disangkal. Sebagai bentuk penghormatan terhadap warisan tersebut, dilakukan upaya yang sungguh-sungguh untuk menjalin komunikasi dengan jajaran kepemimpinan PUJI terdahulu. Sayangnya, sebagian besar anggota dewan PUJI telah meninggal dunia, dan hanya Bapak Bambang Lukito yang masih hidup sebagai satu-satunya anggota yang tersisa.
                </div>
                <div class="desc-isi-content" lang="eng">
                    During the process of formalizing LUCI's legal status, it became apparent that a similar organization, PUJI, had previously existed as a professional forum for life insurance underwriters. Although PUJI was no longer active, its historical significance to the industry was undeniable. To honor this legacy, an extensive effort was made to connect with its former leadership. Regrettably, most of PUJI's board members had passed away, with Mr. Bambang Lukito being the sole surviving member.
                </div>
            </div>
            <div class="d-flex pt-section-content-img justify-content-center">
                <div class="desc-isi-content">
                    <img src="{{asset('lp-img/about-page-3.jpg')}}" style="width: 100%;" alt="">
                </div>
            </div>
            <div class="pt-section-content-img align-self-center">
                <div class="desc-isi-content pb-5" lang="idn">
                    Menyadari pentingnya menjaga semangat persatuan dan keunggulan profesional, diputuskan untuk mendirikan organisasi baru: Peruji (Perkumpulan Underwriter Jiwa Indonesia). Entitas baru ini tidak hanya meneruskan nilai-nilai luhur dari pendahulunya, tetapi juga bertujuan membangun fondasi yang lebih kuat bagi masa depan profesi underwriter di Indonesia. Pengakuan resmi terhadap Peruji ditetapkan melalui Keputusan Menteri Hukum dan Hak Asasi Manusia Republik Indonesia No. AHU-0000572.AH.01.07.Tahun 2015.
                </div>
                <div class="desc-isi-content pb-5" lang="eng">
                    Recognizing the importance of upholding the spirit of professional unity and excellence, the decision was made to establish a new organization: Peruji (Perkumpulan Underwriter Jiwa Indonesia). This new entity not only continues the values of its predecessor but also aims to build a more robust foundation for the future of underwriting in Indonesia. Peruji's official recognition was cemented by the Decree of the Minister of Law and Human Rights of the Republic of Indonesia No. AHU-0000572.AH.01.07.Tahun 2015.
                </div>
            </div>
        </div>
    </div>
    
@endsection