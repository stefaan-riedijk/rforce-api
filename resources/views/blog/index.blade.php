<x-guest-layout>
    <div>
        <p>Maccie</p>
        @foreach($articles as $article)
            <div class="flex gap-3 justify-between flex-row">
                <x-card>
                    {{ $article->postSlug }}
                </x-card>
            </div>
        @endforeach
    </div>
</x-guest-layout>
