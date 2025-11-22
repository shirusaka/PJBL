@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Frequently Asked Questions</h1>

    <div class="faq-list">
        @foreach ($faqs as $faq)
            <div class="faq-item">
                <h3>{{ $faq->pertanyaan }}</h3>
                <p>{{ $faq->jawaban }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
