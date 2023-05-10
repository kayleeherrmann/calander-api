<?php

namespace App\Http\Controllers;

use App\Models\CalendarEntry;
use App\Http\Requests\StoreCalendarEntryRequest;
use App\Http\Requests\UpdateCalendarEntryRequest;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CalendarEntryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->success([
            'calenderEntries' =>
            CalendarEntry::orderBy('start')->with('tasks')->with('category')->get(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCalendarEntryRequest $request)
    {
        $calendarEntry = CalendarEntry::create([
            'user_id' => auth()->user()->id,
            ...$request->validated()
        ]);

        return $this->success([
            'calenderEntry'
            => $calendarEntry->load('tasks')->load('category'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCalendarEntryRequest $request, CalendarEntry $calendarEntry)
    {

        $calendarEntry->update([
            ...$request->validated()
        ]);

        return $this->success([
            'calenderEntries' =>
            CalendarEntry::orderBy('start')->get(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CalendarEntry $calendarEntry)
    {
        $calendarEntry->delete();

        return $this->success([], null, 204);
    }
}
