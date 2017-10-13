@extends("comman.layout")

@section("title")
    Login
@endsection

@section("content")

<div class="ui container">

    <div class="ui hidden divider"></div>

    <div class="ui blue inverted segment ">
        <div class="ui large center aligned header">
            Login Here
        </div>
    </div>

    @if(isset($_SESSION["LOGIN_SUCCESS"]) && $_SESSION["LOGIN_SUCCESS"] == false)
        <div class="ui error message">Email Or Password Are Not Correct</div>
    @endif

    <?php unset($_SESSION["LOGIN_SUCCESS"]) ?>

    <form class="ui form" action="/login" method="post">

        <div class="field test button">
            <label>Email</label>
            <input type="text" name="email" placeholder="email">
        </div>

        <div class="field test button">
            <label>Password</label>
            <input type="password" name="password" placeholder="Password">
        </div>

        <button class="ui button green leaf" type="submit">Login</button>
    </form>

</div>
<script>
    $('.green.leaf')
        .transition({
            animation  : 'scale',
            duration   : '0s',

        })
        .transition({
            animation  : 'scale',
            duration   : '2s',

        })
    ;
</script>
<script>
    $('.test.button')
        .transition('horizontal flip', '0ms')
    ;
    $('.test.button')
        .transition('horizontal flip', '500ms')
    ;
</script>
@endsection