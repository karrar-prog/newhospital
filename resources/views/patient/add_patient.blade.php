@extends("comman.layout")

@section("title")
Add Patient
@endsection

@section("content")

<div class="ui container">

    <div class="ui hidden divider"></div>

    <div class="ui blue inverted segment">
        <div class="ui center aligned large header">
            Add Patient
        </div>
    </div>

    @if(\Illuminate\Support\Facades\Session::has("success"))
            @if(\Illuminate\Support\Facades\Session::get("success"))
                <div class="ui green inverted segment"><div class="ui large left aligned success header">
                    Patient Had Been Added.
                </div></div>
            @else
                <div class="ui red inverted segment"><div class="ui large left aligned header">
                    Patient Didn't Added! , Check If Patient Is Already Exist.
                </div></div>
            @endif
    @endif

    <form class="ui center aligned form" method="post" action="/patient/add-new">

        <div class="ui small header"><div class="ui orange label">All Fields Are Required</div></div>

        <div class="ui left aligned grid">

            <div class="eight wide column">

                <div class="field">
                    <label>Patient Name</label>
                    <input name="patientName" type="text">
                </div>

                <div class="field">
                    <label>File Number</label>
                    <input name="fileNumber" type="text">
                </div>

                <div class="field">
                    <label>Doctor Name</label>
                    <input name="doctorName" type="text">
                </div>

                <div class="field">
                    <label>Phone</label>
                    <input name="phone" type="text">
                </div>

                <div class="field">
                    <label>Age</label>
                    <input name="age" type="text">
                </div>

                @include("dropdown.gender")

                @include("dropdown.address")

                @include("dropdown.work")

                @include("dropdown.sd")

                @include("dropdown.status")

            </div>

            <div class="eight wide column">

                @include("dropdown.diagnose")

                @include("dropdown.diagnose_method")

                @include("dropdown.disease_type")

                @include("dropdown.disease_reason")

                @include("dropdown.liver_biopsy")

                @include("dropdown.fibroscan")

                @include("dropdown.dm")

                @include("dropdown.crf")

                <div class="field">
                    <label>Personal ID</label>
                    <input name="personalId" type="text">
                </div>

                <div class="field">
                    <label>Hospital</label>
                    <input name="hospital" type="text">
                </div>

            </div>

        </div>

        <div class="ui divider"></div>

        <div class="ui grid">
            <div class="eight wide column">

                <div class="ui small center aligned header">First Visit</div>

                <div class="field">
                    <label>PCR</label>
                    <input name="firstPCR" type="number">
                </div>

                <div class="field">
                    <label>Treatment 1</label>
                    <input name="firstTreatment1" type="text">
                </div>

                <div class="field">
                    <label>Treatment 2</label>
                    <input name="firstTreatment2" type="text">
                </div>

                <div class="field">
                    <label>Date</label>
                    <input name="firstDate" type="date">
                </div>

            </div>

            <div class="eight wide column">

                <div class="ui small center aligned header">Last Visit</div>

                <div class="field">
                    <label>PCR</label>
                    <input name="lastPCR" type="number">
                </div>

                <div class="field">
                    <label>Treatment 1</label>
                    <input name="lastTreatment1" type="text">
                </div>

                <div class="field">
                    <label>Treatment 2</label>
                    <input name="lastTreatment2" type="text">
                </div>

                <div class="field">
                    <label>Date</label>
                    <input name="lastDate" type="date">
                </div>

            </div>
        </div>

        <div style="text-align: center;margin-top: 16px;">
            <button class="ui large blue button">Add</button>
        </div>

    </form>


    <div class="ui hidden divider"></div>
    <div class="ui hidden divider"></div>

</div>

<script>
    $(".ui.dropdown").dropdown();
</script>

@endsection