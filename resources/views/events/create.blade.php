@extends('layouts.app')

@section('title', 'Add Event')

@section('heading', 'Add Event')

@section('content')
    <form action="{{ route('events.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="event-title">Event Title</label>
            <input type="text" name="event_title" id="event-title" class="form-control" value="{{ old('event_title') ? old('event_title') : '' }}" required>
            @error('event_title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="event-start-date">Event Start Date</label>
            <input type="date" name="start_date" id="event-start-date"" class="form-control" placeholder="dd-mm-yyyy" value="{{ old('start_date') ? old('start_date') : '' }}" required>
            @error('start_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="event-end-date">Event End Date</label>
            <input type="date" name="end_date" id="event-end-date" class="form-control" placeholder="dd-mm-yyyy" value="{{ old('end_date') ? old('end_date') : '' }}" required>
            @error('end_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="event-title">Recurrance - Repeat On</label>
            <div class="row">

                    <div class="col-md-4">
                        <select name="week_number" class="form-control" required>
                            <option value="first">first</option>
                            <option value="second">second</option>
                            <option value="third">third</option>
                            <option value="fourth">fourth</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="week_day" class="form-control" required>
                            <option value="sunday">sunday</option>
                            <option value="monday">monday</option>
                            <option value="tuesday">tuesday</option>
                            <option value="wednesday">wednesday</option>
                            <option value="thursday">thursday</option>
                            <option value="friday">friday</option>
                            <option value="saturday">saturday</option>


                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="month_duration"  class="form-control" required>
                            <option value="3">3 months</option>
                            <option value="4">4 months</option>
                            <option value="6">6 months</option>
                            <option value="12">year</option>
                        </select>
                    </div>

            </div>
        </div>
        <input type="submit" value="submit" class="btn btn-primary">
    </form>
@endsection
@section('js')
<script>
    $("form").validate();
</script>
@endsection
