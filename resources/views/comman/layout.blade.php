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
    @if(isset($_SESSION["USER_TYPE"]) && intval($_SESSION["USER_TYPE"]) == 3)

        <div class="ui container">
            <div class="ui small menu">
                <div style="text-align: center;"><img style="margin: 0 auto;" src="{{asset("image/logo.gif")}}"
                                                      class="ui rounded tiny image"></div>


                <div class="ui dropdown item">
                    Reports <i class="dropdown icon"></i>
                    <div class="menu" >

                        <a class="item" style="width: 180px ; text-align: left">

                            <a style="margin-left: 15px" href="/patient/report" class="ui green left icon ">
                                <i class="large bar chart icon"></i>
                                Report With PCR
                            </a>
                        </a>

                        <a class="item" style="width: 180px ; text-align: left">
                            <a style="margin-left: 15px" href="/patient/simple-report" class="ui green left icon ">
                                <i class="large line chart icon"></i>
                                General Report
                            </a>
                        </a>

                        <a class="item" style="width: 180px ; text-align: left">
                            <a style="margin-left: 15px" href="/patient/exist" class="ui green right icon">
                                <i class="large find icon"></i>
                                Check Exist
                            </a>
                        </a>


                        <a class="item" style="width: 180px ; text-align: left">
                            <a style="margin-left: 15px" href="/patient" class="ui green right icon">
                                <i class="large search icon"></i>
                                Search
                            </a>
                        </a>

                        <a class="item" style="width: 180px ; text-align: left">




                        </a>

                    </div>
                </div>


                <div class="right menu">
                    <a class="item" href="/logout" class="ui green center right icon button">
                        <i class="large sign out icon"></i>
                        Logout
                    </a>
                </div>


            </div>


        </div>

        </div>
    @else
        <div class="ui container">
            <div class="ui small menu">
                <div style="text-align: center;"><img style="margin: 0 auto;" src="{{asset("image/logo.gif")}}"
                                                      class="ui rounded tiny image"></div>
                <div class="ui dropdown item">
                    Patients <i class="dropdown icon"></i>
                    <div class="menu">

                        <a class="item">
                            <a style="width: 180px ; text-align: left" href="/patient/exist"
                               class="ui green right icon button">
                                <i class="large find icon"></i>
                                Check Exist
                            </a>
                        </a>
                        <a class="item">
                            <a style="width: 180px ; text-align: left" href="/patient/add-new"
                               class="ui green right icon button">
                                <i class="large add user icon"></i>
                                Add New
                            </a>
                        </a>
                        <a class="item">
                            <a style="width: 180px ; text-align: left" href="/patient"
                               class="ui blue green icon button">
                                <i class="large  users icon"></i>
                                All Patient
                            </a>
                        </a>


                    </div>
                </div>
                <div class="ui dropdown item">
                    Reports <i class="dropdown icon"></i>
                    <div class="menu">


                        <a class="item">
                            <a style="width: 180px ; text-align: left" href="/patient/report"
                               class="ui green left icon button">
                                <i class="large bar chart icon"></i>
                                Report With PCR
                            </a>
                        </a>

                        <a class="item">
                            <a style="width: 180px ; text-align: left" href="/patient/simple-report"
                               class="ui green left icon button">
                                <i class="large line chart icon"></i>
                                General Report
                            </a>
                        </a>

                    </div>
                </div>
                <div class="ui dropdown item">
                    Doctors <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item">
                            <a style="width: 180px ; text-align: left" href="/newdoctor"
                               class="ui green right icon button">
                                <i class="large doctor icon"></i>
                                Add New
                            </a>
                        </a>

                        <a class="item">
                            <a style="width: 180px ; text-align: left" href="/logout"
                               class="ui green right icon button">
                                <i class="large sign out icon"></i>
                                Logout
                            </a>
                        </a>


                    </div>


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