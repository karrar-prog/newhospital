@extends("comman.layout")

@section("title")
    Add Patient
@endsection

@section("content")

    <div class="ui container">

        <div class="ui hidden divider"></div>

        <div class="ui green segment">
            <div class="ui center aligned small header">
                اضافة مريض
                <div class="ui hidden divider"></div>

                @if(\Illuminate\Support\Facades\Session::has("success"))
                    @if(\Illuminate\Support\Facades\Session::get("success"))
                        <div class="ui green inverted segment">
                            <div class="ui large left aligned success header">
                                Patient Had Been Added.
                            </div>
                        </div>
                    @else
                        <div class="ui red inverted segment">
                            <div class="ui large left aligned header">
                                Patient Didn't Added! , Check If Patient Is Already Exist.
                            </div>
                        </div>
                    @endif
                @endif


                <form class="ui center aligned form" method="post" action="/patient/add-new">


                        <div class="ui stackable left aligned grid">

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
                                    <label>Phone</label>
                                    <input name="phone" type="text">
                                </div>

                                <div class="field">
                                    <label>Age</label>
                                    <input name="age" type="text">
                                </div>

                                @include("dropdown.gender")

                                @include("dropdown.work")

                                @include("dropdown.sd")


                            </div>

                            <div class="eight wide column">

                                @include("dropdown.diagnose_method")

                                @include("dropdown.disease_reason")

                                @include("dropdown.liver_biopsy")

                                @include("dropdown.fibroscan")

                                @include("dropdown.dm")

                                @include("dropdown.crf")

                                @include("dropdown.address")


                            </div>


                        </div>

                    <div class="ui divider"></div>
                    @include("dropdown.status")
                    <div hidden class="ui  teal blue inverted segment">

                        <div class="ui grid">
                            <div class="eight wide column">


                                <div class="field">

                                    <input hidden name="firstPCR" type="number">
                                </div>

                                <div class="field">

                                    <input hidden name="firstTreatment1" type="text">
                                </div>

                                <div class="field">

                                    <input hidden name="firstTreatment2" type="text">
                                </div>

                                <div class="field">

                                    <input hidden name="firstDate" type="date">
                                </div>

                            </div>

                            <div class="eight wide column">


                                <div class="field">

                                    <input hidden name="lastPCR" type="number">
                                </div>

                                <div class="field">

                                    <input hidden name="lastTreatment1" type="text">
                                </div>

                                <div class="field">

                                    <input hidden name="lastTreatment2" type="text">
                                </div>

                                <div class="field">

                                    <input hidden name="lastDate" type="date">
                                </div>

                            </div>


                        </div>
                    </div>
                    <div style="text-align: center;margin-top: 16px;">
                        <button class="ui large green button">Add</button>
                    </div>


                </form>


            </div>
        </div>


        <div class="ui hidden divider"></div>
        <div class="ui hidden divider"></div>

    </div>

    <script>
        $(".ui.dropdown").dropdown();

        $('.ui.form')
            .form({
                fields: {
                    patientName: 'empty',
                    fileNumber: 'empty',

                    phone: 'empty',
                    age: 'empty',
                    gender: 'empty',
                    address: 'empty',
                    work: 'empty',
                    sd: 'empty',
                    status: 'empty',

                    diagnoseMethod: 'empty',

                    diseaseReason: 'empty',
                    //liverBioposy    : 'empty' ,
                    //fibroscan    : 'empty' ,
                    dm: 'empty',
                    crf: 'empty',
                    personalId: 'empty',
                    hospital: 'empty'

                }
            });

    </script>

@endsection