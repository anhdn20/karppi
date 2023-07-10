$(document).ready(function () {

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

});
