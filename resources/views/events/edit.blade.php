@extends('layouts.app')

@section('title', 'Edit Event')

@section('heading', 'Edit Event')

@section('content')
    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="event-title">Event Title</label>
            <input type="text" name="event_title" id="event-title" class="form-control" value="{{ old('event_title') ? old('event_title') : $event['event_title'] }}" required>
            @error('event_title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="event-start-date">Event Start Date</label>
            <input type="date" name="start_date" id="event-start-date"" class="form-control" placeholder="dd-mm-yyyy" value="{{ old('start_date') ? old('start_date') : $event['start_date'] }}" required>
            @error('start_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="event-end-date">Event End Date</label>
            <input type="date" name="end_date" id="event-end-date" class="form-control" placeholder="dd-mm-yyyy" value="{{ old('end_date') ? old('end_date') : $event['end_date'] }}" required>
            @error('end_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="event-title">Recurrance - Repeat On</label>
            <div class="row">

                    <div class="col-md-4">
                        <select name="week_number" class="form-control" required>
                            <option value="first" {{ old('week_number') ? (old('week_number') == 'first' ? 'selected' : '') : ($event['week_number'] == 'first' ? 'selected' : '') }}>first</option>
                            <option value="second" {{ old('week_number') ? (old('week_number') == 'second' ? 'selected' : '') : ($event['week_number'] == 'second' ? 'selected' : '') }}>second</option>
                            <option value="third" {{ old('week_number') ? (old('week_number') == 'third' ? 'selected' : '') : ($event['week_number'] == 'third' ? 'selected' : '') }}>third</option>
                            <option value="fourth" {{ old('week_number') ? (old('week_number') == 'fourth' ? 'selected' : '') : ($event['week_number'] == 'fourth' ? 'selected' : '') }}>fourth</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="week_day" class="form-control" required>
                            <option value="sunday" {{ old('week_day') ? (old('week_day') == 'sunday' ? 'selected' : '') : ($event['week_day'] == 'sunday' ? 'selected' : '') }}>sunday</option>
                            <option value="monday" {{ old('week_day') ? (old('week_day') == 'monday' ? 'selected' : '') : ($event['week_day'] == 'monday' ? 'selected' : '') }}>monday</option>
                            <option value="tuesday" {{ old('week_day') ? (old('week_day') == 'tuesday' ? 'selected' : '') : ($event['week_day'] == 'tuesday' ? 'selected' : '') }}>tuesday</option>
                            <option value="wednesday" {{ old('week_day') ? (old('week_day') == 'wednesday' ? 'selected' : '') : ($event['week_day'] == 'wednesday' ? 'selected' : '') }}>wednesday</option>
                            <option value="thursday" {{ old('week_day') ? (old('week_day') == 'thursday' ? 'selected' : '') : ($event['week_day'] == 'thursday' ? 'selected' : '') }}>thursday</option>
                            <option value="friday" {{ old('week_day') ? (old('week_day') == 'friday' ? 'selected' : '') : ($event['week_day'] == 'friday' ? 'selected' : '') }}>friday</option>
                            <option value="saturday" {{ old('week_day') ? (old('week_day') == 'saturday' ? 'selected' : '') : ($event['week_day'] == 'saturday' ? 'selected' : '') }}>saturday</option>


                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="month_duration"  class="form-control" required>
                            <option value="3" {{ old('month_duration') ? (old('month_duration') == '3' ? 'selected' : '') : ($event['month_duration'] == '3' ? 'selected' : '') }}>3 months</option>
                            <option value="4" {{ old('month_duration') ? (old('month_duration') == '4' ? 'selected' : '') : ($event['month_duration'] == '4' ? 'selected' : '') }}>4 months</option>
                            <option value="6" {{ old('month_duration') ? (old('month_duration') == '6' ? 'selected' : '') : ($event['month_duration'] == '6' ? 'selected' : '') }}>6 months</option>
                            <option value="12" {{ old('month_duration') ? (old('month_duration') == '12' ? 'selected' : '') : ($event['month_duration'] == '12' ? 'selected' : '') }}>year</option>
                        </select>
                    </div>

            </div>
        </div>
        <input type="submit" value="submit" class="btn btn-primary">
    </form>
@endsection
<script>
    $("form").validate();
</script>
