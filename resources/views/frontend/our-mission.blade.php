@extends('layouts.main-layout')

@section('main-content')

    <main class="main-content">
        
        <div class="container">

            <section>

                <h1 class="mt-5 mb-5 fw-600">{{ __('Our mission') }}</h1>

                <img src="{{ asset('assets/img/banner-img.png') }}" class="banner-img img-fluid" alt="farm"/>

                <p class="text-large py-5">

                    1. To build a virtual online training platform that will offer training to youths in the African region
                    <br></br>

                    2. To offer online practical training to African youths to stir their interest in farming
                    <br></br>

                    3. To resource yearly 500 youths to be able to start their own farms
                    <br></br>

                    4. To connect 2,000 youths yearly to farms through internships leading to employment 

                </p>

            </section>

        </div>

    </main>

@endsection