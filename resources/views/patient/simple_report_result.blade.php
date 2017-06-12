@extends("comman.layout")

@section("title")
    Report Result
@endsection

@section("content")


    <div class="ui container">


        <div class="ui hidden divider"></div>

        <div class="ui blue inverted segment">
            <div class="ui center aligned large header">
                Report Result
            </div>
        </div>

        <table class="ui stripped celled table">

            <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Hospital</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Work</th>
                <th>RegisterDate</th>
            </tr>
            </thead>

            <tbody>

            @foreach($result as $row)

                <tr>

                    <td><a href="/patient/{{$row->ID}}">{{$row->Name}}</a></td>
                    <td>{{$row->Address}}</td>
                    <td>{{$row->HospitalName}}</td>

                    <td class="">{{$row->Phone}}</td>
                    <td class="">{{$row->Gender}}</td>
                    <td class="">{{$row->Age}}</td>
                    <td class="">{{$row->Work}}</td>
                    <td class="">{{$row->RegisterDate}}</td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

@endsection