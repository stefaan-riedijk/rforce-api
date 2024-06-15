<div

    class="bg-amber-100 rounded-lg border border-gray-500 hover:bg-amber-50 py-2 px-3 shadow-md cursor-pointer relative">
    <x-wui-button wire:click="deleteEvent('{{ $event['id'] }}')" flat neutral xs rounded="xl" interaction="negative" class="absolute right-0 top-0"><x-icon class="w-4 h-4" name="trash" solid/></x-wui-button>
    <div
        @if($eventClickEnabled)
            wire:click.stop="onEventClick('{{ $event['id']  }}')"
        @endif
    >
        <p class="text-sm">
            {{ \Carbon\Carbon::create($event['date'])->format('H:i') }}
        </p>
    <p class="text-sm font-medium">
       {{ ucfirst($event['title']) }}
    </p>
    <p class="mt-2 text-xs">
        {{ $event['description'] ?? 'No description' }}
    </p>
    </div>
</div>
