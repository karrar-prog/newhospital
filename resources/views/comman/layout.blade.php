<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>

    @include("comman.heads")
</head>

<style>
    body
    {
        background-color: #EEEEEE;
    }
</style>

<body> 

    @if(isset($_SESSION["Login"]) && $_SESSION["Login"] == true)
        {{--@if(isset($_SESSION["USER_TYPE"]) && intval($_SESSION["USER_TYPE"]) == 1)--}}






            <div class="ui container">

                <div class="ui small menu">

                    <div style="text-align: center;"><img  style="margin: 0 auto;" src="{{asset("image/logo.gif")}}" class="ui rounded tiny image"></div>

                        <div class="ui dropdown item">
                            Patients <i class="dropdown icon"></i>
                            <div class="menu">
                                <a href="/patient/exist" class="item">Check Exist</a>
                                <a href="/patient" class="item">All Patient</a>
                                <a href="/patient/add-new" class="item">Add Patient</a>
                            </div>
                        </div>
                    <div class="ui dropdown item">
                        Reports <i class="dropdown icon"></i>
                        <div class="menu">
                            <a href="/patient/report" class="item">Report With PCR</a>
                            <a href="/patient/simple-report" class="item">General Report</a>
                        </div>
                    </div>
                    <div class="ui dropdown item">
                        Doctors <i class="dropdown icon"></i>
                        <div class="menu">
                            <a href="/newdoctor" class="item">Add Doctors</a>
                        </div>
                    </div>

                    <div class="right menu">

                        <div class="item">

                            <a href="/logout" class="ui primary button">Logout</a>
                        </div>
                    </div>


                </div>

                </div>
            </div>

        {{--@else--}}
            {{--<div class="ui container">--}}
                {{--<div class="ui hidden divider"></div>--}}
                {{--<div class="ui four item blue inverted menu">--}}
                    {{--<a href="/patient" class="item">Patients</a>--}}
                    {{--<a href="/patient/add-new" class="item">Add Patient</a>--}}
                    {{--<a href="/patient/exist" class="item">Check Exist</a>--}}
                    {{--<a href="/logout" class="item">Logout</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endif--}}
    @endif

    <script>
        $('.long.leaf.image')
            .transition('pulse')
        ;
    </script>

@yield("content")
<script >
    $(".ui.dropdown").dropdown();

</script>
</body>
</html>