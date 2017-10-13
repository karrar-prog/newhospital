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

    .ui.celled.table tr td:first-child, .ui.celled.table tr th:first-child
    {
        width: 50% !important;
    }

</style>

@section("content")

    <div class="ui container">

        <div class="ui hidden divider"></div>

        <form action="/patient/search" method="post" class="ui form">

            <div class="inline field ">
                <input  name="search" type="text" placeholder="Part of the name">
                <button class="ui blue icon button"><i class="search icon"></i></button>
            </div>

        </form>

        <div class="ui small header right floated">Do You Want To :
            <a class="ui small blue button" href="/patient/update/{{$patient->ID}}">Update</a>
            <a class="ui small red button" href="/patient/delete/{{$patient->ID}}">Delete</a>
        </div>

        <table class="ui stripped celled table">

            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>

                <tr><td>ID</td><td>{{$patient["ID"]}}</td></tr>
                <tr><td>Name</td><td>{{$patient["Name"]}}</td></tr>
                <tr><td>File Number</td><td>{{$patient["FileNumber"]}}</td></tr>
                <tr><td>Phone</td><td>{{$patient["Phone"]}}</td></tr>
                <tr><td>Age</td><td>{{$patient["Age"]}}</td></tr>
                <tr><td>Gender</td><td>{{$patient["Gender"]}}</td></tr>
                <tr><td>Address</td><td>{{$patient["Address"]}}</td></tr>
                <tr><td>Work</td><td>{{$patient["Work"]}}</td></tr>
                <tr><td>Scientific Degree</td><td>{{$patient["SD"]}}</td></tr>
                <tr><td>Status</td><td>{{$patient["Status"]}}</td></tr>
                <tr><td>Diagnose</td><td>{{$patient["Diagnose"]}}</td></tr>
                <tr><td>Way Of Diagnoses</td><td>{{$patient["DiagnoseMethod"]}}</td></tr>
                <tr><td>Disease Type</td><td>{{$patient["DiseaseType"]}}</td></tr>
                <tr><td>Disease Reason</td><td>{{$patient["DiseaseReason"]}}</td></tr>
                <tr><td>Doctor Name</td><td>{{$patient["DoctorName"]}}</td></tr>
                <tr><td>Liver-Biopsy</td><td>{{$patient["LiverBioposy"]}}</td></tr>
                <tr><td>Fibroscan</td><td>{{$patient["Fibroscan"]}}</td></tr>
                <tr><td>DM</td><td>{{$patient["DM"]}}</td></tr>
                <tr><td>CRF</td><td>{{$patient["CRF"]}}</td></tr>
                <tr><td>Registration Date</td><td>{{$patient["RegisterDate"]}}</td></tr>
                <tr><td>Hospital</td><td>{{$patient["HospitalName"]}}</td></tr>
                <tr><td>Personal ID Number</td><td>{{$patient["PersonalID"]}}</td></tr>

            </tbody>

        </table>

        @if(count($visits) > 0)

            <div class="ui large blue label">Visits</div>
            <table class="ui stripped celled table">

                <thead>
                <tr>
                    <th>PCR</th>
                    <th>Treatment 1</th>
                    <th>Treatment 2</th>
                    <th>Date</th>
                </tr>
                </thead>

                <tbody>

                @foreach($visits as $visit)
                    <tr>
                        <td>{{$visit->PCR}}</td>
                        <td>{{$visit->Treatment1}}</td>
                        <td>{{$visit->Treatment2}}</td>
                        <td>{{$visit->Date}}</td>
                    </tr>
                @endforeach

                </tbody>

            </table>

        @else
            <div class="ui warning message">Patient Has No Visit</div>
        @endif


        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>

    </div>


@endsection