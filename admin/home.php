<?php include 'db_connect.php' ?>
<?php
$sql = "SELECT * FROM recruitment_status where status = 1  ";
$result = mysqli_query($conn, $sql);
$chart_data = "";
while ($row = mysqli_fetch_array($result)) {
    $productname[] = $row['status_label'];
    $id = $row['id'];
    $application = $conn->query("SELECT * FROM application where process_id = $id ; ");
    $sales[] = $application->num_rows;
}
?>
<style>

</style>
<!-- <script src="//code.jquery.com/jquery-1.9.1.js"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> -->
<script type="text/javascript" src="assets/js/Chart.min.js"></script>
<div class="containe-fluid">

    <?php if ($_SESSION['login_type'] == 1): ?>
        <div class="row mt-3 ml-3 mr-3">


            <div class="col-lg-6">
                <div class="card">
                    <div style="width:90%;hieght:20%;text-align:center">
                        <h2 class="page-header">Analytics Reports </h2>
                        <div>Application</div>
                        <canvas id="chartjsbar"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div style="width:90%;hieght:20%;text-align:center">
                        <h2 class="page-header">Analytics Reports </h2>
                        <div>Vacanacy</div>
                        <canvas id="chartjs_bar"></canvas>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <?php echo "Welcome back " . $_SESSION['login_name'] . "!" ?>

                </div>
                <hr>
                <div class="row ml-1 mr-1" style="justify-content: center;">
                    <div class="col-md-3 ">
                        <div class="card bg-primary text-white mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small">New Applicants</div>
                                        <div class="text-lg font-weight-bold">
                                            <?php
                                            $applicant = $conn->query("SELECT * FROM application where process_id = 0 ");
                                            echo $applicant->num_rows;
                                            ?>

                                        </div>
                                    </div>
                                    <i class="fa fa-user-tie"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php if ($_SESSION['login_type'] == 1): ?>
                        <div class="col-md-3 ">
                            <div class="card bg-primary text-white mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mr-3">
                                            <div class="text-white-75 small">All Applicants</div>
                                            <div class="text-lg font-weight-bold">
                                                <?php
                                                $applicant = $conn->query("SELECT * FROM application");
                                                echo $applicant->num_rows;
                                                ?>

                                            </div>
                                        </div>
                                        <i class="fa fa-user-tie"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- <div class="col-md-3 ">
                            <div class="card bg-primary text-white mb-1">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mr-3">
                                            <div class="text-white-75 small"> Number of Staff</div>
                                            <div class="text-lg font-weight-bold">
                                                <?php
                                                $applicant = $conn->query("SELECT * FROM users where type = 2 ");
                                                echo $applicant->num_rows;
                                                ?>

                                            </div>
                                        </div>
                                        <i class="fa fa-user-tie"></i>
                                    </div>
                                </div>

                            </div>
                        </div> -->
                        <div class="col-md-3">
                            <div class="card bg-warning text-white mb-1">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mr-3">
                                            <div class="text-white-75 small">Closed Vacanies</div>
                                            <div class="text-lg font-weight-bold">
                                                <?php
                                                $vacancies = $conn->query("SELECT * FROM vacancy where status = 0  ");
                                                echo $vacancies->num_rows;
                                                ?>

                                            </div>
                                        </div>
                                        <i class="fa fa-search"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-3">
                        <div class="card bg-warning text-white mb-1">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="mr-3">
                                        <div class="text-white-75 small">Active Vacanies</div>
                                        <div class="text-lg font-weight-bold">
                                            <?php
                                            $vacancies = $conn->query("SELECT * FROM vacancy where status = 1  ");
                                            echo $vacancies->num_rows;
                                            ?>

                                        </div>
                                    </div>
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>






    <script type="text/javascript">
        var ctx = document.getElementById("chartjsbar").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($productname); ?>,
                datasets: [{
                    // label: "Selected",
                    backgroundColor: [
                        "#5969ff",
                        "#ff407b",
                        "#25d5f2",
                        "#ffc750",
                        "#2ec551",
                        "#7040fa",
                        "#ff004e"
                    ],
                    data: <?php echo json_encode($sales); ?>,
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            stepSize: 1
                        },
                        scaleLabel: {
                            display: true,
                            // labelString: 'probability'
                        }
                    }]
                },
                legend: {
                    display: false,
                    position: 'top',

                    labels: {

                        fontColor: '#000',
                        fontFamily: 'Circular Std Book',
                        fontSize: 14,
                    }
                },


            }
        });
    </script>
    <script type="text/javascript">
        <?php
        $sql = "SELECT * FROM vacancy where status = 1  ";
        $result = mysqli_query($conn, $sql);
        $chart_data = "";
        while ($row = mysqli_fetch_array($result)) {
            $positionname[] = $row['position'];
            $availability[] = $row['availability'];
        }
        ?>
        var ctx = document.getElementById("chartjs_bar").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($positionname); ?>,
                datasets: [{
                    // label: "Selected",
                    backgroundColor: [
                        "#ffc750",
                        "#7040fa",
                        "#ff004e",
                        "#5969ff",
                        "#25d5f2",
                        "#ff407b",
                        "#2ec551",
                    ],
                    data: <?php echo json_encode($availability); ?>,
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            //stepSize: 5,
                            beginAtZero: true
                        },
                        scaleLabel: {
                            display: true,
                            // labelString: 'probability'
                        }
                    }]
                },
                legend: {
                    display: false,
                    position: 'top',

                    labels: {

                        fontColor: '#000',
                        fontFamily: 'Circular Std Book',
                        fontSize: 14,
                    }
                },


            }
        });
    </script>