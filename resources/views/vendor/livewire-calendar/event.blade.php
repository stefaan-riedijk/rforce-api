<div

    class="bg-white rounded-lg border py-2 px-3 shadow-md cursor-pointer relative">
    <x-wui-button wire:click="deleteEvent('{{ $event['id'] }}')" flat zinc sm rounded class="absolute right-0 top-0"><x-icon class="w-4 h-4" name="trash" solid/></x-wui-button>
    <div
        @if($eventClickEnabled)
            wire:click.stop="onEventClick('{{ $event['id']  }}')"
        @endif
    >
    <p class="text-sm font-medium">
        {{ ucfirst($event['title']) }}
    </p>
    <p class="mt-2 text-xs">
        {{ $event['description'] ?? 'No description' }}
    </p>
    </div>
</div>
