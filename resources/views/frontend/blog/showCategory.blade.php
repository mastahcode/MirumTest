@extends('masterTemplates.masterTemplates')


@section('content')

    <div style="padding-top: 3%" class="col-lg-6">

        @foreach($post as $posts)
            <h3>{{$posts->title}}</h3>

            <p>{{$posts->description}}</p>

            <p><a href="{{url(action('BlogFrontController@show',$posts->slug))}}">Read
                    More </a></p>
        @endforeach

    </div>
@endsection
@section('sidebarKanan')
    @include('frontend.blog.partials.sidebarKanan')
@endsection