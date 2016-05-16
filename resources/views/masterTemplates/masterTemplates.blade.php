@include('masterTemplates.header')

        <!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

    @include('masterTemplates.menu')
</nav>


<div class="container">

    <div class="row">


        <div class="col-lg-8">


            @yield('content')

            @yield('comment')


        </div>


        @yield('sidebarKanan')

    </div>


    <hr>

    @include('masterTemplates.footContent')

</div>


@include('masterTemplates.js.allJs')

@include('masterTemplates.footer')
