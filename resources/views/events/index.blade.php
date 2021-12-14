@if(!request()->ajax())
@extends(!request()->ajax() ? 'layouts.app' : 'layouts.ajax')

@section('title', 'List Events')

@section('heading', 'List Events')

@section('content')
    <div class="col-md-12 my-2 w-100 text-right">
        <a href="{{ route('events.create') }}" class="btn btn-primary" >Add Events</a>
    </div>
    <table class="table">
        <thead>
            <tr>

                <th scope="col">Event Title</th>
                <th scope="col">Date</th>
                <th scope="col">Occurance</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>
    @endif

            @foreach($events as $key => $event)
            <tr data-url="{{ $events->nextPageUrl() }}">

                <td> {{ $event->event_title }} </td>
                <td> {{ $event->start_date.' to '.$event->end_date }}</td>
                <td> {{ $event->week_number.' '.$event->week_day.' of every '.$event->month_duration.  ' month'}} </td>
                <td>
                    <a href="{{ route('events.edit', $event->id ) }}" class="btn btn-primary"> Edit </a>
                    <a href="{{ route('events.show', $event->id ) }}" class="btn btn-success"> Show </a>
                    <a href="{{ route('events.destroy', $event->id ) }}" class="btn btn-danger"> Delete </a>
                </td>

            </tr>
            @endforeach
    @if(!request()->ajax())
        </tbody>

    </table>
    @if( $events->total() > 0 )
        <a href="javascript:void(0);" class="btn btn-primary" id="show_more">Show More</a>
    @endif
@endsection
@section('js')
<script>



        $(document).on('click', '#show_more', function(){
            if($("tbody tr:last").data("url")) {
                $.ajax({
                    url : $("tbody tr:last").data("url"),
                    success : function(data) {
                        $("tbody").append(data);
                    },
                    error : function(data)
                    {
                        alert("something Went Wrong");
                    }
                });
            }

        })

</script>
@endsection
@endif
