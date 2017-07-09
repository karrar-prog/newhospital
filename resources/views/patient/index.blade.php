@extends("comman.layout")

@section("title")Patient
@endsection

<style>
    .ui.table thead th
    {
        background: #2185d0 !important;
        color: #FFFFFF !important;
    }
    .form .ui.button
    {
        vertical-align: middle !important;
    }
</style>

@section("content")

    <div class="ui container">

        <div class="ui hidden divider"></div>

        <form action="/patient/search" method="post" class="ui form">

            <div class="inline field">
                <input name="search" type="text" placeholder="Part of the name">
                <button class="ui blue icon button"><i class="search icon"></i></button>
            </div>

        </form>

        <table class="ui stripped celled table">

            <thead>
                <tr>
                    <th>Name</th>
                    <th>File Number</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

            @foreach($patients as $patient)
                <tr>
                    <td><a href="/patient/{{$patient["ID"]}}">{{$patient["Name"]}}</a></td>
                    <td>{{$patient["FileNumber"]}}</td>
                    <td>{{$patient["Phone"]}}</td>
                    <td>{{$patient["Age"]}}</td>
                    <td>{{$patient["Gender"]}}</td>
                    <td style="text-align: center;">
                        <a class="ui blue button" href="/patient/update/{{$patient["ID"]}}">Update</a>
                        <a class="ui red button" href="/patient/delete/{{$patient["ID"]}}">Delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>

        </table>

        <div class="ui hidden divider"></div>

    </div>

@endsection