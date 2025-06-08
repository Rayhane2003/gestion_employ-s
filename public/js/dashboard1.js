$(document).ready(function () {
    $.ajax({
        url: "{{ route('count') }}",
        method: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.status === 200) {
                let months = [];
                let budgetData = [];
                let costData = [];

                response.Budget.forEach(item => {
                    months.push(item.month);
                    budgetData.push(item.total_budget);
                });

                response.costs.forEach(item => {
                    costData.push(item.total);
                });

                var options = {
                    series: [
                        {
                            name: "Budget",
                            data: budgetData
                        },
                        {
                            name: "Costs",
                            data: costData
                        }
                    ],
                    chart: {
                        height: 320,
                        type: 'line'
                    },
                    xaxis: {
                        categories: months
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    tooltip: {
                        theme: 'dark'
                    }
                };

                var chart = new ApexCharts(document.querySelector("#traffic-overview"), options);
                chart.render();
            }
        }
    });
});