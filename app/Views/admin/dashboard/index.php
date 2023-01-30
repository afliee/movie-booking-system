<?php

use Illuminate\Support\Str;

require assets('app/Views/admin/header.php');
?>
<?php
    // format price 10000 to 10,000 VNĐ
    function formatPrice($price) {
        if (isset($price)) {
            $price = number_format($price, 0, ',');
            $price .= ' VNĐ';
            return $price;
        }
    }
?>

<div class="row">
    <div class="col-12 col-lg-6">
       <div>
            <h3>
                Total Money This Week: 
            </h3>
            <h4><?php echo formatPrice($statisticsThisWeek['totalThisWeek'])?></h4>
            <!-- get date start and date end this week -->
            <h5>From <?php echo $statisticsThisWeek['dateStart'] . " to " . $statisticsThisWeek['dateEnd']?></h5>
       </div>
        <div class="wrapper">
            <canvas id="chartByWeek"></canvas>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div>
            <h3>
                Total Money This Month: 
            </h3>
            <h4><?php echo formatPrice($statisticsThisMonth['totalThisMonth'])?></h4>
            <!-- get date start and date end this week -->
            <h5>From <?php echo $statisticsThisMonth['dateStart'] . " to " . $statisticsThisMonth['dateEnd']?></h5>
        </div>
        <div class="wrapper">
            <canvas id="chartByMonth"></canvas>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <h3>Total Money Each Movie</h3>
        <div class="wrapper">
            <canvas id="chartMoneyByMovies"></canvas>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <h3>Total Ticket Each Movie</h3>
        <div class="wrapper">
            <canvas id="chartTicketByMovies"></canvas>
        </div>

    </div>
</div>







<script>
    const ctx = document.getElementById('chartByWeek');

    new Chart(ctx, {
        type: 'bar',
        data: {
        labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        datasets: [{
            label: 'Total Money of Day',
            data: [<?php
                foreach ($statisticsThisWeek['moneyEachDay'] as $key => $value) {
                    echo $value . ',';
                }
            ?>],
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        responsive: true,
        maintainAspectRatio: false,
    }
    });

    const ctx1 = document.getElementById('chartByMonth');

    new Chart(ctx1, {
        type: 'bar',
        data: {
        labels: [
                <?php
                    foreach ($statisticsThisMonth['dateThisMonth'] as $key => $value) {
                        echo "'" . $value . "',";
                    }
                ?>
            ],
        datasets: [{
            label: 'Total Money of Day',
            data: [
                    <?php
                        foreach ($statisticsThisMonth['moneyEachDay'] as $key => $value) {
                            echo $value . ',';
}
                    ?>
                ],
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        responsive: true,
        maintainAspectRatio: false,
    }
    });


    const ctx2 = document.getElementById('chartMoneyByMovies');

    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: [
                <?php
                    foreach ($statisticsEachMovie['nameMovies'] as $key => $value) {
                        echo "'" . $value . "',";
                    }
                ?>
            ],
            datasets: [{
                label: 'Total Money of Movie',
                data: [
                    <?php
                        foreach ($statisticsEachMovie['moneyMovies'] as $key => $value) {
                            echo $value . ',';
                        }
                    ?>
                ],
                borderWidth: 1
            }],
        },
        options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        responsive: true,
        maintainAspectRatio: false,
    }
    });

    const ctx3 = document.getElementById('chartTicketByMovies');

    new Chart(ctx3, {
        type: 'bar',
        data: {
        labels: [
                <?php
                    foreach ($statisticsEachMovie['nameMovies'] as $key => $value) {
                        echo "'" . $value . "',";
                    }
                ?>
            ],
        datasets: [{
            label: 'Total Ticket of Movie',
            data: [
                    <?php
                        foreach ($statisticsEachMovie['ticketMovies'] as $key => $value) {
                            echo $value . ',';
                        }
                    ?>
                ],
            borderWidth: 1
        }]
        },
        options: {
        scales: {
            y: {
                beginAtZero: true
            }
        },
        responsive: true,
        maintainAspectRatio: false,
    }
    });
</script>

<?php
require assets('app/Views/admin/footer.php');
?>