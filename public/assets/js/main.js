$(document).ready(function () {

    console.clear()

    const navExpand = [].slice.call(document.querySelectorAll('.nav-expand'))
    const backLink = `<li class="nav-item">
        <a class="nav-link nav-back-link" href="javascript:;">

        </a>
    </li>`

    navExpand.forEach(item => {
        item.querySelector('.nav-expand-content').insertAdjacentHTML('afterbegin', backLink)
        item.querySelector('.nav-link').addEventListener('click', () => item.classList.add('active'))
        item.querySelector('.nav-back-link').addEventListener('click', () => item.classList.remove('active'))
    })


    // ---------------------------------------
    // not-so-important stuff starts here

    const ham = document.getElementById('ham')
    ham.addEventListener('click', function() {
        document.body.classList.toggle('nav-is-toggled')
    })


    // lazy image
    $(function() {
        $('.lazy').Lazy();
    });

    // khởi chạy select 2
    $('.select2').select2(
        {
            tags: true,
            tokenSeparators: [',', ' ']
        }
    )

    // var mouse_is_inside = false;
    // header
    // $('#navbarDropdown').click(function () {
    //   $('#browse-menu').css('display','block');
    //   mouse_is_inside = true;
    // });
    // $("body").mouseup(function(){
    //     if(mouse_is_inside) $('#browse-menu').css('display','none');
    // });

    // navbar
    $('.iconmenu').click(function (e) {
        $('#menu-mb').addClass('open');
    });
    $('#close').click(function (e) {
        $('#menu-mb').removeClass('open');
    });

    // khởi tạo fancybox
    Fancybox.bind("[data-fancybox]", {
      // Toolbar: {
      //   display: {
      //     left: ["infobar"],
      //     middle: [
      //       "zoomIn",
      //       "zoomOut",
      //       "toggle1to1",
      //       "rotateCCW",
      //       "rotateCW",
      //       "flipX",
      //       "flipY",
      //     ],
      //     right: ["slideshow", "thumbs", "close"],
      //   },
      // }
    });

    // khởi chạy slide cho trang detail
    $('#slide_detail').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
          {
            breakpoint: 1600,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
            }
          },
          {
            breakpoint: 769,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
    });

    // khởi chạy slide cho trang detail
    $('#post_related').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
          {
            breakpoint: 1600,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
            }
          },
          {
            breakpoint: 769,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
    });

    // khởi chạy slide cho trang detail
    $('#slidebannervideo').slick({
        dots: false,
        infinite: true,
        speed: 1000,
        fade: true,
        cssEase: 'linear',
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
          {
            breakpoint: 1600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 769,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
    });

});

function Show_wait_announce() {
    Swal.fire({
        imageUrl: "/assets/images/loading.gif",
        text : 'Vui lòng chờ trong giây lát...',
        showConfirmButton: false,
    })
}

function show_fail_announce(text = '') {
    Swal.fire({
        icon: 'error',
        title: 'Thất bại',
        text : text,
        showConfirmButton: false,
        // timer: 1000,
        // timerProgressBar: true
    })
}

function show_success_announce(time = 1000) {
    Swal.fire({
        icon: 'success',
        title: 'Thành công',
        showConfirmButton: false,
        timer: time,
        timerProgressBar: true
    })
}
