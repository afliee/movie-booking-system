<?php
require_once assets('app/Views/public/header.php');
if (session()->exists('premier_date')) {
    $premier_date = session()->pull('premier_date');
}
?>
<style>
    <?php require_once  assets('public/css/ticket/style.css')?>
</style>
<div class="white-space container-fluid">
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="">
                <div class="content row">
                    <?php echo $id ?>
                    <div class="banner-img col-md-6 col">
                        <img src="<?php echo url($movie['banner_path']) ?>" alt="" class="w-100">
                    </div>
                    <div class="info col-md-6 col">
                        <h1 class="movie-name" style=" color: #6F65FA;"><?php echo $movie['name'] ?></h1>
                        <h4 style="text-align: center;"><?php echo $movie['title'] ?></h4>
                        <h4 style="text-align: center"><?php if (isset($premier_date)) {
                                echo $premier_date;
                            } ?>
                        </h4>
                        <p><?php echo $movie['description'] ?></p>
                        <p><?php echo $movie['duration'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <?php if (count($rooms) == 0) { ?>
                <h1>COMMING SOON...</h1>
            <?php } else { ?>
                <div class="py-4 slider">
                    <?php ?>
                    <?php foreach ($rooms as $room => $tickets) { ?>
                        <div>
                            <h3 class="title room" style="margin: 20px 0;" data-room-id=""><?php echo $room ?></h3>
                            <div class="about-ticket">
                                <?php foreach ($tickets as $ticket) { ?>
                                    <?php if ($ticket['is_bought']) { ?>
                                        <a href="#"
                                           style="background-color: #cccccc;cursor: not-allowed; pointer-events: none;display: inline-block"
                                           class="disable btn date premier_date my-2 p-3 seat"
                                           data-room-id="<?php echo $ticket['room_id'] ?>"
                                           data-price_per_ticket="<?php echo $ticket['price_per_ticket'] ?>"
                                           data-ticket-id ="<?php echo $ticket['id']?>"
                                           data-seat-id="<?php echo $ticket['seat_id']?>"
                                        >
                                            <span style="display: inline-block;">
                                                <?php echo $ticket['location'] ?>
                                            </span>
                                        </a>
                                    <?php } else { ?>
                                        <a href="#"
                                           class="btn date premier_date my-2 p-3 text-dark seat"
                                           style="background-color: #EAEd5e;display: inline-block"
                                           data-room-id="<?php echo $ticket['room_id'] ?>"
                                           data-price_per_ticket="<?php echo $ticket['price_per_ticket'] ?>"
                                           data-ticket-id ="<?php echo $ticket['id']?>"
                                           data-seat-id="<?php echo $ticket['seat_id']?>"
                                        >
                                            <span style="display: inline-block;">
                                                <?php echo $ticket['location'] ?>
                                            </span>
                                        </a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="mt-4 row">
        <div class="combo-food  col-12">
            <a href="#" class="get-combo btn btn-change-product">Combos</a>
            <a href="#" class="get-food btn btn-change-product">Food</a>
            <div class="foods"></div>
            <div class="combos">
                <nav class="nav nav-tabs combo-title"></nav>
                <div class="tab-content">
                </div>
            </div>
        </div>
        <form action="<?php echo url('payment')?>" method="POST" class="col-12 row form-submit" >
            <div class="cards col-md-8 col-12"></div>
            <div class="products col-md-4  col-sm-12 "></div>
            <div class="col-12 offset-10 total" style="font-size: 30px;"><button class="btn-pay" role="button" type="submit" obsubmit="return fasle;">Pay Now</button></div>
        </form>
    </div>
    
</div>
<img src="<?php echo url('public/assets/images/color-sharp.png')?>" alt="" class="background-image-left">
<img src="<?php echo url('public/assets/images/color-sharp2.png')?>" alt="" class="background-image-right">
<script src="<?php echo url('public/js/handle/update-ticket.js') ?>"></script>
<!--<script src="--><?php //echo url('public/js/handle/callAjax.js')?><!--"></script>-->
<script type="module">
    import callAjax from "<?php echo url('public/js/handle/callAjax.js')?>";
    document.title = "Booking";

    $(document).ready(function () {
        $('.get-combo').click(function (event) {
            event.preventDefault();
            $('.foods').hide();
            $('.combos').show()
        })

        $('.get-food').click(function (event) {
            event.preventDefault();
            $('.combos').hide();
            $('.foods').show();
        })

        function updateProducts({id, title, price}) {
            const html = `
                <div class="product">
                    <div class="content">
                        <h3 class="product-title">${title}</h3>
                        <p>Price: ${price}</p>
                    </div>
                    <i class="bi bi-x-lg btn-close" data-price-product="${price}"></i>
                    <input type="hidden" name="product_id[]" value="${id}">
                </div>
            `;
            return html;
        }

        callAjax(
            "<?php echo url('api/get-food')?>",
            "GET",
            {},
            function (...foods) {
                let html = ``;
                $(foods[0].foods).each(function (index, food) {
                    html += `
                    <div class="food">
                        <div class="content">
                            <h3 class="food-title">${food.name}</h3>
                            <p>${food.description}</p>
                            <strong class"price">Price : <h5 style="display: inline-block">${food.price}</h5></strong>
                        </div>
                        <span class="btn-add" data-value="${food.id}" data-price-food="${food.price}"><i class="bi bi-plus"></i></span>
                    </div>
                    `;
                });
                $('.foods').append(html);
                $('.foods .food').each(function (index, food) {
                    console.log($(food).find(".btn-add").data('price-food'));
                    $(food).on('click', function(event) {
                        const price = $(this).find('.btn-add').data('price-food');
                        const id = $(this).find('.btn-add').data('value');
                        console.log();
                        const product = updateProducts({
                            id,
                            title: $(this).children().find('.food-title').text(),
                            price
                        })
                        $('.products').append(product);
                        processDelete();
                    })
                })
            }
        );

        function processDelete() {
            $('.products .btn-close').each(function (index, btn) {
                $(btn).on('click', function(event) {
                    $(this).parent().remove();
                })
            })
        }

        callAjax(
            "<?php echo url('api/get-combo')?>",
            "GET",
            {},
            function (...combos) {
                let tabTitle = '';
                let tabContent = [];
                let i = 0;
                $.each(combos[0].combos, function (comboId, foods) {
                    tabTitle += `
                        <li class="nav-item">
                            <a
                                href="#combo-${comboId}"
                                data-toggle="tab"
                                class="nav-link"
                            >
                                Combo ${comboId}
                            </a>
                        </li>
                    `;
                    let content = [];
                    let totalOfCombo = 0;

                    $.each(foods, function (index, food) {
                        totalOfCombo += parseInt(food.price, 10);
                        content[index] =
                            `<div class="combo">
                                <div class="content">
                                    <h3 combo__header>${food.name}</h3>
                                    <p>${food.description}</p>
                                    <strong class"price">Price : <h5 style="display: inline-block">${food.price}</h5></strong>
                                </div>
                            </div>
                        `;
                    });
                    tabContent[i++] =
                        `<div id="combo-${comboId}" class="tab-pane fade" role="tabpanel">
                        ${content.join("")}
                        <button class="btn-bought btn btn-pay ml-2 mt-3" data-combo-id="${comboId}" data-price-combo="${totalOfCombo}" data-value="${comboId}">Add it</button>
                    </div>`
                })
                // append content DOM
                $('.combo-title').append(tabTitle);
                $('.tab-content').append(tabContent.join(""));

                $('.combo-title .nav-item .nav-link')[0].classList.add('active');
                $('.tab-content div').first()[0].classList.add('active', 'show')

                $('.combo-title .nav-item').each(function (index, link) {
                    $(link).on('click', function (event) {
                        $('.combo-title .nav-link').removeClass('active');
                        $(this).addClass('active');
                    })
                })

                $('.tab-content .btn-pay').each(function (index, btn) {
                    $(btn).on('click', function (event) {
                        const title = "Combo " + $(this).data('combo-id');
                        const price = $(this).data('price-combo');
                        const id = $(this).data('value');
                        const procduct = updateProducts({
                            id, title, price
                        })
                        $('.products').append(procduct);
                        processDelete();
                    })
                })
            }
        );
    })
</script>

<!-- js handle slider -->
<script>
    $(document).ready(function () {
        $('.slider').slick({
            dots: false,
            infinite: true,
            speed: 500,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            cssEase: 'linear',
            prevArrow: '<a class="slick-prev" href="#"><svg width="40" height="40" viewBox="0 0 40 40" fill="none" ' +
                'xmlns="http://www.w3' +
                '.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M20 40C8.9543 40 -2.7141e-06 31.0457' +
                ' -1.74846e-06 20C-7.8281e-07 8.9543 8.95431 -2.7141e-06 20 -1.74846e-06C31.0457 -7.8281e-07 40 8.9543 40 20C40 31.0457 31.0457 40 20 40ZM16.1206 13.5198C15.7554 13.1055 15.1632 13.1055 14.798 13.5198L9.58704 19.4308C9.22182 19.8451 9.22182 20.5168 9.58704 20.931L14.798 26.8421C15.1632 27.2563 15.7554 27.2563 16.1206 26.8421C16.4858 26.4278 16.4858 25.7561 16.1206 25.3418L12.4912 21.2248L29.6865 21.2248C30.2388 21.2248 30.6865 20.7771 30.6865 20.2248C30.6865 19.6725 30.2388 19.2248 29.6865 19.2248L12.4138 19.2248L16.1206 15.02C16.4858 14.6057 16.4858 13.934 16.1206 13.5198Z" fill="#7C8B9C"/></svg></a>',
            nextArrow: '<a class="slick-next" href="#"><svg width="40" height="40" viewBox="0 0 40 40" fill="none" ' +
                'xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M20 3' +
                '.49691e-06C31.0457 5.4282e-06 40 8.95431 40 20C40 31.0457 31.0457 40 20 40C8.9543 40 1.56562e-06 31.0457 3.49691e-06 20C5.4282e-06 8.95431 8.95431 1.56562e-06 20 3.49691e-06ZM23.8794 26.4802C24.2446 26.8945 24.8368 26.8945 25.202 26.4802L30.413 20.5692C30.7782 20.1549 30.7782 19.4833 30.413 19.069L25.202 13.1579C24.8368 12.7437 24.2446 12.7437 23.8794 13.1579C23.5142 13.5722 23.5142 14.2439 23.8794 14.6582L27.5088 18.7752L10.3135 18.7752C9.7612 18.7752 9.31348 19.2229 9.31348 19.7752C9.31348 20.3275 9.76119 20.7752 10.3135 20.7752L27.5862 20.7752L23.8794 24.98C23.5142 25.3943 23.5142 26.066 23.8794 26.4802Z" fill="#7C8B9C"/></svg></a>',
        });
    })
</script>

<!-- hadnle card -->
<script>
    function parseDMY(s) {
        let [d, m, y] = s.split(/\D/);
        return new Date(y, m - 1, d).toLocaleDateString('en');
    };

    function updateCard(data) {
        const {ticketId, seatId, element, location, title, price, roomId} = data;
        const cards = $('.cards');
        console.log("local " + localStorage.getItem('premier_date'))
        const date = new Date(parseDMY(localStorage.getItem('premier_date')));
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        const month = monthNames[date.getMonth()];
        const day = date.getDate();
        html = `
            <div class="item" data-price_per_ticket="${price}">
                <div class="item-right">
                    <h2 class="num">${day}</h2>
                    <p class="day">${month}</p>
                    <span class="up-border"></span>
                    <span class="down-border"></span>
                </div>

                <div class="item-left">
                    <p class="event">Movie Ticket</p>
                    <h2 class="title">${title}</h2>

                    <div class="sce">
                        <div class="icon">
                            <i class="bi bi-table"></i>
                        </div>
                        <p class="h5 d-inline-block">${date}</p>
                    </div>
                    <div class="fix"></div>
                    <div class="loc">
                        <div class="icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <p>Hàng Ghế: ${location}</p>
                    </div>
                    <div class="fix"></div>
                </div>
                <input type="hidden" name="ticket_id[]" value="${ticketId}">
                <input type="hidden" name="seat_id[]" value="${seatId}">
            </div>
        `;
        return html;
    }

    $(document).ready(function () {
        const seatNotPurchase = $(".about-ticket .seat:not('.disable')");

        seatNotPurchase.each(function (index, seat) {
            $(seat).on('click', function (event) {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active');
                } else {
                    $(this).addClass('active');
                }

                $('.cards').empty();
                $(".about-ticket .seat:not('.disable').active").each(function (index, seatActive) {
                    console.log(seatActive);
                    const price = $(seatActive).data('price_per_ticket');
                    const roomId = $(seatActive).data('room-id')
                    const ticketID = $(seatActive).data('ticket-id');
                    const seatID = $(seatActive).data('seat-id');
                    const title = $('.movie-name')[0].innerHTML;
                    let card = updateCard({
                        ticketId : ticketID,
                        seatId : seatID,
                        element: seatActive,
                        location: $(seatActive).children()[0].innerText,
                        title,
                        price,
                        roomId
                    });
                    $('.cards').append(card);
                    // if ($('.total span').text()) {
                    //     const prevPrice = $('.total span').text();
                    //     $('.total span').text(parseInt(prevPrice, 10) + price);
                    // }else {
                    //     $('.total span').text(price);
                    // }
                });
            });
        });
    })
</script>
<script>
        // function checkSubmit() {
        //     console.log(!$('.cards').children().lenght);
        //     if (!$('.cards').children().lenght) {
        //         toast({
        //             title: "Warning",
        //             message: "Please choose a ticket to pay",
        //             type: 'warning',
        //             duration: 2000
        //         })
        //         return false;
        //     } else {
        //         $('.form-submit')[0].submit();
        //     }
        // }
        $('.form-submit').on('submit', function (event) {
            if (!$('.cards .item').length) {
                toast({
                    title: "Warning",
                    message: "Please choose a ticket to pay",
                    type: 'warning',
                    duration: 2000
                })
                return false;
            } else {
                $(this).submit();
            }
        })
</script>
<?php require assets('app/Views/public/footer.php') ?>


