@include('header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar-container">
            {{-- SideBar --}}
            @include('admin.parts.sidebar')
        </div>
        <div class="col-md-9 p-0">            
            <div class="container-fluid">
                <div class="row">
                    {{-- Quick info Widgets --}}
                    <div class="container info-widgets p-3">
                        <div class="row">
                            <div class="col text-center">
                                <div class="widget">
                                    <div><i class="fa fa-user fa-xl"></i></div>
                                    Active Members : {{count($active)}}
                                </div>
                            </div>
                            <div class="col text-center">
                                <div class="widget">
                                    <div><i class="fa-solid fa-person-arrow-down-to-line fa-xl"></i></div>
                                    Pending Members : {{count($pending)}}
                                </div>
                            </div>
                            <div class="col text-center ">
                                <div class="widget">
                                    <div><i class="fa fa-users"></i></div>
                                    Registered Members : {{count($registered)}}
    
                                </div>
                            </div>
                            <div class="col text-center ">
                                <div class="widget">
                                    <div><i class="fa fa-dollar fa-xl"></i></div>
                                    Total Earnings : ${{($earnings)}}
    
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Services Report Section --}}
                    <div class="container">
                        <div class="row">
                            <div class="graph col-8">
                                <h5 class="p-3">Total Services Members: Overview</h5>
                                <canvas id="services-nums" style="height:100%!important;"></canvas>
                            </div>
                            <div class="services-widgets col-4 text-center">
                                <div class="row">
                                    <div class="col-6 ">
                                        <div class="widget">
                                            <div><i class="fa fa-users fa-xl"></i></div>
                                            <div>{{count($registered)}}</div>
                                            Total Members 
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="widget">
                                            <div><i class="fa fa-user-clock fa-xl"></i></div>
                                            <div>{{count($staff)}}</div>
                                            staff Users
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="widget">
                                            <div><i class="fa fa-dumbbell fa-xl"></i></div>
                                            <div>{{count($equipments)}}</div>
                                            Available Equipments
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="widget">
                                            <div><i class="fa fa-file-invoice-dollar fa-xl"></i></div>
                                            <div>${{$expenses}}</div>
                                            Total Expenses
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="widget">
                                            <div><i class="fa fa-user-ninja fa-xl"></i></div>
                                            <div>{{count($trainers)}}</div>
                                            Active Trainers
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="widget">
                                            <div><i class="fa fa-calendar-check fa-xl"></i></div>
                                            <div>{{count($present)}}</div>
                                            Present Members
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Ernings and Expenses Reports --}}
                    <div class="container">
                        <div class="row">
                            <div class="col-12" >
                                <h5 class="p-3">Total Expenses and Earnings: Overview</h5>
                                <canvas id="earnings-report"  style="height: 200px"></canvas>
                            </div>
                        </div>
                    </div>
                    {{-- Other Information Section --}}
                    <div class="container pt-3">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="p-3">Registered Gym Members by Gender: Overview</h5>
                                <canvas id="members-by-gender"  style="height: 200px"></canvas>
                            </div>
                            <div class="col-6">
                                <h5 class="p-3">Staff Members by Designation: Overview</h5>
                                <canvas id="staff-by-role"  style="height: 200px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- Total Servies Numbers --}}
<script>
    const ctx = document.getElementById('services-nums');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Cardio', 'Sauna', 'Fitness'],
            datasets: [{
                label: 'Total Number',
                data: {{Js::from($services_num)}},
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
                borderWidth: 1,
            }]
        },
        // options: {
        //     scales: {
        //         y: {
        //             beginAtZero: true
        //         }
        //     },
            
        // }
    });
</script>

{{-- Earnings & Expenses Reports --}}
<script>
    const ctx2 = document.getElementById('earnings-report');
    const myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Earnings', 'Expenses'],
            datasets: [{
                label: 'Total In Dollars',
                data: {{Js::from([$earnings, $expenses])}},
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
                borderWidth: 1,
                // barThickness : 50

            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            indexAxis: 'y',
        }
    });
</script>
{{-- Members By Gender --}}
<script>
    const ctx3 = document.getElementById('members-by-gender');
    const myChart3 = new Chart(ctx3, {
        type: 'polarArea',
        data: {
            labels: ['Male', 'Female'],
            datasets: [{
                label: 'Total Numbers',
                data: {{Js::from([$male, $female])}},
                backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(54, 162, 235)',
                    'rgba(255, 206, 86)',
                ],
                borderWidth: 1,
                // barThickness : 50

            }]
        },
        options: {
                // 
        }
    });
</script>
{{-- Staff By Role --}}
<script>
    const ctx4 = document.getElementById('staff-by-role');
    const myChart4 = new Chart(ctx4, {
        type: 'polarArea',
        data: {
            labels: ['Front Desk', 'Cashier', "Trainer", "Manager", "GYM Assistant"],
            datasets: [{
                label: 'Total Numbers',
                data: {{Js::from($roles)}},
                backgroundColor: [
                    'rgba(54, 162, 235)',
                    'rgba(255, 206, 86)',
                    'rgba(75, 192, 192)',
                    'rgba(255, 99, 132)',
                    'rgba(153, 102, 255)',
    
                ],
                borderWidth: 1,

            }]
        },
        options: {
                // 
        }
    });
</script>

@include("footer")