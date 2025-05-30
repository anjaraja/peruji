@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')
    <div class="container-fluid p-0 eve">
        <img src="{{asset('lp-img/crop-about-page.png')}}" style="height:100vh;width: 100%;" alt="">
        <div class="header-sub-menu">
            <section class="square me-3"></section>
            <h1 class="label m-0 mt-1">About PERUJI</h1> 
        </div>
        <div class="d-flex justify-content-center flex-column" id="role">
            <div class="pt-5">
                <div class="label-isi-content">The Role</div>
            </div>
            <div class="py-2 col-7 align-self-center">
                <div class="desc-isi-content">
                    Perkumpulan Underwriter Jiwa Indonesia (PERUJI) serves as the central hub for life insurance underwriting professionals across Indonesia. In the life insurance industry, the role of a Life Underwriter is critical; they are responsible for meticulously evaluating and managing risk. Recognizing that success hinges on strong unity and collaboration, PERUJI is committed to cultivating these principles among its members. As an independent professional body, PERUJI is dedicated to advancing the competence, integrity, and professional standards of all life underwriters in Indonesia.
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center flex-column" id="vision-mission">
            <div class="pt-5">
                <div class="label-isi-content">Vision & Mission</div>
            </div>
            <div class="py-2 pb-5 col-7 align-self-center">
                <div class="desc-isi-content">
                    The Life Underwriter Club Indonesia (LUCI) was formally established following the Underwriter Gathering, an event orchestrated by ReINDO on June 18–19, 2014, at Michael Resort. This significant gathering convened 30 underwriters representing 32 life insurance companies, creating a vital forum for industry collaboration and professional dialogue. The success of this initiative directly led to the founding of LUCI as a dedicated professional community, with a seven-member formateur board appointed to serve as its inaugural executive committee.
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <img src="{{asset('lp-img/about-page-2.png')}}" style="width: 100%;" alt="">
        </div>
        <div class="d-flex justify-content-center flex-column" id="milestone">
            <div class="pt-5">
                <div class="label-isi-content">Milestone</div>
            </div>
            <div class="py-2 pb-4 col-7 align-self-center">
                <div class="desc-isi-content">
                    The Life Underwriter Club Indonesia (LUCI) initially emerged from the Underwriter Gathering, an event expertly organized by ReINDO at Michael Resort on June 18–19, 2014. This crucial gathering brought together 30 underwriters from 32 life insurance companies, establishing a vital platform for professional exchange and industry collaboration. The successful event culminated in the formation of LUCI as a formal professional community, with a seven-member formateur board appointed to serve as its founding executive committee.
                </div>
            </div>
            <div class="py-2 pb-4 col-7 align-self-center">
                <div class="desc-isi-content">
                    During the process of formalizing LUCI's legal status, it became apparent that a similar organization, PUJI, had previously existed as a professional forum for life insurance underwriters. Although PUJI was no longer active, its historical significance to the industry was undeniable. To honor this legacy, an extensive effort was made to connect with its former leadership. Regrettably, most of PUJI's board members had passed away, with Mr. Bambang Lukito being the sole surviving member.
                </div>
            </div>
            <div class="py-2 pb-5 col-7 align-self-center">
                <div class="desc-isi-content pb-5">
                    Recognizing the importance of upholding the spirit of professional unity and excellence, the decision was made to establish a new organization: Peruji (Perkumpulan Underwriter Jiwa Indonesia). This new entity not only continues the values of its predecessor but also aims to build a more robust foundation for the future of underwriting in Indonesia. Peruji's official recognition was cemented by the Decree of the Minister of Law and Human Rights of the Republic of Indonesia No. AHU-0000572.AH.01.07.Tahun 2015.
                </div>
            </div>
        </div>
    </div>
    
@endsection