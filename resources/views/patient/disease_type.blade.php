<div class="sixteen wide column">
    <div class="field disabled">
        <label>Disease Type</label>
        <input id="diseaseType" name="diseaseType" type="text">
    </div>
</div>

<div id="hbv" class="eight wide column">

    <div class="field">
        <label>HBV</label>
        <div class="field">
            <div class="ui radio checkbox">
                <input id="option1" type="radio" value="HBeAg (-ve)" name="hbv">
                <label for="option1">HBeAg (-ve)</label>
            </div>
        </div>
        <div class="field">
            <div class="ui radio checkbox">
                <input id="option2" type="radio" value="HBeAg (+ve)" name="hbv">
                <label for="option2">HBeAg (+ve)</label>
            </div>
        </div>
        <div class="field">
            <div class="ui radio checkbox">
                <input id="option3" type="radio" value="HBeAb (-ve)" name="hbv">
                <label for="option3">HBeAb (-ve)</label>
            </div>
        </div>
        <div class="field">
            <div class="ui radio checkbox">
                <input id="option4" type="radio"  value="HBeAb (+ve)" name="hbv">
                <label for="option4">HBeAb (+ve)</label>
            </div>
        </div>
    </div>

</div>

<div id="hcv" class="eight wide column">
    <div class="field">
        <label>HCV</label>
        <div class="field">
            <div class="ui radio checkbox">
                <input id="option5" type="radio" value="genotype1" name="hcv">
                <label for="option5">genotype1</label>
            </div>
        </div>

        <div class="field">
            <div class="ui radio checkbox">
                <input id="option6" type="radio" value="genotype2"  name="hcv">
                <label for="option6">genotype2</label>
            </div>
        </div>

        <div class="field">
            <div class="ui radio checkbox">
                <input id="option7" type="radio" value="genotype3"  name="hcv">
                <label for="option7">genotype3</label>
            </div>
        </div>

        <div class="field">
            <div class="ui radio checkbox">
                <input id="option8" type="radio"  value="genotype4" name="hcv">
                <label for="option8">genotype4</label>
            </div>
        </div>

        <div class="field">
            <div class="ui radio checkbox">
                <input id="option9" type="radio" value="genotype5" name="hcv">
                <label for="option9">genotype5</label>
            </div>
        </div>

        <div class="field">
            <div class="ui radio checkbox">
                <input id="option10" type="radio"  value="genotype6" name="hcv">
                <label for="option10">genotype6</label>
            </div>
        </div>

    </div>
</div>


<script>

    $(document).ready(function()
    {
        $("#hbv").find(".ui.radio.checkbox").addClass("disabled");
        $("#hcv").find(".ui.radio.checkbox").addClass("disabled");
    });

    var both = false;
    $('#diagnose').change(function (event)
    {
        var diagnose = $(this).val();

        $("#diseaseType").val("");
        hbvSelectedValue = "";
        hcvSelectedValue = "";

        $(".ui.checkbox").checkbox("uncheck");

        both = false;

        switch(diagnose)
        {
            case "HBV" :
                disableHCV();
                break;
            case "HCV":
                disableHBV();
                break;
            case "Both" :
                enableBoth();
                both = true;
                break;
        }
    });

    function disableHBV()
    {
        $("#hbv").find(".ui.radio.checkbox").addClass("disabled");
        $("#hcv").find(".ui.radio.checkbox").removeClass("disabled");
    }

    function disableHCV()
    {
        $("#hcv").find(".ui.radio.checkbox").addClass("disabled");
        $("#hbv").find(".ui.radio.checkbox").removeClass("disabled");
    }

    function enableBoth()
    {
        $("#hcv").find(".ui.radio.checkbox").removeClass("disabled");
        $("#hbv").find(".ui.radio.checkbox").removeClass("disabled")
    }

    var hbvSelectedValue = "";
    $("#hbv").find(".ui.checkbox").checkbox({
        onChecked : function ()
        {
            hbvSelectedValue = $(this).val();
            collectDiseaseTypeValue();
        }
    });

    var hcvSelectedValue = "";
    $("#hcv").find(".ui.checkbox").checkbox({
        onChecked : function ()
        {
            hcvSelectedValue = $(this).val();
            collectDiseaseTypeValue();
        }
    });

    function collectDiseaseTypeValue()
    {
        var value = hbvSelectedValue + (both?" , ":"")+ hcvSelectedValue;
        $("#diseaseType").val(value);
    }


</script>