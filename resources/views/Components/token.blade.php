<div>
    
    <form action="{{route($destinationRoute)}}" method="POST">

        @csrf
        @method($destinationMethod)

        <div class="d-flex flex-wrap justify-content-center">
                            
            @foreach(str_split($token, 1) as $position => $digit)
                <input type="text" id="d_{{$position}}" name="d_{{$position}}" class='input-activation-token @error("d_{$position}") has-error @enderror' value='{{old("d_{$position}")}}' maxlength="1" @error("d_{$position}") autofocus @enderror>
            @endforeach
                        
        </div>

        <div class="mt-3 text-center">

            <input type="submit" value="Ready" title="Ready" id="btnReady" class="btn btn-outline-primary">
        
        </div>

    </form>

</div>
