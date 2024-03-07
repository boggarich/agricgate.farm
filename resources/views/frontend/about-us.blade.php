@extends('layouts.main-layout')

@section('main-content')

    <main class="main-content">
        
        <div class="container-xxl">

            <section class="pt-1">

                <h1 class="mt-4 mb-4 fw-600">{{ __('About Us') }}</h1>

                <div class="card mb-5 mt-4 w-100">
                    <div class="card-body">
                        <p class="card-text f-18">
                            {{ translate("Agricgate seeks to offer practical virtual agriculture training to African youth; with an E-commerce platform to sell products created through the farms' set-up. This is to help equip and excite the interest of these young ones in farming and at the same time resourcing trainees to be able to start their farm and or be groomed into farm managers.") }}' 
                        </p>
                    </div>
                </div>

            </section>

        </div>

    </main>

@endsection