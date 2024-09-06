<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
     

     <!--   <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->
  



 <link rel="stylesheet" href="{{ asset('css/dataTables.dataTables.css') }}">


 <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>


 
  <script src="{{ asset('js/app.js') }}"></script>

         <script src="{{ asset('js/app2.js') }}"></script>
  
           <script src="{{ asset('js/weetalert.js') }}"></script>


   <script src="{{ asset('js/dataTables.js') }}"></script>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


          



   
        
    </head>
    
        

            <!-- Page Heading -->
          

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
   
    
</html>
