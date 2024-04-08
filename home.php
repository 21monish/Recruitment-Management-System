<?php
include 'admin/db_connect.php';
?>
<style>

</style>

<body>
    <div class="main mt-5">

        <div class="banner-title ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-sec">
                            <h1>Shaping </h1>
                            <h1> Your <span class="highlight-color">Career</span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-sec-img">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-img">
                            <img src="assets\img\1600998360_travel-cover.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="recent-job-sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading-data1">
                            <h2>Recent Jobs</h2>
                        </div>
                    </div>
                    <div class="row">

                        <?php
                        $vacancy = $conn->query("SELECT * FROM vacancy order by date(date_created) desc limit 3");
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

            </div>
        </div>

        <div class="why-suited mb-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="heading-data2">
                            <h2>Why Suited?</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3">
                                <div id="counter">
                                    <div class="item">
                                        <h1 class="count" data-number="50"></h1>
                                        <h3 class="text">Reward</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div id="counter">
                                    <div class="item">
                                        <h1 class="count" data-number="15"></h1>
                                        <h3 class="text">year+ Eexperience</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div id="counter">
                                    <div class="item">
                                        <h1 class="count" data-number="100"></h1>
                                        <h3 class="text">project completed</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div id="counter">
                                    <div class="item">
                                        <h1 class="count" data-number="1018"></h1>
                                        <h3 class="text">happy clients</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
</body>

<script>
    let count = document.querySelectorAll(".count");
    let arr = Array.from(count);

    arr.map(function (item) {
        let startnumber = 0;

        function counterup() {
            startnumber++;
            item.innerHTML = startnumber;

            if (startnumber == item.dataset.number) {
                clearInterval(stop);
            }
        }

        let stop = setInterval(function () {
            counterup();
        }, 50);
    });

    $('.apply-btn-data').click(function () {
        location.href = "index.php?page=view_vacancy&id=" + $(this).attr('data-id')
    })
    // $('.card.vacancy-list').click(function () {
    //     location.href = "index.php?page=view_vacancy&id=" + $(this).attr('data-id')
    // })
    $('#filter').keyup(function (e) {
        var filter = $(this).val()

        $('.card.vacancy-list .filter-txt').each(function () {
            var txto = $(this).html();
            txt = txto
            if ((txt.toLowerCase()).includes((filter.toLowerCase())) == true) {
                $(this).closest('.card').toggle(true)
            } else {
                $(this).closest('.card').toggle(false)

            }
        })
    })
</script>