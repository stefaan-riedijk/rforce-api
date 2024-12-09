<x-marketing-layout>
    <div class="">
        <div class="mt-4 ml-3">
            <x-wui-button icon="arrow-left" href="{{ route('blog')}}"/>
        </div>
{{--        {{dd($article->getSystemProperties()->getCreatedAt())}}--}}
        <h1 class="pt-8 text-center text-3xl font-semibold text-black">
            {{$article->postTitle}}
        </h1>
        <p class="text-right mr-4">Created at: {{Carbon\Carbon::parse($article->getSystemProperties()->getCreatedAt() )}}</p>
        <p class="text-right mr-4">Written by: {{$article->postAuthor->authorName}}</p>
        <div class="mx-4 mt-4 mb-4">
            {!!\GrahamCampbell\Markdown\Facades\Markdown::convert($article->body)!!}
        </div>
    </div>
</x-marketing-layout>
