
@extends('layouts.app')

@section('title', 'Show Paritcular Events')

@section('heading', 'Event Details')

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Event Date</th>
                <th scope="col">Week Day</th>
            </tr>
        </thead>
        <tbody>

            @foreach($recurrance as $key => $time)
                <tr >
                    <td> {{ $key + 1}} </td>
                    <td> {{ $time['date'] }} </td>
                    <td> {{ $time['day'] }} </td>

                </tr>
            @endforeach

        </tbody>

    </table>
    Total Recurrence Event: {!! $recurrance->count() !!}

@endsection
