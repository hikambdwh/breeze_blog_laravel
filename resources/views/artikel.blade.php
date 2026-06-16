<x-layout :title="$title">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{-- <article>
            <div class="max-w-3xl p-5 mt-3">
                <h2 class="font-bold text-[19px]">{{ $post['title'] }}</h2>
                <div class="text-gray-500 mb-5">
                    <a href="">{{ $post->author->name }}</a> | 7 Januari 2025
                </div>
                <p class="text-base text-justify mb-5">
                    {{ $post['content'] }}
                </p>
                <a href="/blog" class="text-blue-500 hover:underline">&laquo; Go back</a>
            </div>
        </article> --}}

        <!--
Install the "flowbite-typography" NPM package to apply styles and format the article content:

URL: https://flowbite.com/docs/components/typography/
-->

        <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
            <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
                <article
                    class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                    <a href="/blog" class="text-blue-500 mb-2 text-xs hover:underline">&laquo; Go back</a>
                    <header class="mb-4 lg:mb-6 not-format">
                        <address class="flex items-center mb-6 not-italic">
                            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                <img class="mr-4 w-16 h-16 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="{{ $post->author->name }}">
                                <div>
                                    <a href="/blog?author={{$post->author->username}}" rel="author"
                                        class="text-xl block font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                                    <span
                                        class="{{ $post->category->color }} text-primary-900 text-xs font-medium inline-flex items-center my-1 px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                        {{ $post->category->category_name }}
                                    </span>
                                    <span class="text-sm block">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </address>
                        <h1
                            class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                            {{ $post->title }}</h1>
                    </header>
                    <p>
                        {{ $post->content }}
                    </p>
                </article>
            </div>
        </main>
    </div>
</x-layout>
