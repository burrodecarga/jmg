@csrf
<div class="grid grid-cols-1 gap-3 md:grid-cols-3">
    <div class="mb-1.5">
        <x-label class="my-2 italic capitalize" value="{{ __('title of book') }}" for="title" />
        <x-input type="text" name="title" class="w-full" placeholder="{{ __('input title of book') }}"
            value="{{ old('title', $book->title) }}" />
        <x-input-error for="title" />
    </div>

    <div class="mb-1.5">
        <x-label class="my-2 italic capitalize" value="{{ __('author of book') }}" for="author" />
        <x-input type="text" name="author" class="w-full" placeholder="{{ __('input author of book') }}"
            value="{{ old('author', $book->author) }}" />
        <x-input-error for="author" />
    </div>

    <div class="mb-1.5">
        <x-label class="my-2 italic capitalize" value="{{ __('isbn of book') }}" for="isbn" />
        <x-input type="text" name="isbn" class="w-full" placeholder="{{ __('input isbn of book') }}"
            value="{{ old('isbn', $book->isbn) }}" />
        <x-input-error for="isbn" />
    </div>

    <div class="mb-1.5">
        <x-label class="my-2 italic capitalize" value="{{ __('course of book') }}" for="course" />
        <select name="course_id" class="w-full text-xs rounded">
            @foreach ($courses as $course)
                <option>
                    {{ $course->name . '->' . $course->grado }}
                </option>
            @endforeach
        </select>
        <x-input-error for="course" />
    </div>

    <div class="mb-1.5">
        <x-label class="my-2 italic capitalize" value="{{ __('category of book') }}" for="category" />
        <select name="category_id" class="w-full text-xs rounded">
            @foreach ($categories as $category)
                <option>
                    {{ $category->name . '->' . $category->grado }}
                </option>
            @endforeach
        </select>
        <x-input-error for="course" />
    </div>

    <div class="mb-1.5">
        <x-label class="my-2 italic capitalize" value="{{ __('level of book') }}" for="level" />
        <select name="level_id" class="w-full text-xs rounded">
            @foreach ($levels as $level)
                <option>
                    {{ $level->name . '->' . $level->grado }}
                </option>
            @endforeach
        </select>
        <x-input-error for="level" />
    </div>

    <div class="mb-1.5">
        <x-label class="my-2 italic capitalize" value="{{ __('editorial  of book') }}" for="editorial " />
        <x-input type="text" name="editorial " class="w-full" placeholder="{{ __('input editorial  of book') }}"
            value="{{ old('editorial ', $book->editorial) }}" />
        <x-input-error for="editorial" />
    </div>

    <div class="flex gap-1">

        <div class="mb-1.5">
            <x-label class="my-2 italic capitalize" value="{{ __('pages of book') }}" for="pages" />
            <x-input type="number" min="1" name="pages" class="w-full text-xs"
                placeholder="{{ __('input pages of book') }}" value="{{ old('pages', $book->pages) }}" />
            <x-input-error for="pages" />
        </div>

        <div class="mb-1.5">
            <x-label class="my-2 italic capitalize" value="{{ __('quantity of book') }}" for="quantity" />
            <x-input type="number" min="1" name="quantity" class="w-full text-xs"
                placeholder="{{ __('input quantity of book') }}" value="{{ old('quantity', $book->quantity) }}" />
            <x-input-error for="quantity" />
        </div>

    </div>
    <div class="mb-1.5 hidden">
        <x-label class="my-2 italic capitalize" value="{{ __('type of book') }}" for="status" />
        <select name="status" class="w-full text-xs rounded">
            <option value="1">Formato pdf</option>
            <option value="2" selected>libro físico</option>
        </select>
        <x-input-error for="status" />
    </div>
</div>

<div class="my-2">
    <button type="submit"
        class="bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        {{ __($btn) }}

    </button>

    <a type="button" href="{{ route('books.index') }}"
        class="bg-yellow-700 text-white hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        {{ __('cancel') }}

    </a>
</div>
