@extends("comman.layout")

@section("title")
    PatientReport
@endsection

@section("content")

    <div class="ui container">
        <div class="ui hidden divider"></div>
        <div class="ui blue inverted segment">
            <div class="ui center aligned large header">
                Simple Patient Report
            </div>
        </div>
        <form class="ui center aligned form" method="post" action="/patient/simple-report">

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
                        <label> Scientific Degree : </label>
                        <div class="ui selection dropdown">
                            <input type="hidden" name="sd">
                            <i class="dropdown icon"></i>
                            <div class="default text">Scientific Degree</div>
                            <div class="menu">
                                <div class="item" data-value="male">لايوجد</div>
                                <div class="item" data-value="female">ابتدائي</div>
                                <div class="item" data-value="female">متوسط</div>
                                <div class="item" data-value="female">اعدادي</div>
                                <div class="item" data-value="female">بكلوريوس</div>
                                <div class="item" data-value="female">شهادات عليا</div>
                            </div>
                        </div>
                    </div>


                    <div class="field">
                        <label> Address : </label>
                        <div class="ui selection dropdown">
                            <input type="hidden" name="address">
                            <i class="dropdown icon"></i>
                            <div class="default text">Address</div>
                            <div class="menu">
                                <div class="item" data-value="النجف">النجف</div>
                                <div class="item" data-value="السماوة">السماوة</div>
                                <div class="item" data-value="بابل">بابل</div>
                                <div class="item" data-value="الديوانية">الديوانية</div>
                                <div class="item" data-value="البصرة">البصرة</div>
                                <div class="item" data-value="بغداد">بغداد</div>
                                <div class="item" data-value="واسط">واسط</div>
                                <div class="item" data-value="نينوى">نينوى</div>
                                <div class="item" data-value="كربلاء">كربلاء</div>
                                <div class="item" data-value="كركوك">كركوك</div>
                                <div class="item" data-value="صلاح الدين">صلاح الدين</div>
                                <div class="item" data-value="دهوك">دهوك</div>
                                <div class="item" data-value="اربيل">اربيل</div>
                                <div class="item" data-value="السليمانية">السليمانية</div>
                                <div class="item" data-value="الانبار">الانبار</div>
                                <div class="item" data-value="ميسان">ميسان</div>
                                <div class="item" data-value="الناصرية">الناصرية</div>
                                <div class="item" data-value="ديالى">ديالى</div>
                                <div class="item" data-value="اخرى">اخرى</div>
                                <div class="item" data-value="لايوجد">لايوجد</div>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label> Work : </label>
                        <div class="ui selection dropdown">
                            <input type="hidden" name="work">
                            <i class="dropdown icon"></i>
                            <div class="default text">Work</div>
                            <div class="menu">
                                <div class="item" data-value="male">عاجز</div>
                                <div class="item" data-value="female">عاطل عن العمل</div>
                                <div class="item" data-value="female">طفل</div>
                                <div class="item" data-value="female">كاسب</div>
                                <div class="item" data-value="female">ربة بيت</div>
                                <div class="item" data-value="female">طالب \ طالبة</div>
                                <div class="item" data-value="female">موظف \ موظفة</div>
                                <div class="item" data-value="female">نازح</div>
                                <div class="item" data-value="female">متقاعد</div>
                                <div class="item" data-value="female">لايوجد</div>
                            </div>
                        </div>
                    </div>


                    <div class="field">
                        <label> Status : </label>
                        <div class="ui selection dropdown">
                            <input type="hidden" name="status">
                            <i class="dropdown icon"></i>
                            <div class="default text">Status</div>
                            <div class="menu">
                                <div class="item" data-value="male">على العلاج</div>
                                <div class="item" data-value="female">تشمع الكبد</div>
                                <div class="item" data-value="female">اكمل العلاج</div>
                                <div class="item" data-value="female">شفاء</div>
                                <div class="item" data-value="female">Cancer</div>
                                <div class="item" data-value="female">اعادة الاصابة</div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="eight wide column">

                    <div class="field">
                        <label> D.M : </label>
                        <div class="ui selection dropdown">
                            <input type="hidden" name="dm">
                            <i class="dropdown icon"></i>
                            <div class="default text">D.M</div>
                            <div class="menu">
                                <div class="item" data-value="male">Positive(+ve)</div>
                                <div class="item" data-value="female">Nagative(-ve)</div>
                            </div>
                        </div>
                    </div>


                    <div class="field">
                        <label> CRF : </label>
                        <div class="ui selection dropdown">
                            <input type="hidden" name="crf">
                            <i class="dropdown icon"></i>
                            <div class="default text">CRF</div>
                            <div class="menu">
                                <div class="item" data-value="male">No</div>
                                <div class="item" data-value="female">Follow up</div>
                                <div class="item" data-value="female">H.D</div>
                                <div class="item" data-value="female">P.D</div>
                                <div class="item" data-value="female">Transplant</div>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label>Diagnose</label>
                        <input name="diagnose" type="text">
                    </div>

                    <div class="field">
                        <label>Way Of Diagnoses</label>
                        <input name="diagnoseMethod" type="text">
                    </div>

                    <div class="field">
                        <label>Disease Type</label>
                        <input name="diseaseType" type="text">
                    </div>


                    <div class="field">
                        <label> Disease Reason : </label>
                        <div class="ui selection dropdown">
                            <input type="hidden" name="diseaseReason">
                            <i class="dropdown icon"></i>
                            <div class="default text">Disease Reason</div>
                            <div class="menu">
                                <div class="item" data-value="male">امراض الكلى</div>
                                <div class="item" data-value="female">اسباب غير معروفة</div>
                                <div class="item" data-value="female">اخرى</div>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label>Fibroscan</label>
                        <input name="fibroscan" type="text">
                    </div>

                    <div class="field">
                        <label>Liver-Biopsy</label>
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

    <script>
        $(".ui.dropdown").dropdown();
    </script>


@endsection