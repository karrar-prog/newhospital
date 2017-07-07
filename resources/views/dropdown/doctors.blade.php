<div class="field">
    <label> Doctors : </label>
    <div id="doctorsDropdown" class="ui search selection dropdown">
        <input type="hidden" name="doctorName">
        <i class="dropdown icon"></i>
        <div class="default text">Doctors</div>
        <div class="menu">
            @foreach($doctors as $doctor)
                @if(!empty($doctor["Name"]) /*&& $doctor != null && strcmp(trim($doctor) , "") != 0*/)
                    <div class="item" data-value="{{$doctor["Name"]}}">{{$doctor["Name"]}}</div>
                @endif
            @endforeach
        </div>
    </div>
</div>