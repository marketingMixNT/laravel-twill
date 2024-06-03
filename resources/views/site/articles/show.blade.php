@extends('site.layouts.news')

@section('content')
    <h1>{{ $article->title }}</h1>
    <p>{{ $article->text }}</p>
    <a href="{{ route('articles') }}">{{ __('Back') }}</a>
@endsection