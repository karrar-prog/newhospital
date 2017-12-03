@extends("comman.layout")


@section("title")
    Delete Patient
@endsection

@section("content")
    <div class="ui container">
        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>

        <div class="ui inverted yellow segment">

            <div class="ui large header">الرجاء الاختيار . </div>
            <div class="ui medium header">هل انت متأكد من حذف المريض :   {{$patient->Name}}</div>

            <div style="text-align: center;">
                <a class="ui red button" href="/patient/delete-now/{{$patient->ID}}">Delete</a>
            </div>

        </div>


    </div>
@endsection