 <!DOCTYPE html>
 <html lang="ar" dir="rtl">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>تصويت</title>
   <script src="https://cdn.tailwindcss.com"></script>
   <!-- <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script> -->
   <script src="{{ asset('script/html5-qrcode.js') }}"></script>

   <link rel="stylesheet" href="{{ asset('css/style.css') }}">

 </head>

 <body class="relative min-h-screen -z-10 overflow-hidden">


   <img src="{{ asset('images/lightbg.png') }}" width="200" alt="bg img" class="lightbg">

   </div>
   <h2 class="text-2xl light text-center pt-10 font-semibold">تصويت</h2>

   @if(session('success'))
   <div>
     {{ session('success') }}
     <p class="text-green text-center">
       تم التصويت بنجاح
     </p>
   </div>


   <script type="text/javascript">
     window.location.href = "{{ route('thankyou') }}";
   </script>
   @endif

   @if(session('error'))
   <div style="color: red;">
     <p class="text-red text-center">
 
       {{ session('error') }}
       <!-- الرجاء قم بالتصويت بإستخدام QR مسجل لدى ابتكار. -->
     </p>
   </div>
   @endif

   @if($errors->any())

   <p class="text-red text-center">
im number two
   <ul>
     @foreach($errors->all() as $error)
    
     <li>{{ $error }}</li>
     @endforeach
   </ul>
   </p>
   @endif

   <div class="flex items-center gap-y-5 justify-center flex-col  pt-10">


     <h3 id="qrText" class="pb-2 text-lg text-center">من اجل التصويت قم بقراءة الQR كود الذي بحوزتك</h3>
     <div style="width: 500px" id="reader"></div>
     <span class="loader" id="loader"></span>


     <form id="vote-form" action="{{ route('submit.vote') }}" method="post" class="flex items-center px-5 justify-center flex-col">
       <h3 class="pt-5 pb-10 text-lg text-center">قم بإختيار رقم افضل مشروع </h3>
       @csrf
       <input type="text" name="user_id" id="user_id" required hidden>



       <input type="hidden" name="vote_number" id="vote_number" required>


       <div>

         <div class="flex items-center justify-between gap-y-5 gap-x-2 flex-wrap">
           <button class="voteBtn" type="button" onclick="setVoteNumber(1)">1</button>
           <button class="voteBtn" type="button" onclick="setVoteNumber(2)">2</button>
           <button class="voteBtn" type="button" onclick="setVoteNumber(3)">3</button>
           <button class="voteBtn" type="button" onclick="setVoteNumber(4)">4</button>
           <button class="voteBtn" type="button" onclick="setVoteNumber(5)">5</button>
           <button class="voteBtn" type="button" onclick="setVoteNumber(6)">6</button>
           <button class="voteBtn" type="button" onclick="setVoteNumber(7)">7</button>
           <button class="voteBtn" type="button" onclick="setVoteNumber(8)">8</button>
           <button class="voteBtn" type="button" onclick="setVoteNumber(9)">9</button>
         </div>
       </div>

       <br>
       <button type="submit" class="button">تصويت</button>
     </form>
   </div>
   <script>
     var resultContainer = document.getElementById('qr-reader-results');
     const form = document.getElementById('vote-form')
     const loader = document.getElementById('loader')
     const qrText = document.getElementById('qrText')

     var html5QrcodeScanner = new Html5QrcodeScanner(
       "reader", {
         fps: 10,
         qrbox: 250
       });

     function onScanSuccess(decodedText, decodedResult) {
       // Handle on success condition with the decoded text or result.
       loader.style.display = 'block';
       console.log(`Scan result: ${decodedText}`, decodedResult);
       document.getElementById('user_id').value = decodedText;
       qrText.style.display = 'none';

       html5QrcodeScanner.clear();
       form.style.display = 'block';
       loader.style.display = 'none';

     }

     html5QrcodeScanner.render(onScanSuccess);

     function setVoteNumber(number) {
       document.getElementById('vote_number').value = number;
     }

     form.addEventListener('submit', function(e) {

       loader.style.display = 'block';
       // html5QrcodeScanner.stop();
     });
   </script>
 </body>

 </html>