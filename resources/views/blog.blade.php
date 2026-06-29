
<x-layout :title="$title">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <x-category :categories="$categories" />
            <div class="grid gap-8 mt-3 mb-3 lg:grid-cols-3 md:grid-cols-2">
                @forelse ($posts as $post)
                    <article
                        class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex justify-between items-center mb-5 text-gray-600">
                            <span
                                class="{{ $post->category->color }} text-primary-900 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                {{ $post->category->category_name }}
                            </span>
                            <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a
                                href="/blog/{{ $post['slug'] }}">{{ $post->title }}</a></h2>
                        <div class="mb-5 font-light text-gray-500 dark:text-gray-400">{!! Str::limit($post->content, 150) !!}
                        </div>
                        <div>
                            <div class="flex items-center space-x-4">
                                <img class="w-7 h-7 rounded-full"
                                    src="{{ $post->author->avatar ? asset('storage/' . $post->author->avatar) : '/img/avatar-default.png' }}"
                                    alt="Jese Leos avatar" />
                                <a href="/blog?author={{ $post->author->username }}">

                                    <span class="font-medium dark:text-white">
                                        {{ $post->author->name }}
                                    </span>
                                </a>
                            </div>
                            <a href="/blog/{{ $post->slug }}"
                                class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline mt-5 text-blue-500">
                                Read more
                                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full mx-auto mt-10">
                        <p class="font-semibold text-xl">Article not found</p>
                    </div>
                @endforelse
            </div>
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>
