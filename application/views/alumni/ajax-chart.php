<div id="ygLain" class="card card-primary belakang">
                                            <div class="card-header">
                    <h3 class="card-title">Bar Data (<?php echo $cek4;?>)</h3>

                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                    <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    <?php $i = 0; foreach ($cek as $row) : ?>
                        <p class="panggilan" id="panggil<?php echo $i++;?>" data-tahun="<?php echo $row['EventName'];?>" data-row="<?php echo $row['Assignee_Count'];?>"></p>
                    <?php endforeach;?>
                    </div>
                </div>
                <div class="card-footer">
                <?php  foreach ($cek3 as $row) {
                    echo 'Total '.$cek4.': '.$row['pertama'].' Orang';
                }?>
                </div>
<script>
    $(function () {
        var a = <?php echo $cek2->num_rows();?>;
        console.log(a+' Totalnya');
        var tahun = [];
        var row = [];
        for (var i = 0; i < a; i++) {
            tahun[i] = $('#panggil' + i).data('tahun');
            row[i] = $('#panggil' + i).data('row');
        }
        var areaChartData = {
            labels: tahun,
            datasets: [{
                label: 'Alumni',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: row
            }, ]
        }
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        barChartData.datasets[0] = temp0
        //---------------------
        //- STACKED BAR CHART -
        //---------------------
        var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
        var stackedBarChartData = $.extend(true, {}, barChartData)

        var stackedBarChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            },
            
            legend: {
                display: false //This will do the task
            }
        }

        var stackedBarChart = new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
        })
    })
</script>