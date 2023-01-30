<?php

use Carbon\Carbon;

require assets('app/Views/public/header.php');

?>
<style>
    <?php require_once assets('public/css/movie/index.css') ?>
</style>
<div class="detail-content">
    <div class="white-space container py-4">
    <div class="row p-0">
            <div class="col-lg-6 p-0">
                <div class="film-img col-6 p-0">
                    <?php echo $movie_id ?>
                    <?php echo $category_id ?>
                    <img src="<?php echo url($data['banner_path']) ?>?>" alt=""/>
                    <span class="btn-play">
                <i class="bi bi-play-circle"></i>
              </span>
                </div>
                <div class="detail">
                    <h2 class="detail-title"><?php echo $data['title'] ?></h2>
                    <div class="detail-value">
                        <p><strong>Thời lượng:</strong> <?php echo $data['duration'] ?></p>
                        <p><strong>Thể loại:</strong> <?php echo $data['type'] ?></p>
                        <p><strong>Ngày khởi
                                chiếu:</strong> <?php echo Carbon::parse($data['release_date'])->format('d-m-Y') ?></p>
                        <p><strong>Ngày kết
                                thúc:</strong> <?php echo Carbon::parse($data['close_date'])->format('d-m-Y') ?></p>
                        <p>
                            <strong>Mô tả:</strong> <?php echo $data['description'] ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row showtime-dates m-0">
                    <?php if (count($period) == 0) { ?>
                        <h1>NOT MOVIE PLAYING</h1>
                    <?php } else { ?>
                        <div style="times">
                            <?php foreach ($period as $each) { ?>
                                <a href='#'
                                   class="col-lg-3 col-md-4 col-3 py-2 m-2 btn btn-outline-light date premier_date"
                                   data-premier="<?php echo $each ?>"
                                   style="text-align: center"><span><?php echo $each ?></span></a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                <form action="<?php echo url('movie/booking') ?>" method='POST'
                      class="form-booking showtime row btn p-0 m-0"
                      style="display: flex; justify-content: flex-start;"></form>
                <div class="recommend-film">
                    <div id="formList">
                        <div id="list">
                            <?php foreach ($movieRelation as $movie) { ?>
                                <div class="item">
                                    <div class="avatar"><img src="<?php echo url($movie['banner_path']) ?>"/></div>
                                    <div class="about"><?php echo $movie['title'] ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="direction">
                        <button id="prev"><</button>
                        <button id="next">></button>
                    </div>
                </div>
            </div>
        </div>
        <div
                tabindex="-1"
                class="modal fade"
                id="staticBackdrop"
                data-backdrop="static"
                data-keyboard="false"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
        >
            <div class="modal-dialog modal-xl">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h5 class="modal-title text-white"><?php echo $data['title']; ?></h5>
                        <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe
                                width="100%"
                                height="500"
                                src="<?php echo $data['trailer_path']?>"
                                title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer ; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="<?php echo url('public/assets/images/color-sharp2.png') ?>" alt="" class="background-image-right">
    <img src="<?php echo url('public/assets/images/color-sharp.png') ?>" alt="" class="background-image-left">
</div>
<script>
    function show(event) {
        $('.timer').val(event.target.innerText)
        $('.form-booking').submit();
    }

    $(document).ready(function () {
        const premierDate = $('.premier_date');
        premierDate.each(function (index, date) {
            $(date).on('click', function (event) {
                event.preventDefault();
                premierDate.removeClass('active');
                $(this).addClass('active');
                let premier = $(this).data('premier').split(" ")[0];
                let movieId = $('.movie_id').val();
                let categoryId = $('.category_id').val();
                console.log("in get premiers date MovieController");
                console.log(premier, movieId, categoryId);
                $.ajax({
                    url: "<?php echo url('api/get-premieres')?>",
                    method: "POST",
                    data: {
                        'movie_id': movieId,
                        'category_id': categoryId,
                        'premier_date': premier
                    },
                    success: function (response, status) {
                        let showtime = $('.showtime');
                        console.log(showtime);
                        console.log(response);
                        localStorage.setItem('premier_date', response.premier_date);
                        if (response.data.length === 0) {
                            showtime.html("<span style='color:red'>NOT MOVIES SHOWTIME TODAY</span>");
                        } else {
                            html = `
                                <?php echo $movie_id?>
                                <?php echo $category_id ?>
                                <input type="hidden" name="premier_date" value='${response.premier_date}'/>
                                <input type="hidden" name="timer" class="timer" value=''/>
                            `;
                            response.data.forEach((item, index) => {
                                html += `
                                <a class="btn btn-outline-info mr-2 my-2 time">
                                    <label for="${index}"  class="" onclick="show(event)">${item}</label>
                                    <input type="radio" name="timer" value="${item}" id="${index}" style="display: none">
                                </a>
                            `
                            });
                            showtime.html(html);
                        }
                    },
                    error: function (err) {
                        console.error(err);
                    }
                })
            })
        });
    })
</script>
<script>
    document.getElementById("next").onclick = function () {
        const widthItem = document.querySelector(".item").offsetWidth;
        document.getElementById("formList").scrollLeft += widthItem;
    };
    document.getElementById("prev").onclick = function () {
        const widthItem = document.querySelector(".item").offsetWidth;
        document.getElementById("formList").scrollLeft -= widthItem;
    };

    $(".btn-play").on("click", function () {
        $("#staticBackdrop").modal("toggle");
    });
</script>
<?php require assets('app/Views/public/footer.php') ?>
