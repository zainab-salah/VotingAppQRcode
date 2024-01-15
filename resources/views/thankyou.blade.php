<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> تم التصويت بنجاح</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="primary-bg relative">

        <div class="absolute flex flex-col items-center gap-5 justify-center welcome-container top-[10%] left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center opacity-0 animate-fadeIn animate-moveFromTop">
         
            <img src="{{ asset('images/logodark.jpg') }}" width="200" alt="Logo" class="  w-52 h-52">

            <!-- Welcome text -->
            <h1 class="text-3xl font-bold text-green-200 mb-2">تم تسجيل تصويتك بنجاح!</h1>
            <p class="text-md opacity-50">
                شكرا لك على المشاركة نتمى لك قضاء وقت سعيد
            </p>

        </div>
    </div>



</body>

</html>