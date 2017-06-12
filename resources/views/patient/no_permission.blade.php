@extends("comman.layout")

@section("title")
    Report Result
@endsection

<style>
    .yellow.lock.icon:before
    {
        font-size: 128px;
    }


</style>

@section("content")


    <div class="ui container">

        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>

        <div class="ui center aligned huge header">
            <i class="yellow lock icon"></i>
        </div>
        <div class="ui center aligned medium header">You Don't Have Permission To This Operation</div>

        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>

    </div>

@endsection