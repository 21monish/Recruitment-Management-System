<!-- <?php
include 'admin/db_connect.php';
?> -->
<?php
include 'admin/db_connect.php';
?>
<style>
    #portfolio .img-fluid {
        width: calc(100%);
        height: 30vh;
        z-index: -1;
        position: relative;
        padding: 1em;
    }

    .vacancy-list {
        cursor: pointer;
    }

    span.hightlight {
        background: yellow;
    }
</style>
<header class="masthead">
    <div class="container-fluid pt-5">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mb-4 page-title">
                <h3 class="text-white">Welcome to
                    <?php echo $_SESSION['setting_name']; ?>
                </h3>
                <hr class="divider my-4" />
                <div class="col-md-12 mb-2 text-left">
                    <div class="card">
                        <div class="card-body" style="background-color: white;color: black;">
                            <h4 class="text-center">Find Vacancies</h4>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="filter">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>
<section id="list">
    <div class="container pt-5 pb-5">
        <!-- <h4 class="text-center">Vacancy List</h4>
        <hr class="divider"> -->
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-data1">
                    <h2>Recent Jobs</h2>
                </div>
            </div>

            <?php
            $vacancy = $conn->query("SELECT * FROM vacancy order by date(date_created) desc ");
            while ($row = $vacancy->fetch_assoc()):
                $trans = get_html_translation_table(HTML_ENTITIES, ENT_QUOTES);
                unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
                $desc = strtr(html_entity_decode($row['description']), $trans);
                $desc = str_replace(array("<li>", "</li>"), array("", ","), $desc);
                ?>

                <!-- <div class="col-md-6 ">
                    <div class="card vacancy-list mt-2 mb-3" data-id="<?php echo $row['id'] ?>">

                        <div class="card-body">
                            <h3><b class="filter-txt">
                                    <?php echo $row['position'] ?>
                                </b></h3>
                            <span><small>Needed:
                                    <?php echo $row['availability'] ?>
                                </small></span>
                            <hr>
                            <larger class="truncate filter-txt">
                                <?php echo strip_tags($desc) ?>
                            </larger>

                            <hr class="divider" style="max-width: calc(80%)">

                        </div>
                    </div>
                </div> -->

                <div class="col-lg-12">
                    <div class="job-data">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="job-title">
                                    <h3>
                                        <?php echo $row['position'] ?>
                                    </h3>
                                </div>
                                <div class="category-data">
                                    <p>Availability :
                                        <?php echo $row['availability'] ?>
                                    </p>
                                </div>
                                <!-- <div class="company-name">
                                    <p>Company : Banks & Hobs</p>
                                </div> -->
                            </div>
                            <div class="col-lg-4">
                                <div class="job-details">
                                    <larger class="truncate filter-txt">
                                        <?php echo strip_tags($desc) ?>
                                    </larger>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="apply-btn-data" data-id="<?php echo $row['id'] ?>">
                                    <a class="apply-btn" href="#">Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
            <?php endwhile; ?>
        </div>
    </div>
</section>


<script>
    $('.apply-btn-data').click(function () {
        location.href = "index.php?page=view_vacancy&id=" + $(this).attr('data-id')
    })
    // $('.card.vacancy-list').click(function () {
    //     location.href = "index.php?page=view_vacancy&id=" + $(this).attr('data-id')
    // })
    $('#filter').keyup(function (e) {
        var filter = $(this).val()

        $('.job-data .job-title').each(function () {
            var txto = $(this).html();
            txt = txto
            if ((txt.toLowerCase()).includes((filter.toLowerCase())) == true) {
                $(this).closest('.job-data').toggle(true)
            } else {
                $(this).closest('.job-data').toggle(false)

            }
        })
    })
</script>