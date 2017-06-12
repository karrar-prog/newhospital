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
                    <div class="field">
                        <label>Doctor Name</label>
                        <input name="doctorName" type="text">
                    </div>

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

                    <div class="field">
                        <label>Scientific Degree</label>
                        <input name="sd" type="text">
                    </div>
                    <div class="field">
                        <label>Address</label>
                        <input name="address" type="text">
                    </div>
                    <div class="field">
                        <label>Work</label>
                        <input name="work" type="text">
                    </div>

                    <div class="field">
                        <label>Status</label>
                        <input name="status" type="text">
                    </div>

                </div>

                <div class="eight wide column">

                        <div class="field">
                            <label>D.M</label>
                            <input name="dm" type="text">
                        </div>

                        <div class="field">
                            <label>CRF</label>
                            <input name="crf" type="text">
                        </div>

                        <div class="field">
                            <label>Diagnose</label>
                            <input name="diagnose" type="text">
                        </div>

                        <div class="field">
                            <label>Diagnose Method</label>
                            <input name="diagnoseMethod" type="text">
                        </div>

                        <div class="field">
                            <label>Disease Type</label>
                            <input name="diseaseType" type="text">
                        </div>

                        <div class="field">
                            <label>Disease Reason</label>
                            <input name="diseaseReason" type="text">
                        </div>

                        <div class="field">
                            <label>Fibroscan</label>
                            <input name="fibroscan" type="text">
                        </div>

                        <div class="field">
                            <label>LiverBioposy</label>
                            <input name="liverBioposy" type="text">
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

@endsection