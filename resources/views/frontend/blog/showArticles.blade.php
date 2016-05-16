@extends('masterTemplates.masterTemplates')

@section('content')
    @include('frontend.blog.partials.content')
@endsection

@section('comment')
    @include('frontend.blog.partials.comments')
@endsection

@section('sidebarKanan')
    @include('frontend.blog.partials.sidebarKanan')
@endsection