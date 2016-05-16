@extends('masterTemplates.masterTemplates')

<div style="padding-top: 3%" class="col-lg-6 col-lg-offset-3">

    @include('frontend.messages.flash')
    @include('backend.blog.partials.formCreateArticle')
    @include('frontend.messages.error')

</div>

