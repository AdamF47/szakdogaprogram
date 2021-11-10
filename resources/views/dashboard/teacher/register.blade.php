<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teacher Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body style="background-color:lightskyblue !important">
    <div class="flex justify-center">       
            <div class="w-4/12 bg-white p-6 rounded-lg">
                 <h4>Teacher Register</h4><hr>
                 <form action="{{ route('teacher.create') }}" method="post">
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif

                    @csrf
                     <div class="mb-4">
                         <label for="name">Name</label>
                         <input type="text" class="bg-gray-100 border-2 w-full p-4 rounded-lg" name="name" placeholder="Enter full name" value="{{ old('name') }}">
                         <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                     </div>
                     <div class="mb-4">
                        <label for="email">Email</label>
                        <input type="text" class="bg-gray-100 border-2 w-full p-4 rounded-lg" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                     <div class="mb-4">
                         <label for="password">Password</label>
                         <input type="password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" name="password" placeholder="Enter password" value="{{ old('password') }}">
                         <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                     </div>
                     <div class="mb-4">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="bg-gray-100 border-2 w-full p-4 rounded-lg" name="cpassword" placeholder="Enter confirm password" value="{{ old('cpassword') }}">
                        <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
                    </div>
                     <div class="mb-4">
                         <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Register</button>
                     </div>
                     <br>
                     <a class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7" href="{{ route('teacher.login') }}">I already have an account, Login now</a>
                 </form>
            </div>
        </div>
    </div>
</body>
</html>