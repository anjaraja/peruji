@extends('landingpage.app')

@section('title', 'PERUJI')

@section('content')
    <div class="container-fluid p-0 terms">
        <img src="{{asset('lp-img/terms&condition.png')}}" alt="" style="width: 100%;">
        <div class="menu-tc-page">
            <div class="header-sub-menu">
                <section class="square me-3"></section>
                <h1>Membership</h1>
            </div>
            <div class="container">
                <div class="d-flex flex-column justify-content-center">
                    <div class="content">
                        <h3>Terms & Condition</h3>
                        <ol>
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
                    <div class="content">
                        <h3>Benefits</h3>
                        <ol>
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
                    <div class="content">
                        <h3>How To Join</h3>
                        <ol>
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
                    <div class="content pt-5">
                        <a href="{{route('membership-signup')}}" class="btn text-white px-4" style="background-color: #f58529; border-radius:20px;">Sing Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection