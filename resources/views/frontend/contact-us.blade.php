@extends('layouts.main-layout')

@section('main-content')

    <main class="main-content">

        <div class="container">

            <section>

                <h1 class="mt-5 mb-5 fw-600">{{ __('Contact us') }}</h1>

                <img src="{{ asset('assets/img/banner-img.png') }}" class="banner-img" alt="farm"/>

                <div class="row g-2 py-5">

                    <div class="col-md-6">

                        <div class="bullet">
                            <img src='/assets/img/EnvelopeFill.png' alt="footer-logo" />
                            <p>TRISOLACE CO. LTD
                            <br>
                            G231 Tingatinga Street
                            <br>
                            Dansoman, Accra - Ghana
                            <br>
                            info@Agricgate.com
                            </p>
                        
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="bullet">
                            <img src='/assets/img/TelephoneFill.png' alt="footer-logo" />
                            <p>(+233) 24 923 4809</p>
                        
                        </div>
                    </div>

                </div>

            </section>

        </div>

    </main>

@endsection