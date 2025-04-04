<?php

namespace App\Livewire;

use App\Models\CalendarItem;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Omnia\LivewireCalendar\LivewireCalendar;


class WorkoutCalendar extends LivewireCalendar
{

    public function events(): Collection
    {
        return CalendarItem::query()
            ->whereDate('scheduled_at', '>=', $this->gridStartsAt)
            ->whereDate('scheduled_at', '<=', $this->gridEndsAt)
            ->where('user_id',Auth::user()->id)
            ->get()
            ->map(function (CalendarItem $item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'description' => $item->notes,
                    'date' => $item->scheduled_at,
                ];
            });
    }

    public function onEventClick($eventId)
    {
        $event = CalendarItem::query()->where('id',$eventId)->first();
        $workout = $event->workout()->first();
//        dd($workout->id);
        return redirect()->route('workouts.show',['uuid'=>$workout->uuid]);
    }
    public function deleteEvent($eventId) {
        CalendarItem::query()->where('id',$eventId)->delete();
        $this->render();
    }
    public function onEventDropped($eventId, $year, $month, $day)
    {
        $event = CalendarItem::query()->where('id',$eventId)->first();
        $oldDate = Carbon::create($event->scheduled_at);
        $newDate=$oldDate->setDate($year,$month,$day);
        $event->scheduled_at = $newDate;
        $event->save();
        $this->render();
    }
}
