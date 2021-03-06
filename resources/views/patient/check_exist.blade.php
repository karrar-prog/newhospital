@extends("comman.layout")

@section("title")
    Check Existence
@endsection

@section("content")


    <div class="ui container">

        <div class="ui hidden divider"></div>

        <div class="ui blue inverted segment">
            <div class="ui small center aligned header">
                Check Existence
            </div>
        </div>

        @if(isset($response))



            @if($response["exist"] == true)
                <div class="ui red inverted center aligned segment long leaf1">
                    <div class="ui small header">المريض : : {{$response["name"]}}</div>
                    <div class="ui medium header"> موجود مسبقاً</div>
                </div>
            @else
                <div class="ui green inverted center aligned segment long leaf1">
                    <div class="ui small header">Personal ID : {{$response["personalId"]}}</div>
                    <div class="ui small header">Address : {{$response["address"]}}</div>
                    <div class="ui medium header">غير موجود</div>
                </div>
            @endif

        @endif
        <div class="ui teal segment">

            <form class="ui form " action="/patient/exist" method="post">
                <div class="field">
                    <label>Personal ID</label>
                    <input name="PersonalID" type="text">
                </div>

                @include('dropdown.address')

                <button class="ui large green button">Check Existence</button>

            </form>
        </div>
    </div>

    <script>
        $(".ui.dropdown").dropdown();
    </script>

    <script>

        $('.long.leaf.image')
            .transition('pulse')
        ;
    </script>
    <script>
        $('.long.leaf1')

            .transition('pulse', '400ms')
            .transition('pulse', '400ms')
        ;
    </script>

@endsection