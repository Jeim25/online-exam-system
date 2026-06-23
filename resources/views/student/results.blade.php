@extends('layouts.app')
@section('title', 'Student Exam Results')
@section('content')
<div class="bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if (!isset($session))
            <div class="rounded-3xl bg-white shadow-lg p-8 text-center">
                <h1 class="text-3xl font-bold text-gray-900">No exam results available</h1>
                <p class="mt-4 text-gray-600">You have not submitted an exam yet.</p>
                <a href="{{ route('student.dashboard') }}" class="mt-6 inline-flex items-center justify-center rounded-full bg-[#880000] text-white font-bold px-6 py-3 hover:bg-[#660000] transition-colors">Back to dashboard</a>
            </div>
        @else
        <div class="bg-[#880000] text-white rounded-3xl shadow-lg p-8">
            <div class="flex items-center justify-between gap-6 flex-col sm:flex-row">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] text-white/80">Exam Submitted</p>
                    <h1 class="mt-3 text-4xl font-extrabold">Your score is ready</h1>
                </div>
                <div class="rounded-3xl bg-white p-6 text-center text-gray-900">
                    <p class="text-sm uppercase text-gray-500">Final Score</p>
                    <p class="mt-3 text-5xl font-black text-gray-900">{{ $session->score ?? 0 }} / {{ $session->exam->questions->count() }}</p>
                    <p class="text-sm text-gray-500 mt-1">{{ $session->score && $session->exam->questions->count() > 0 ? round(($session->score / $session->exam->questions->count()) * 100) : 0 }}%</p>
                </div>
            </div>

            <div class="mt-8 grid gap-4 sm:grid-cols-2">
                <div class="rounded-3xl bg-white shadow-sm p-6">
                    <p class="text-xs uppercase tracking-[0.28em] text-gray-500">Exam</p>
                    <p class="mt-3 text-xl font-semibold text-gray-900">{{ $session->exam->title }}</p>
                    <p class="text-sm text-gray-600">{{ $session->exam->subject->name ?? 'Subject' }}</p>
                </div>
                <div class="rounded-3xl bg-white shadow-sm p-6">
                    <p class="text-xs uppercase tracking-[0.28em] text-gray-500">Submitted</p>
                    <p class="mt-3 text-xl font-semibold text-gray-900">{{ $session->submitted_at?->format('M d, Y') ?? '—' }}</p>
                    <p class="text-sm text-gray-600">{{ $session->submitted_at?->format('h:i A') ?? '—' }}</p>
                </div>
            </div>

            <div class="mt-8 rounded-3xl bg-white p-6 text-gray-900">
                <h2 class="text-xl font-bold text-gray-900">What you answered</h2>
                <div class="mt-4 space-y-4">
                    @foreach($session->exam->questions as $index => $question)
                        @php
                            $answer = $session->answers->firstWhere('question_id', $question->id);
                            $selected = $answer?->choice;
                        @endphp
                        <div class="rounded-2xl bg-gray-50 p-4 border border-gray-200">
                            <div class="flex justify-between items-start gap-4">
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Question {{ $index + 1 }}</p>
                                    <p class="mt-2 text-sm text-gray-700">{{ $question->body }}</p>
                                </div>
                                <span class="text-xs uppercase tracking-[0.28em] text-gray-500">{{ $selected?->is_correct ? 'Correct' : 'Incorrect' }}</span>
                            </div>
                            <div class="mt-4 text-sm text-gray-700">
                                <p><span class="font-semibold">Your answer:</span> {{ $selected->body ?? 'No answer' }}</p>
                                <p class="mt-2"><span class="font-semibold">Correct answer:</span> {{ $question->choices->firstWhere('is_correct', 1)?->body ?? 'Not available' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-8 flex justify-start gap-4">
                <a href="{{ route('student.dashboard') }}" class="inline-flex items-center justify-center rounded-full bg-white text-[#880000] font-bold px-6 py-3 hover:bg-gray-100 transition-colors">Back to dashboard</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection