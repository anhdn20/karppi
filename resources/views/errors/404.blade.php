<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 - không tìm thấy dữ liệu</title>
    <style>
.div404 {
    width: 100%;
    display: table-cell;
    vertical-align: middle;
    text-align: center;
    max-height: 50vh
}

.div404 h1 {
    font-size: 40px;
    display: inline-block;
    padding-right: 12px;
    animation: type .5s alternate infinite;
}

@keyframes type {
    from {
        box-shadow: inset -3px 0px 0px #888;
    }
    to {
        box-shadow: inset -3px 0px 0px transparent;
    }
}

.div404 img {
    object-fit: cover;
    width: 40%;
}
    </style>
</head>
<body>

    <div class="container-fluid" >

        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12" >
                <div class="div404 "style="display: flex;justify-content:center;flex-wrap: wrap;">
                    <div class="divbox1">
                        <img src="{{asset('images/3828537.jpg')}}" alt="">
                    </div>
                    <div class="divbox1" style="width: 100%; text-align:center;">
                        <h1 >404 - Không tìm thấy địa chỉ</h1>
                    </div>

                </div>
            </div>

        </div>
    </div>
</body>
</html>


