@extends('masterTemplates.masterTemplates')

<div style="padding-top: 3%" class="col-lg-6 col-lg-offset-3">

    @section('content')
        @if($article->count())
            <div class="col-md-12">
                <h1>Artikel</h1>
                <table class="table table-striped table-bordered tex">
                    <thead>
                    <th>Title</th>
                    <th>Penulis</th>
                    <th>Preview</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                    </thead>

                    <tbody>
                    @foreach($article as $articles)
                        <tr>
                            <td>{{$articles->title}}</td>
                            <td>{{$articles->user->nama}}</td>
                            {{--<td>{!!HTML::linkAction('blogController@show','View',array($artikels->slug),['class' =>'btn btn-info'])!!}</td>--}}
                            {{--<td>{!!HTML::linkAction('blogController@edit','Edit', [$artikels->id],['class'=>'btn btn-warning'])!!}</td>--}}
                            {{--<td>--}}
                                {{--{!! Form::open(array('action'=>array('blogController@destroy', $artikels->id), 'method'=>'delete')) !!}--}}
                                        {{--<!-- Button Submit-->--}}
                                {{--{!! Form::submit('Delete', ['class' =>'btn btn-danger']) !!}--}}
                                {{--{!! Form::close() !!}--}}
                            {{--</td>--}}

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        @else
            <div class="alert alert-info col-md-12">Tidak ada posting artikel yang tersimpan</div>
        @endif
    @endsection



</div>
