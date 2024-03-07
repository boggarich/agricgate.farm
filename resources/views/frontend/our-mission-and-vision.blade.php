@extends('layouts.main-layout')

@section('main-content')

    <main class="main-content">
        
        <div class="container-xxl">

            <section class="pt-1 mb-5">

                <h1 class="mt-4 mb-4 fw-600">{{ translate('Our mission & vision') }}</h1>

                <div class="row">
                    <div class="col-md-6">

                        <div class="card mt-4">
                            <div class="card-header bg-light">
                                {{ translate('Our mission') }}
                            </div>
                            <div class="card-body">
                                <p class="text-large f-18">

                                    {{ translate('1. To build a virtual online training platform that will offer training to youths in the African region') }}
                                    <br></br>

                                    {{ translate('2. To offer online practical training to African youths to stir their interest in farming') }}
                                    <br></br>

                                    {{ translate('3. To resource yearly 500 youths to be able to start their own farms') }}
                                    <br></br>

                                    {{ translate('4. To connect 2,000 youths yearly to farms through internships leading to employment') }}

                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="card mt-4">
                            <div class="card-header bg-light">
                                {{ translate('Our vision') }}
                            </div>
                            <div class="card-body">
                                <p class="f-18 pb-5">{{ translate('Agricgate seeks to offer practical virtual Agriculture training to youths in the African region, resourcing them to establish their farms to help prevent food security crisis') }} </p>
                            </div>
                        </div>

                    </div>
                </div>

            </section>

        </div>

    </main>

@endsection