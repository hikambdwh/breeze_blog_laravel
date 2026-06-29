@props(['post' => false, 'categories' => false])

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
@endpush
<div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
    <!-- Modal header -->
    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Article</h3>
    </div>
    <!-- Modal body -->
    <form action="/dashboard/{{ $post->slug }}" method="POST" id="form-post">
        @csrf
        @method('PATCH')
        <div class="mb-4">
            <div class="mb-4">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" name="title" id="title"
                    class="@error('title') bg-red-50 text-red-700 focus:ring-red-600 focus:border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Type article title" autofocus value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="text-xs text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="category"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                <select id="category" name="category_id"
                    class="@error('category_id') bg-red-50 text-red-700 focus:ring-red-600 focus:border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option selected="" value="">Select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }} " @selected((old('category_id', $post->category->id)) == $category->id)>{{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="text-xs text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="sm:col-span-2"><label for="content"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Article Content</label>
                <textarea id="content" rows="4" name="content"
                    class="hidden @error('content') bg-red-50 text-red-700 focus:ring-red-600 focus:border-red-500 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Write product content here">{{ old('content', $post->content)}}</textarea>
                    <div id="editor">{!! old('content', $post->content)!!}</div>
                @error('content')
                    <div class="text-xs text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="flex gap-4">
            <button type="submit"
                class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 cursor-pointer">
                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewbox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Update Article
            </button>
            <a href="/dashboard" class="bg-red-600 px-5 py-2.5 text-white rounded  hover:bg-red-700">Cancel</a>
        </div>
    </form>
</div>

@push('scripts')
    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });

        const postForm = document.querySelector('#post-form');
        const postContent = document.querySelector('#content');
        const quillContent = document.querySelector('#editor');
        
        postForm.addEventListener('submit', function(e) {
            e.preventDefault()
            const content = quillContent.children[0].innerHTML;

            console.log(content)
            postContent.value = content;
            this.submit()
        })
    </script>
@endpush
