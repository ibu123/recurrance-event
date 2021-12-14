<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\events\CreateRequest;
use App\Http\Requests\events\UpdateRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(10);
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        try{
            $event = Event::create($request->validated());

            if($event)
                return redirect()->route('events.index')->with('success', 'event created successfully');
        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
                return redirect()->route('events.index')->with('error', 'something went wrong');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        $currentDate = Carbon::now();
        $day = $event->week_day;
        $weekDay = $event->week_number;
        $recurringDuraion = $event->month_duration;
        $initialDate = Carbon::parse($event->start_date);
        $startDate = Carbon::parse($event->start_date);
        $endDate = Carbon::parse($event->end_date);

        $recurrance = array();
        while($currentDate->lessThanOrEqualTo($endDate) && $startDate->lessThanOrEqualTo($endDate) ){

            $recurranceTime = new Carbon($weekDay.' '.$day.' of '.$startDate->englishMonth.' '.$startDate->year.'');
            if($recurranceTime->greaterThanOrEqualTo($initialDate))
                $recurrance[] = ["date" => $recurranceTime->toDateString(), "day" => $recurranceTime->englishDayOfWeek];

            $startDate->addMonths($recurringDuraion);

        }
        $recurrance = collect($recurrance);
        return view('events.show', compact('recurrance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $event = Event::findOrFail($id)->update($request->validated());

            if($event)
                return redirect()->route('events.index')->with('success', 'event updated successfully');
        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
                return redirect()->route('events.index')->with('error', 'something went wrong');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $event = Event::findOrFail($id)->delete();

            if($event)
                return redirect()->route('events.index')->with('success', 'event deleted successfully');
        }
        catch(Exception $e)
        {
            Log::error($e->getMessage());
                return redirect()->route('events.index')->with('error', 'something went wrong');
        }
    }
}
