<x-marketing-layout>
    <div>
        <div class="mt-4 pt-4">
            <h2 class="text-2xl font-semibold text-black ml-10 mt-5">Latest Posts</h2>
        </div>
        <div class="pt-6 flex gap-3 flex-col mx-3 justify-center max-w-2xl mx-auto">
            @foreach($articles as $article)
                <div class="max-w-2xl">

                    <x-card class="flex-auto">
                        <a href="{{route('blog.article',['slug'=>$article->postSlug])}}">
                            <x-slot name="title">
                                {{ $article->postTitle }}
                            </x-slot>
                            @if($article->body !== null)
                            {!! Str::limit(\GrahamCampbell\Markdown\Facades\Markdown::convert($article->body,200)) !!}
                            @endif
                            <div class="flex flex-row-reverse">
                                <x-wui-button blue href="{{route('blog.article',['slug'=>$article->postSlug])}}"
                                              label="Read article" right-icon="arrow-right"/>
                            </div>
                        </a>
                    </x-card>
                </div>
            @endforeach
        </div>
    </div>
</x-marketing-layout>
