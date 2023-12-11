@extends('layouts.app')

@section('main')
    <main id="questions-listing">
        <section id="questions-info">
            <h2>Showing</h2>
            <article id="questions-stats">
                <h3>{{ $questions->total }} questions</h3>
                <button id="filters-button">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="16" height="16" viewBox="0 0 256 256" xml:space="preserve">
                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                            <path d="M 52.537 80.466 V 45.192 L 84.53 2.999 C 85.464 1.768 84.586 0 83.041 0 H 6.959 C 5.414 0 4.536 1.768 5.47 2.999 l 31.994 42.192 v 43.441 c 0 1.064 1.163 1.719 2.073 1.167 l 11.758 -7.127 C 52.065 82.205 52.537 81.368 52.537 80.466 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: #FFFFFF; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        </g>
                    </svg>
                    Filter
                </button>
            </article>
            <form id="questions-filters" method="post" hidden>
                <fieldset>
                    <legend>Filter by</legend>
                    <label for="after">After</label>
                    <input id="after" type="date" name="after">
                    <label for="before">Before</label>
                    <input id="before" type="date" name="before">
                </fieldset>
                <fieldset>
                    <legend>Sort by</legend>
                    <label for="sort-popular">Popular</label>
                    <input id="sort-popular" type="radio" name="sort" value="popular" checked>
                    <label for="sort-recent">Recent</label>
                    <input id="sort-recent" type="radio" name="sort" value="recent">
                </fieldset>
                <div id="filters-buttons">
                    <button id="apply-button" type="submit">Apply</button>
                    <button id="reset-filters-button" type="reset">Reset Filters</button>
                </div>
            </form>
        </section>
        <section id="questions">
            <h1>Questions</h1>
            @foreach ($questions->data as $question)
                @include('partials.question', ['question' => $question])
            @endforeach
        </section>
    </main>
@endsection
