@extends("comman.layout")

@section("title")
    Report Result
@endsection

<style>
    .first
    {
        background-color: #BBDEFB;
    }

    .second
    {
        background-color: #E3F2FD;
    }

    .pcr
    {
        font-weight: bold;
    }


</style>

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
                <th>First PCR</th>
                <th>First Visit Treatment 1</th>
                <th>First Visit Treatment 2</th>
                <th>First Visit Date</th>
                <th>Last PCR</th>
                <th>Last Visit Treatment 1</th>
                <th>Last Visit Treatment 2</th>
                <th>Last Visit Date</th>
            </tr>
            </thead>

            <tbody>

            @foreach($result as $row)

                <tr>
                    <td><a href="/patient/{{$row->ID}}">{{$row->Name}}</a></td>
                    <td>{{$row->Address}}</td>
                    <td>{{$row->HospitalName}}</td>

                    <td class="first pcr">{{$row->FirstPCR}}</td>
                    <td class="first">{{$row->FirstVisitTreatment1}}</td>
                    <td class="first">{{$row->FirstVisitTreatment2}}</td>
                    <td class="first">{{$row->FirstVisitDate}}</td>

                    <td class="second pcr">{{$row->LastPCR}}</td>
                    <td class="second">{{$row->LastVisitTreatment1}}</td>
                    <td class="second">{{$row->LastVisitTreatment2}}</td>
                    <td class="second">{{$row->LastVisitDate}}</td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

@endsection