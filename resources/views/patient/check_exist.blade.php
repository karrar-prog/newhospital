@extends("comman.layout")

@section("title")
    Check Existence
@endsection

@section("content")

    <div class="ui container">

        <div class="ui hidden divider"></div>

        <div class="ui blue inverted segment">
            <div class="ui large center aligned header">
                Check Existence
            </div>
        </div>

        @if(isset($response))

            @if($response["exist"] == true)
                <div class="ui info message">
                    <div class="ui small header">{{$response["name"]}} Is Exist</div>
                </div>
            @else
                <div class="ui warning message">
                    <div class="ui small header">Person With {Personal ID - Address} {{$response["name"]}} Is Not Exist</div>
                </div>
            @endif

        @endif

        <form class="ui form" action="/patient/exist" method="post">
            <div class="field">
                <label>Personal ID</label>
                <input name="PersonalID" type="text">
            </div>

            @include('dropdown.address')

            <button class="ui large blue button">Check Existence</button>

        </form>

    </div>

    <script>
        $(".ui.dropdown").dropdown();
    </script>

@endsection