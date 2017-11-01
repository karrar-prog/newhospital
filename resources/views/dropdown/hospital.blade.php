<div class="field">
    <label> HospitalName : </label>
    <div id="hospitalDropdown" class="ui search selection dropdown">
        <input type="hidden" name="hospital">
        <i class="dropdown icon"></i>
        <div class="default text">HospitalName</div>
        <div class="menu">
            @foreach($hospital_names as $hospital_name)
                @if(!empty($hospital_name["HospitalName"]) /*&& $hospital_name != null && strcmp(trim($hospital_name) , "") != 0*/)
                    <div class="item" name="hospital" data-value="{{$hospital_name["HospitalName"]}}">{{$hospital_name["HospitalName"]}}</div>
                @endif
            @endforeach
        </div>
    </div>

</div>



<script>
    $("#hospitalDropdown").on('keydown' , function(e)
    {
        if(e.keyCode === 27)
        {
            $(this).dropdown('clear');
        }
    });
</script>

