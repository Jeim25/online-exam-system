@extends('layouts.app')

@section('content')

    <div class="max-w-lg mx-auto px-4 sm:px-6 py-8">
        <h1 class="text-2xl font-semibold text-[#880000] mb-6">Add Section</h1>

        <div class="bg-white rounded-xl border border-gray-100 p-6 sm:p-8">
            <form method="POST" action="{{ route('admin.sections.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Section Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        placeholder="e.g. BSCS 3-4"
                        class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
                    <select name="subject_id"
                        class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm">
                        <option value="">Select a subject</option>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                {{ $subject->code }} — {{ $subject->name }}
                                ({{ $subject->teacher->name ?? 'No teacher' }})
                            </option>
                        @endforeach
                    </select>
                    @error('subject_id')
                        <p class="text-red-500 text-xs mt-1 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Enroll Students</label>
                    @if($students->isEmpty())
                        <p class="text-sm text-gray-400">No student accounts found.</p>
                    @else
                        <div class="border border-gray-200 rounded-lg divide-y divide-gray-100 max-h-60 overflow-y-auto">
                            @foreach($students as $student)
                                <label class="flex items-center gap-3 px-4 py-2.5 hover:bg-gray-50 cursor-pointer transition-colors">
                                    <input type="checkbox"
                                        name="students[]"
                                        value="{{ $student->id }}"
                                        {{ in_array($student->id, old('students', [])) ? 'checked' : '' }}
                                        class="accent-[#880000] w-4 h-4 rounded border-gray-300">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-medium text-gray-800">{{ $student->name }}</span>
                                        <span class="text-xs text-gray-500">{{ $student->email }}</span>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit"
                        class="inline-flex items-center justify-center bg-[#880000] text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-[#6a0000]">
                        Create Section
                    </button>
                    <a href="{{ route('admin.sections.index') }}"
                       class="text-sm font-medium text-gray-500 hover:text-gray-800 hover:underline">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>

@endsection