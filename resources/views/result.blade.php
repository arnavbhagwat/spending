<!DOCTYPE html>
<html>
<head>
    <title>Spending Result</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h2>Spending Category Breakdown</h2>
    <canvas id="spendingChart" width="400" height="400"></canvas>

    <script>
        const data = {
            labels: {!! json_encode(array_keys($data)) !!},
            datasets: [{
                label: 'Spending Categories',
                data: {!! json_encode(array_values($data)) !!},
                backgroundColor: ['#ff6384','#36a2eb','#cc65fe','#ffce56'],
                borderWidth: 1
            }]
        };

        new Chart(document.getElementById('spendingChart'), {
            type: 'pie',
            data: data
        });
    </script>
</body>
</html>
