@extends('layouts.main-layout')

@section('main-content')

    <main class="main-content">
        
        <div class="container">

            <section>

                <h1 class="mt-5 mb-5 fw-600">{{ __('Who we are') }}</h1>

                <img src="{{ asset('assets/img/banner-img.png') }}" class="banner-img img-fluid" alt="farm"/>

                <p class="text-large py-5">
                    Agricgate seeks to offer practical virtual agriculture training to African youth; with an E-commerce platform to sell products created through the farms' set-up. This is to help equip and excite the interest of these young ones in farming and at the same time resourcing trainees to be able to start their farm and or be groomed into farm managers.
                </p>

            </section>

        </div>

    </main>

@endsection