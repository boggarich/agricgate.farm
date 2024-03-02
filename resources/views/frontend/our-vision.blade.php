@extends('layouts.main-layout')

@section('main-content')

    <main class="main-content">
        
        <div class="container">

            <section>

                <h1 class="mt-5 mb-5 fw-600">{{ __('Our vision') }}</h1>

                <img src="{{ asset('assets/img/banner-img.png') }}" class="banner-img img-fluid" alt="farm"/>

                <p class="text-large py-5">
                    Agricgate seeks to offer practical virtual Agriculture training to youths in the African region, resourcing them to establish their farms to help prevent food security crisis 
                </p>

            </section>

        </div>

    </main>

@endsection