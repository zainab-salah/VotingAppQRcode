<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
 </head>

<body>
    <div class="primary-bg relative">

        <div class="absolute flex flex-col items-center gap-5 justify-center welcome-container top-[10%] left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center opacity-0 animate-fadeIn animate-moveFromTop">
            <!-- Animated logo (replace 'your-logo.png' with your actual logo) -->
            <img src="{{ asset('images/logodark.jpg') }}" width="200" alt="Logo" class="  w-52 h-52">

            <!-- Welcome text -->
            <h1 class="text-3xl font-bold mb-2">تصويت</h1>
            <p class="text-md opacity-50">من اجل التصويت قم بقراءة الكود لتسجيل صوتك</p>
            <a href="{{url('/vote')}}" class="button
 
              ">قراءة الكود</a>
        </div>
    </div>

    <!-- py-3 px-5 text-center shadow
             drop-shadow shadow-md shadow-white  light primary-bg font-semibold 
             cursor-pointer dark rounded-tr-2xl rounded-bl-2xl -->

</body>

</html>