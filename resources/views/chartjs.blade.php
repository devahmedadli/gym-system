<!DOCTYPE html>
<html>
<head>
    <title>Laravel ChartJS Chart Example - ItSolutionStuff.com</title>
</head>
    
<body>
    <h1>Laravel ChartJS Chart Example - ItSolutionStuff.com</h1>
    <canvas id="myChart" height="100px"></canvas>
</body>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
<script>
const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Cardio', 'Sauna', 'Fitness'],
        datasets: [{
            label: 'Total Number',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',

            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',

            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

</html>