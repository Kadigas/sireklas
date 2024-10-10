<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="icon" href="/pictures/itslogo.png">

        <!-- Styles -->
        @vite('resources/css/app.css')

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
    <section class="bg-blue-900 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen md:h-screen lg:py-0">
      <!-- <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <img src="" alt="">
      </a> -->
      <div class="w-full bg-gray-200 rounded-lg shadow-2xl dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Sign In
              </h1>
              <form class="space-y-4 md:space-y-6" action="{{route('login.post')}}" method="POST">
              @csrf  
                  <div class="relative">
                      <input type="text" name="username" id="username" class="block border border-gray-300 px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                      <label for="username" class="absolute text-sm bg-transparent text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-100 top-2 z-10 origin-[0] dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-black peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:bg-transparent peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-120 peer-focus:-translate-y-8 peer-focus:-translate-x-4  left-3">Email</label>
                  </div>

                  <div class="relative">
                      <input type="password" name="password" id="password" class="block border border-gray-300 px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                      <label for="password" class="absolute text-sm bg-transparent text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-100 top-2 z-10 origin-[0] dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-black peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:bg-transparent peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-120 peer-focus:-translate-y-8 peer-focus:-translate-x-4  left-3">Password</label>
                  </div>
                  <div class="flex items-center justify-between">
                      <!-- <div class="flex items-start">
                          <div class="flex items-center h-5">
                            <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                          </div>
                      </div> -->
                      <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                  </div>
                  <button type="submit" class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
              </form>
              @foreach($errors->all() as $error)
                <div class="error py-2 text-sm text-red-600">{{ $errors }}</div>
              @endforeach 
          </div>
      </div>
  </div>
</section>
</body>
<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</html>
