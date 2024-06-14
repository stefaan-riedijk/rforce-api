<div
    @if($pollMillis !== null && $pollAction !== null)
        wire:poll.{{ $pollMillis }}ms="{{ $pollAction }}"
    @elseif($pollMillis !== null)
        wire:poll.{{ $pollMillis }}ms
    @endif
>
    <div>
        @includeIf($beforeCalendarView)
    </div>

    <div class="flex my-4">
        <div class="flex flex-1">
            <x-wui-button class="mr-auto" icon="arrow-left" wire:click="goToPreviousMonth"></x-wui-button>
        </div>
        <div class="flex flex-1">
            <x-wui-button class="mx-auto" wire:click="goToCurrentMonth">Current month</x-wui-button>
        </div>
        <div class="flex flex-1">
            <x-wui-button class="ml-auto" icon="arrow-right" wire:click="goToNextMonth"></x-wui-button>
        </div>
    </div>
    <div class="flex overflow-x-auto w-full">
        <div class="flex mx-auto">
            <div class="inline-block min-w-full overflow-hidden">
                <div class="w-full flex flex-row">
                    @foreach($monthGrid->first() as $day)
                        @include($dayOfWeekView, ['day' => $day])
                    @endforeach
                </div>

                @foreach($monthGrid as $week)
                    <div class="w-full flex flex-row">
                        @foreach($week as $day)
                            @include($dayView, [
                                    'componentId' => $componentId,
                                    'day' => $day,
                                    'dayInMonth' => $day->isSameMonth($startsAt),
                                    'isToday' => $day->isToday(),
                                    'events' => $getEventsForDay($day, $events),
                                ])
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div>
        @includeIf($afterCalendarView)
    </div>
</div>
