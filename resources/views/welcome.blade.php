<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Internship Manager Webapplication</title>            
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>        
        <div class="bg-blue-700 p-4 flex justify-between items-center">
            <div class="flex items-center">
                <img src="/img/logo1.png" width="50" alt="Logo" class="mr-2">
                <a href="#" class="inline-block p-2 text-indigo-200 hover:text-indigo-100 mr-2">Home</a>
                <a href="{{ route('admin.login') }}" class="inline-block p-2 text-indigo-200 hover:text-indigo-100">Admin</a>
            </div>
            <div class="hidden md:block">
                <a href="{{ route('user.register')}}" class="inline-block p-2 text-green-800 bg-green-400 hover:bg-green-300 hover:text-green-800 rounded transition">Sign Up for Students</a>
            </div>
        </div>
        
        <div class="md:flex justify-between py-20 px-10 bg-indigo-600 text-indigo-100">
            <div class="md:w-1/2 mb-10 md:mb-0">
              <h2 class="text-2xl md:text-4xl lg:text-6xl text-white mb-6">Welcome to the Triton Internship Manager!</h2>
              <p class="mb-6">The only site where all university students can manage their internships.</p>
          
              <a href="{{ route('user.login') }}" class="inline-block py-3 px-6 text-lg bg-green-400 text-green-800 hover:bg-green-300 rounded mr-2">Login for Students</a>
              <a href="{{ route('teacher.login') }}" class="inline-block py-3 px-6 text-lg bg-blue-400 text-blue-800 hover:bg-blue-300 rounded mr-2">Login for Teachers</a>
              <a href="{{ route('coordinator.login') }}" class="inline-block py-3 px-6 text-lg bg-purple-400 text-purple-800 hover:bg-purple-300 rounded">Login for Coordiators</a>
            </div>
            <div class="md:w-1/2">
                <img src="/img/university.png" alt="University Life" class="w-full rounded shadow-2xl">
            </div>
        </div>       
        <div class="p-20 bg-indigo-700 text-indigo-300 flex justify-end">
            <div class="flex items-center">
                Copyright &copy; SzitkomInformatics 2021 - ARO7MB
            </div>
        </div>
        @yield('content')
    </body>
</html>