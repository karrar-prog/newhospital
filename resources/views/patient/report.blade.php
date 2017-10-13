@extends("comman.layout")

@section("title")
    PatientReport
@endsection

@section("content")

    <div class="ui container">

        <div class="ui hidden divider"></div>
        <div class="ui blue inverted segment">
            <div class="ui center aligned large header">
                Patient Report
            </div>
        </div>
        <form class="ui center aligned form" method="post" action="/patient/report">

            <div class="ui small header"><div class="ui orange label">Leave Field Blank If It Wasn't Needed</div></div>

            <div class="ui left aligned grid">

                <div class="eight wide column">
                    {{--<div class="field">--}}
                        {{--<label>Doctor Name</label>--}}
                        {{--<input name="doctorName" type="text">--}}
                    {{--</div>--}}

                    @include("dropdown.doctors")

                    <div class="field">
                        <label>Paient Name</label>
                        <input name="patientName" type="text">
                    </div>


                    <div class="field">
                        <label>From Age</label>
                        <input name="ageFrom" type="text">
                    </div>

                    <div class="field">
                        <label>To Age</label>
                        <input name="ageTo" type="text">
                    </div>

                    @include("dropdown.sd")


                    @include("dropdown.address")

                    @include("dropdown.work")

                    @include("dropdown.status")


                    <div class="field">
                        <label>Start PCR</label>
                        <input name="firstPCR" type="number">
                    </div>

                    <div class="field">
                        <label>Treatment</label>
                        <input name="treatment" type="text">
                    </div>

                </div>

                <div class="eight wide column">

                    @include("dropdown.dm")

                    @include("dropdown.crf")

                    @include("dropdown.diagnose")

                    @include("dropdown.diagnose_method")

                    @include("dropdown.disease_type")

                    @include("dropdown.disease_reason")

                    @include("dropdown.fibroscan")

                    @include("dropdown.liver_biopsy")

                    <div class="field">
                        <label>End PCR</label>
                        <input name="lastPCR" type="number">
                    </div>



                </div>

            </div>

            <div style="text-align: center;margin-top: 16px;">
                <button class="ui large blue button">Find Now</button>
            </div>

        </form>


        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>

    </div>

    <script>
        $(".ui.dropdown").dropdown();
    </script>

@endsection