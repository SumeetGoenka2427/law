@extends('layouts.app')

@section('title', 'TestLaw — India\'s Premier Legal News Portal')
@section('meta_description', 'India\'s most trusted source for legal news, court judgments, legislative updates and expert opinions.')

@section('content')
<main>
    <div class="container">
        @if(!empty($leaderboardAd) && $leaderboardAd->image)
        <div class="leaderboard-ad">
            @if($leaderboardAd->url)
            <a href="{{ $leaderboardAd->url }}" target="_blank" rel="noopener nofollow">
                <img src="{{ asset('storage/'.$leaderboardAd->image) }}" alt="{{ $leaderboardAd->title }}" class="img-fluid" />
            </a>
            @else
            <img src="{{ asset('storage/'.$leaderboardAd->image) }}" alt="{{ $leaderboardAd->title }}" class="img-fluid" />
            @endif
        </div>
        @elseif(!empty($leaderboardAd) && $leaderboardAd->code)
        <div class="leaderboard-ad">{!! $leaderboardAd->code !!}</div>
        @else
        <div class="leaderboard-ad">
            <span>Advertisement — 728 × 90</span>
        </div>
        @endif

        <div class="main-content">
            <div class="content-col">
                @include('partials.home.hero')

                <div class="ribbon-bar">Today's Coverage</div>

                @include('partials.home.news-grid')

                @include('partials.home.judgments')

                @include('partials.home.opinions')

                @include('partials.home.visual')
            </div>

            @include('partials.home.sidebar')
        </div>
    </div>
</main>
@endsection
