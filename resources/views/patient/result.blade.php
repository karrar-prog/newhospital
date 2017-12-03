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

        <?php
        $male = 0;
        $female = 0;
        ?>
        @foreach($result as $row)

            <?php
            if (strcmp($row->Gender , "ذكر") == 0)
                $male++;
            else if (strcmp($row->Gender , "انثى") == 0)
                $female++;
            ?>

        @endforeach

        <?php
        if (count($result) > 0)
            {
                $maleRate = ($male / count($result)) * 100;
                $femaleRate = ($female / count($result)) * 100;
            }
            else
            {
                $maleRate = 0;
                $femaleRate = 0;
            }
        ?>

        <table class="ui celled compact collapsing blue table">
            <thead>
            <tr>
                <th colspan="2">Statistics</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td style="width: 120px;">Total Count</td>
                <td style="min-width: 70px;text-align: center;">{{count($result)}}</td>
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

        <table class="ui stripped celled table">

            <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
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

                <?php
                        if (strcmp($row->Gender , "ذكر") == 0)
                            $male++;
                        else if (strcmp($row->Gender , "انثى") == 0)
                            $female++;
                ?>


                <tr>
                    <td><a style="font-weight: bold" href="/patient/{{$row->ID}}">{{$row->Name}}</a></td>
                    <td>{{$row->Address}}</td>


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

        <div class="ui hidden divider"></div>




    </div>

@endsection