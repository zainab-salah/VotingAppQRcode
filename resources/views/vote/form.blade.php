 <!DOCTYPE html>
 <html lang="ar" dir="rtl">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>تصويت</title>
   <script src="https://cdn.tailwindcss.com"></script>
   <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>


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
       الرجاء قم بالتصويت بإستخدام QR مسجل لدى ابتكار.
     </p>
   </div>
   @endif

   @if($errors->any())
   <p class="text-red text-center">
     لقد قمت بالتصويت بالفعل!
   <ul>
     @foreach($errors->all() as $error)
     <li>{{ $error }}</li>
     @endforeach
   </ul>
   </p>
   @endif

   <div class="flex items-center gap-y-5 justify-center flex-col  pt-20">

     <!-- <div class="relative text-center px-5" id="video-container"> -->
     <h3 class=" pb-2 text-lg text-center">من اجل التصويت قم بقراءة الQR كود الذي بحوزتك</h3>
     <video id="preview" class="rounded-tr-2xl rounded-bl-2xl z-50"></video>
     <!-- </div> <span class="loader" id="loader"></span> -->


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
     <!-- </div> -->

     <script type="text/javascript">
       //  var videoContainer = document.getElementById('video-container');
       var loader = document.getElementById('loader');
       var voteForm = document.getElementById('vote-form');

       function setVoteNumber(number) {
         document.getElementById('vote_number').value = number;
       }
       var scanner = new Instascan.Scanner({
         video: document.getElementById('preview')
       });

       scanner.addListener('scan', function(content, image) {
         //  loader.style.display = 'block';

         console.log(content);
         document.getElementById('user_id').value = content;

         // Hide the video and loader, show the form
         //  videoContainer.style.display = 'none';
         //  loader.style.display = 'none';
         voteForm.style.display = 'block';

         scanner.stop();
       });

       Instascan.Camera.getCameras().then(function(cameras) {
         console.log(cameras)
         if (cameras.length > 0) {

           // Show the video, hide the loader and form
           //  videoContainer.style.display = 'block';
           //  loader.style.display = 'none';
           voteForm.style.display = 'none';
           if (cameras[2]) {
             scanner.start(cameras[2])
           } else if (cameras[1]) {
             scanner.start(cameras[1])
           } else {
             scanner.start(cameras[0]);
             //  scanner.start(cameras[0
           }

         }
       });

       document.getElementById('vote-form').addEventListener('submit', function(e) {
        //  loader.style.display = 'block';
         scanner.stop();
       });
     </script>


 </body>

 </html>