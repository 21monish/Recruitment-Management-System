<?php include 'db_connect.php' ?>
<style>

</style>

<div class="containe-fluid">

    <div class="row">
        <div class="col-lg-12">

        </div>
    </div>

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
                        <div class="col-md-3 ">
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
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-warning text-white mb-1">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mr-3">
                                            <div class="text-white-75 small">Inactive Vacanies</div>
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
                    

                        <?php
                        $recruitment_status = $conn->query("SELECT * FROM recruitment_status where status = 1  ");
                        while ($row = $recruitment_status->fetch_assoc()):
                            ?>

                            <div class="col-md-3">
                                <div class="card bg-warning text-white mb-1">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="mr-3">
                                                <div class="text-white-75 small"><?php echo $row['status_label'] ?></div>
                                                <div class="text-lg font-weight-bold">
                                                    <?php
                                                     $id =  $row['id'];
                                                    $application = $conn->query("SELECT * FROM application where process_id = $id ; ");
                                                    echo $application->num_rows;
                                                    ?>

                                                </div>
                                            </div>
                                            <i class="fa fa-search"></i>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <br>
                        <?php endwhile; ?>
                    
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
    <script>

    </script>