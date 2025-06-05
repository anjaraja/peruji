@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')
    <div class="container-fluid p-0 terms">
        <div class="membership-bg" style="width: 100%;height:491px;background: url('{{asset("lp-img/terms&condition.png")}}');background-size:cover;background-position-y:-440px;background-repeat: no-repeat;">
            
        </div>
        <!-- <img src="" alt="" > -->
        <div class="menu-tc-page">
            <div class="header-sub-menu">
                <section class="square me-3"></section>
                <h1 class="label m-0 mt-1">Membership</h1>
            </div>
            <div class="container-fluid gpe-l gpe-r">
                <div class="d-flex flex-column justify-content-center gpe-l gpe-r">
                    <div class="content gpe-l gpe-r">
                        <h3 class="m-0">Terms & Condition</h3>
                        <ol class="m-0">
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
                        <h3 class="m-0">Benefits</h3>
                        <ol class="m-0">
                            <li>
                                Membership Card.
                            </li>
                            <li>
                                Prioritize in training/workshop/summit registration.
                            <li>
                                Special price for Hospital / Laboratory partner.
                            </li>
                            <li>
                                Special price for PERUJI Merchandise.
                            </li>
                            <li>
                                Special price for future partnership.­
                            </li>
                        </ol>
                    </div>
                    <div class="content gpe-l gpe-r">
                        <h3 class="m-0">How To Join</h3>
                        <ol class="m-0">
                            <li>
                                Complete the registration form via Google Forms (https://forms.gle/wDrBRnkoWqtNcD2P6) or submit a hardcopy version.
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
                        <a href="{{route('membership-signup')}}" class="text-decoration-none px-4 py-2" id="button">SIGN UP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection