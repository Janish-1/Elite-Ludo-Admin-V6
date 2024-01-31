<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Payment Form</title>
</head>
<body>
    <h1>Razorpay Payment Form</h1>

    <!-- Razorpay payment form button -->
    @php
        $api_key = 'your_razorpay_api_key_here'; // Replace with your actual Razorpay API key
        $amount = 500; // Replace with the actual amount
        $currency = 'INR'; // Replace with the actual currency
    @endphp

    <form action="{{ route('razorpay.payment') }}" method="POST">
        <script src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="{{ $api_key }}"
                data-amount="{{ $amount }}"
                data-currency="{{ $currency }}"
                data-order_id=""
                data-buttontext="Pay with Razorpay"
                data-name="Your Company Name"
                data-description="Payment for your service"
                data-image="your_logo_url"
        ></script>
        <input type="hidden" custom="Hidden Element" name="hidden">
    </form>
</body>
</html>
