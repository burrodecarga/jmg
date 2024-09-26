<div class="w-full">
    <form wire:submit='addTeacher'>
        <div class="p-6 bg-white lg:p-8">
            <div class="w-full">
                <x-label class="my-2 italic capitalize" value="{{ $lectivo->grado_name . ' ' . $lectivo->letra }}"
                    for="course" />
                <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                    <div class="col-span-1 mb-1">
                        <x-label class="my-2 italic capitalize" value="{{ __('course') }}" for="course" />
                        <x-input readonly class="w-full italic capitalize" value="{{ $lectivo->course_name }}"
                            for="course" />

                        <x-input-error for="course_id" />
                    </div>
                    <div class="col-span-1 mb-1">
                        <x-label class="my-2 italic capitalize" value="{{ __('teacher') }}" for="teacher" />
                        <select name="teacher" id="teacher" class="w-full bg-gray-100 rounded"
                            wire:model="teacher_id">
                            <option value="">{{ __('no teacher') }}</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">
                                    {{ $teacher->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error for="teacher_id" />
                    </div>
                </div>

                <x-button type="submit"
                    class="items-center justify-center w-full px-6 py-4 mx-auto my-6 text-white bg-green-700 rounded">{{ __('assign subject to teacher') }}</x-button>
            </div>
            <span wire:loading>processing...</span>
            <p>{{ $teacher->name }}</p>
        </div>
    </form>
</div>
