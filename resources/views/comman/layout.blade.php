<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>

    @include("comman.heads")
</head>

<style>
    body {
        background-color: #EEEEEE;
    }

</style>

<body>

@if(isset($_SESSION["Login"]) && $_SESSION["Login"] == true )

    @if(isset($_SESSION["USER_TYPE"]) && intval($_SESSION["USER_TYPE"]) == 1)
        <div class="ui right aligned container">
            <div class="ui right labeled icon menu">
                <a class="left item" href="/logout" class="ui green center right icon button">
                    <i class="large sign out icon"></i>
                    تسجيل خروج
                </a>

                <div class="right menu">


                    <a href="/patient/simple-report" class="item">
                        <i class="pie chart  icon"></i>
                        تقارير
                    </a>

                <a href="/patient" class="item">
                    <i class="users icon"></i>
                    ملفات المرضى
                </a>
                <a href="/patient/add-new" class="item">
                    <i class="add user icon"></i>
                    اضافة مريض
                </a>




            </div>

            </div>
        </div>



    @else

        <div class="ui container">
            <div class="ui labeled icon menu">
                <a href="/patient" class="item">
                    <i class="users icon"></i>
                    المرضى
                </a>
                <a href="/patient/add-new" class="item">
                    <i class="add user icon"></i>
                    اضافة مريض
                </a>
                <a href="/patient/simple-report" class="item">
                    <i class="pie chart  icon"></i>
                    تقارير
                </a>

                <div class="right menu">
                    <a class="item" href="/logout" class="ui green center right icon button">
                        <i class="large sign out icon"></i>
                        تسجيل خروج
                    </a>
                </div>
            </div>
        </div>

    @endif


@endif


<script>
    $('.long.leaf.image')
        .transition('pulse')
    ;
</script>

@yield("content")
<script>
    $(".ui.dropdown").dropdown();

</script>
</body>
</html>