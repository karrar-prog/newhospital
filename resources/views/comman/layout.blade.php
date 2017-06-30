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
        <div class="ui container">
            <div class="ui hidden divider"></div>
            <div class="ui five item blue inverted menu">
                <a href="/patient" class="item">Patients</a>
                @if(isset($_SESSION["USER_TYPE"]) && intval($_SESSION["USER_TYPE"]) == 1)
                    <a href="/patient/report" class="item">Report</a>
                    <a href="/patient/simple-report" class="item">Simple Report</a>
                @endif
                <a href="/patient/exist" class="item">Check Exist</a>
                <a href="/logout" class="item">Logout</a>
            </div>
        </div>
    @endif


@yield("content")

</body>
</html>