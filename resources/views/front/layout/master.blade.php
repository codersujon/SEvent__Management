<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="icon" type="image/png" href="{{ asset('dist-front') }}/images/favicon.png">

        <title>SingleEvent - Event & Conference Management Website</title>

        @include('front.layout.styles')

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,500,700,900" rel="stylesheet">
        
    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="50">

        @include('front.layout.nav')

        

        @yield('main_content')



        @include('front.layout.footer')

        @include('front.layout.scripts')
    </body>
</html>
