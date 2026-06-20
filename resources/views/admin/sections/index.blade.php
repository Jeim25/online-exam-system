@extends('layouts.app')

@section('content')

    <div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
            <h1 class="text-2xl font-semibold text-[#880000]">Sections</h1>
            <a href="{{ route('admin.sections.create') }}"
               class="inline-flex items-center gap-1.5 bg-[#880000] text-white px-5 py-2 rounded-lg text-sm font-medium hover:bg-[#6a0000]">
                + Add Section
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded mb-6 text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left whitespace-nowrap min-w-[650px]">
                    <thead class="bg-[#880000] border-b-2 border-[#880000] uppercase text-xs text-white font-medium tracking-wide">
                        <tr>
                            <th class="px-5 py-3">Section</th>
                            <th class="px-5 py-3">Subject</th>
                            <th class="px-5 py-3">Teacher</th>
                            <th class="px-5 py-3">Students</th>
                            <th class="px-5 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($sections as $section)
                            <tr class="hover:bg-gray-50">
                                <td class="px-5 py-3.5 font-medium text-gray-800">{{ $section->name }}</td>
                                <td class="px-5 py-3.5 text-xs">
                                    <span class="font-mono bg-gray-100 text-gray-500 px-2 py-0.5 rounded mr-1.5">
                                        {{ $section->subject->code ?? '—' }}
                                    </span>
                                    <span class="text-gray-600">{{ $section->subject->name ?? '—' }}</span>
                                </td>
                                <td class="px-5 py-3.5 text-gray-500 text-xs">{{ $section->subject->teacher->name ?? '—' }}</td>
                                <td class="px-5 py-3.5">
                                    <span class="bg-gray-50 text-gray-600 border border-gray-200 text-xs font-medium px-2.5 py-1 rounded-full">
                                        {{ $section->students->count() }} enrolled
                                    </span>
                                </td>
                                <td class="px-5 py-3.5">
                                    <div class="flex items-center gap-4">
                                        <a href="{{ route('admin.sections.edit', $section) }}"
                                           class="text-[#880000] text-xs font-medium hover:underline">Edit</a>
                                        <form method="POST" action="{{ route('admin.sections.destroy', $section) }}"
                                              onsubmit="return confirm('Are you sure you want to delete this section?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 text-xs font-medium hover:underline">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-5 py-10 text-center text-gray-400 text-sm">
                                    No sections found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($sections->hasPages())
                <div class="px-5 py-4 border-t bg-gray-50">
                    {{ $sections->links() }}
                </div>
            @endif
        </div>

    </div>

@endsection