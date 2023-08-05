<div class="form-group mb-5">
    <label for="" class="form-label d-block">Jam ke</label>
        @if ($current_time >='07:45' && $current_time <= '09:20')
            <div class="form-check form-check-inline me-3">
                <input class="form-check-input" type="radio" name="schedule"
                    id="1" value="1">
                <label class="form-check-label" for="1">
                    1 & 2
                </label>
            </div>
        @endif
        
        @if ($current_time >='09:50' && $current_time <= '11:00')
        <div class="form-check form-check-inline me-3">
            <input class="form-check-input" type="radio" name="schedule"
                id="3" value="3">
            <label class="form-check-label" for="3">
                3 & 4
            </label>
        </div>
        @endif
        {{-- @if ($current_time >='10:45' && $current_time <= '12:20')
        <div class="form-check form-check-inline me-3">
            <input class="form-check-input" type="radio" name="schedule"
                id="5" value="5">
            <label class="form-check-label" for="5">
                5 & 6
            </label>
        </div>
        @endif --}}
        {{-- @if ($current_time >='14:00' && $current_time <= '16:00')
            <div class="form-check form-check-inline me-">
                <input class="form-check-input" type="radio" name="schedule"
                    id="7" value="7">
                <label class="form-check-label" for="7">
                    7 & 8
                </label>
            </div>
        @endif --}}
        
        @error('schedule')
        <div class="col-lg-12">
            <small class="text-danger">{{ $message }}</small>
        </div>
        @enderror

</div>