<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body style="background-color:lightgreen !important">
    <div class="flex justify-center">       
            <div class="w-4/12 bg-white p-6 rounded-lg">
                  <h4>User Login</h4><hr>
                  <form action="{{ route('user.check') }}" method="post" autocomplete="off">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    @csrf
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
                          <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
                      </div>
                      <br>
                      <a class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7" href="{{ route('user.register') }}">Create new Account</a>
                  </form>
            </div>
        </div>
    </div>
    
</body>
</html>