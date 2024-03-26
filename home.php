
<?php
include 'admin/db_connect.php';
?>
<style>
   
</style>
<body>
    <h1 class="mt-5">hello</h1>
</body>

<script>
    $('.card.vacancy-list').click(function () {
        location.href = "index.php?page=view_vacancy&id=" + $(this).attr('data-id')
    })
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