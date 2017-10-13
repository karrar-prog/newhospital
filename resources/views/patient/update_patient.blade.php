@extends("comman.layout")

@section("title")
    Update Patient
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
                        Patient Had Been Updated.
                    </div></div>
            @else
                <div class="ui red inverted segment"><div class="ui large left aligned header">
                        Patient Didn't Updated! , Check If Patient Data Did't Conflict With Other Patients Data.
                    </div></div>
            @endif
        @endif

        <form class="ui center aligned form" method="post" action="/patient/update-now/{{$patient->ID}}">


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

                    @include("dropdown.doctors" , ["doctors" => $doctors])

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

                    @include("dropdown.diagnose")


                </div>

                <div class="eight wide column">


                    @include("dropdown.status")

                    @include("dropdown.diagnose_method")

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

                @include("patient.disease_type")

            </div>


            <div style="text-align: center;margin-top: 16px;">
                <button class="ui large blue button">Update</button>
            </div>

        </form>


        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>

    </div>

    <script>
        $(".ui.dropdown").dropdown();

        $('.ui.form')
            .form({
                fields: {
                    patientName     : 'empty',
                    fileNumber   : 'empty',
                    doctorName : 'empty',
                    phone : 'empty',
                    age   : 'empty',
                    gender    : 'empty' ,
                    address    : 'empty' ,
                    work    : 'empty' ,
                    sd    : 'empty' ,
                    status    : 'empty' ,
                    diagnose    : 'empty' ,
                    diagnoseMethod    : 'empty' ,
                    diseaseType    : 'empty' ,
                    diseaseReason    : 'empty' ,
                    //liverBioposy    : 'empty' ,
                    //fibroscan    : 'empty' ,
                    dm    : 'empty' ,
                    crf    : 'empty' ,
                    personalId    : 'empty' ,
                    hospital    : 'empty'

                }
            });

        $(document).ready(function()
        {
            $("input[name='patientName']").val('{{$patient->Name}}');
            $("input[name='fileNumber']").val('{{$patient->FileNumber}}');
            $("input[name='phone']").val('{{$patient->Phone}}');
            $("input[name='age']").val('{{$patient->Age}}');
            $("#doctorsDropdown").dropdown("set selected" , '{{$patient->DoctorName}}');
            $("#genderDropdown").dropdown("set selected" , '{{$patient->Gender}}');
            $("#addressDropdown").dropdown("set selected" , '{{$patient->Address}}');
            $("#workDropdown").dropdown("set selected" , '{{$patient->Work}}');
            $("#sdDropdown").dropdown("set selected" , '{{$patient->SD}}');
            $("#statusDropdown").dropdown("set selected" , '{{$patient->Status}}');
            $("#diagnoseMethodDropdown").dropdown("set selected" , '{{$patient->DiagnoseMethod}}');
            $("#diseaseReasonDropdown").dropdown("set selected" , '{{$patient->DiseaseReason}}');
            $("#liverBiopsyDropdown").dropdown("set selected" , '{{$patient->LiverBioposy}}');
            $("#fibroscanDropdown").dropdown("set selected" , '{{$patient->Fibroscan}}');
            $("#diagnoseDropdown").dropdown("set selected" , '{{$patient->Diagnose}}');
            $("#dmDropdown").dropdown("set selected" , '{{$patient->DM}}');
            $("#crfDropdown").dropdown("set selected" , '{{$patient->CRF}}');
            $("input[name='hospital']").val('{{$patient->HospitalName}}');
            $("input[name='personalId']").val('{{$patient->PersonalID}}');
            $("input[name='diseaseType']").val('{{$patient->DiseaseType}}');

        });

    </script>

@endsection