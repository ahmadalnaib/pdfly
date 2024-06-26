<x-super-layout dir="rtl">

    <div
        class="flex flex-col md:flex-row justify-center items-center max-w-6xl mx-auto py-8 gap-4 px-4 md:px-20 bg-white">
        <div class="w-full md:w-1/2">
            <canvas id="salesChart"></canvas>
        </div>
        <div class="w-full md:w-1/2">
            <canvas id="usersChart"></canvas>
        </div>
    </div>


</x-super-layout>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const salesData = @json($salesData); // Your Laravel data
        const usersData = @json($usersData); // Your Laravel data
       
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
            'October', 'November', 'December'
        ];

        // Prepare your datasets by ensuring there's data for each month.
        // Initialize empty arrays for sales and users data for each month.
        const formattedSalesData = new Array(12).fill(0);
        const formattedSalesCount = new Array(12).fill(0);
        const formattedUsersData = new Array(12).fill(0);

        // Populate the arrays with your data. Assuming data.month is 1-12 for Jan-Dec
        salesData.forEach(data => {
            // Ensure the data.month - 1 is used as array index

            formattedSalesData[data.month - 1] = data.total;
            formattedSalesCount[data.month - 1] = data.count;
        });

        usersData.forEach(data => {
            formattedUsersData[data.month - 1] = data.count;
        });

        const salesChartCtx = document.getElementById('salesChart').getContext('2d');
        const usersChartCtx = document.getElementById('usersChart').getContext('2d');

        new Chart(salesChartCtx, {
            type: 'bar', // Or 'line', 'pie', etc.
            data: {
                labels: months,
                datasets: [{
                    label: 'Monthly Sales',
                    data: formattedSalesData,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }, {
                    label: 'Sales Count',
                    data: formattedSalesCount,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        suggestedMax: 200
                    }
                },
                responsive: true,
            }
        });

        new Chart(usersChartCtx, {
            type: 'bar', // Or 'bar', 'pie', etc.
            data: {
                labels: months,
                datasets: [{
                    label: 'Monthly Users',
                    data: formattedUsersData,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    fill: true,
                }]
            },
            options: {
                scales: {
                    y: {
                        suggestedMax: 10
                    }
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });
    });
</script>
