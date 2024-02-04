<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Payment Form</title>
    <!-- Include Bootstrap CSS (Assuming you have it locally or use a CDN) -->
    <link rel="stylesheet" href="path/to/bootstrap.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }

        form {
            width: 90%;
            max-width: 400px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<form id="paymentForm" action="{{ route('payment.form') }}" method="POST">
        @csrf <!-- CSRF token for Laravel -->

        <div class="form-group">
            <label for="amount">Amount (in paise)</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ $amount }}" required>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $name }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $phone }}" required>
        </div>

        <div class="form-group">
            <label for="Player_ID">Player ID</label>
            <input type="text" class="form-control" id="Player_ID" name="Player_ID" value="{{ $Player_ID }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Include Bootstrap JS (Assuming you have it locally or use a CDN) -->
    <script src="path/to/bootstrap.js"></script>

    <script>
        // Auto-submit the form after page load if query parameters are present
        document.addEventListener("DOMContentLoaded", function () {
            const queryString = window.location.search;
            if (queryString) {
                document.getElementById("paymentForm").submit();
            }
        });
    </script>
</body>
</html>
