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



        <?php
        $male = 0;
        $female = 0;
        ?>

        @foreach($patients as $row)

            <?php
            if (strcmp($row->Gender , "ذكر") == 0)
                $male++;
            else if (strcmp($row->Gender , "انثى") == 0)
                $female++;
            ?>

        @endforeach

        <?php
        if (count($patients) > 0)
        {
            $maleRate = ($male / count($patients)) * 100;
            $femaleRate = ($female / count($patients)) * 100;
        }
        else
        {
            $maleRate = 0;
            $femaleRate = 0;
        }
        ?>
            <div class="ui hidden divider"></div>

        <table class="ui celled compact collapsing green table">
            <thead>
            <tr>
                <th colspan="2">الاحصائات</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 120px;">Total Count</td>
                @if(count($patients)>20)
                    <td style="min-width: 99px;text-align: center;"> + {{count($patients)-1}}</td>
                    @else
                    <td style="min-width: 99px;text-align: center;"> {{count($patients)}}</td>
                    @endif

            </tr>

            <tr>
                <td style="width: 120px;">Female</td>
                <td style="min-width: 70px;text-align: center;">{{$female}}</td>
            </tr>

            <tr>
                <td style="width: 120px;">Male</td>
                <td style="min-width: 70px;text-align: center;">{{$male}}</td>
            </tr>

            <tr>
                <td style="width: 120px;">Male Rate</td>
                <td style="min-width: 70px;text-align: center;">% {{sprintf('%0.1f', $maleRate)}}</td>
            </tr>

            <tr>
                <td style="width: 120px;">Female Rate</td>
                <td style="min-width: 70px;text-align: center;">% {{sprintf('%0.1f', $femaleRate)}}</td>
            </tr>

            </tbody>
        </table>


        <div class="ui hidden divider"></div>

        <form action="/patient/search" method="post" class="ui form">

            <div class="inline field">
                <input name="search" type="text" placeholder="Part of the name">
                <button class="ui green icon button"><i class="search icon"></i></button>
            </div>

        </form>

        <table class="ui stripped celled table">

            <thead>
                <tr>

                    <th>العملية</th>
                    <th>رقم الفايل</th>

                    <th>الهاتف</th>

                    <th>العمر</th>


                    <th>الجنس</th>

                    <th>الاسم</th>

                </tr>
            </thead>

            <tbody>

            @foreach($patients as $patient)
                <tr>



                    <td style="text-align: left;">
                        <a class="ui  button" href="/patient/update/{{$patient["ID"]}}"> <i class=" green edit icon"></i>تعديل</a>
                        <a class="ui  button" href="/patient/delete/{{$patient["ID"]}}"> <i class="red Remove User icon"></i>مسح</a>
                    </td>
                    <td>{{$patient["FileNumber"]}}</td>
                    <td>{{$patient["Phone"]}}</td>

                    <td>{{$patient["Age"]}}</td>


                    <td>{{$patient["Gender"]}}</td>
                    <td> <a  style="text-align: right  ; font-weight: bold " href="/patient/{{$patient["ID"]}}">
                            {{$patient["Name"]}}
                        </a></td>

                </tr>
            @endforeach

            </tbody>

        </table>

        <div class="ui hidden divider"></div>

    </div>

@endsection