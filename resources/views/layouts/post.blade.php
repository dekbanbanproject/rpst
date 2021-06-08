<!DOCTYPE html>
<html lang="en">
    <head>
        @include('Fontend.headertops')
    </head>    
    <body style="background-image: url('{{ asset('img/background/bgu3.png')}}');" width="1300px;" height="800px;">
        
        <!--================Top Header Area =================-->
        @include('..//Fontend.headertop')
        <!--================End Top Header Area =================-->
        
        <!--================Menu Area =================-->
        @include('..//Fontend.header')       
        <!--================End Menu Area =================-->       
        <main class="py-4">
            <div class="container">
            @include('..//Fontend.messages') 
            </div>
           

            @yield('content')

        </main>
          <!--================Footer Area =================-->
          @include('..//Fontend.footer')
        <!--================End Footer Area =================-->

        <!--======== Side Modal Login======== -->
        @include('..//Fontend.login')
        <!--======== Side Modal Top Right======== -->
        
         <!--========start footerscript======== -->
         @include('..//Fontend.footerscript')
        <!--========end footerscript======== -->
       
    </body>
</html>