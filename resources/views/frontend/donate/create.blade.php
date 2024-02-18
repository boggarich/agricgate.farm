@extends('layouts.main-layout')

@section('main-content')

    <main class="main-content">

        <div class="container">

            <div id="payment" class="animated fadeIn mt-5">
                
                <div class="payment-wrapper">


                    <!-- Tab panes -->
                    <div class="">

                        <div class="">
                            <div class="payment-form-wrapper">

                                <form id="paymentForm">

                                    <div class="form-group mb-3 mt-2">
                                        <label>{{ __('Email') }}</label>
                                        <input type="text" name="email" class="form-control" placeholder="" value="{{ old('email') }}" id="email-address" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>{{ __('Amount') }}</label>
                                        <input type="text" name="amount" class="form-control" placeholder="" value="{{ old('amount') }}" id="amount" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group mb-4">
                                                <label>{{ __('First name') }}</label>
                                                <input type="text" name="first_name" class="form-control" placeholder="" value="{{ old('first_name') }}">
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group mb-4">
                                                <label>{{ __('Last name') }}</label>
                                                <input type="text" name="last_name" class="form-control" placeholder="" value="{{ old('last_name') }}">
                                            </div>

                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-success d-table mx-auto w-100" onclick="(e) => payWithPaystack(e)">{{ __('Pay') }}</button>

                                </form>

                            </div>
                        </div>

                    </div>

                </div>
                
            </div>

            <div class="spacer"></div>

        </div>

    </main>

@endsection

@section('scripts')

    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script>

        var paymentForm = document.getElementById('paymentForm');

        paymentForm.addEventListener('submit', payWithPaystack, false);

        function payWithPaystack(e) {

            e.preventDefault();

            var handler = PaystackPop.setup({
                key:  '<?php echo env('PAYSTACK_PUBLIC_KEY'); ?>',
                email: document.getElementById('email-address').value,
                amount: document.getElementById('amount').value * 100,
                currency: 'GHS',
                ref: '<?php echo Illuminate\Support\Str::random(40); ?>',
                callback: (response) => {

                    //this happens after the payment is completed successfully
                    var reference = response.reference;
                    // Make an AJAX call to your server with the reference to verify the transaction
                    location.href = `/donate/verify/${response.reference}`;

                },
                onClose: function() {


                },
            });

            handler.openIframe();
        }

    </script>

@endsection