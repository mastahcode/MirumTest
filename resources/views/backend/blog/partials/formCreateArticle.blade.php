{!! Form::open(['url'=>'backend/blog','files'=>true]) !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Title']) !!}
</div>

<div class="form-group">
    {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Description article','size' => '30x5']) !!}
</div>

<div class="form-group">
    {!! Form::textarea('content',null,['class'=>'form-control','placeholder'=>'full content article']) !!}
</div>

<div class="form-group">
    {!! Form::select('category[]', $category,null, ['class'=>'form-control','multiple','placeholder' => '--select category--']) !!}
</div>

<div class="form-group">
    {!! Form::file('image',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('save',null,['class'=>'form-control']) !!}
</div>

{!! Form::close() !!}