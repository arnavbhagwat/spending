<!DOCTYPE html>
<html>
<head>
    <title>Card Spending Analysis</title>
</head>
<body>
    <h1>Enter Card Details</h1>
    <form method="POST" action="{{ route('analyze.spending') }}">
        @csrf
        <input type="text" name="card_number" placeholder="Card Number" required><br><br>
        <label>From: <input type="month" name="from" required></label><br><br>
        <label>To: <input type="month" name="to" required></label><br><br>
        <button type="submit">Analyze Spending</button>
    </form>
</body>
</html>



<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome to Spending Analyzer</h1>

    <form method="GET" action="{{ url('/saltedge/customer') }}">
        <button type="submit">Create Salt Edge Customer</button>
    </form>
</body>
</html>
