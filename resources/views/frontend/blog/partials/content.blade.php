<!-- Title -->
<h1>{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
    by <a href="#">{{$post->user->nama}}</a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> {{$post->created_at->format('d M, Y')}}</p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="{{asset('assets/img/article/'.$post->image)}}" alt="">

<hr>

<!-- Post Content -->

<p>{{$post->content}}</p>

<hr>