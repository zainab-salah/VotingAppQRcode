 <!DOCTYPE html>
 <html lang="ar" dir="rtl">

 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>تصويت</title>
   <script src="https://cdn.tailwindcss.com"></script>

   <!-- <script src="{{ asset('script/html5-qrcode.js') }}"></script> -->

   <script src="https://unpkg.com/html5-qrcode@2.3.2/html5-qrcode.min.js" type="text/javascript"></script>
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">

 </head>

 <body class="relative min-h-screen h-full  overflow-x-hidden">


   <img src="{{ asset('images/lightbg.png') }}" width="200" alt="bg img" class="lightbg">


   <h2 class="text-2xl light text-center pt-10 font-semibold">تصويت</h2>

   @if(session('success'))
   <script type="text/javascript">
     window.location.href = "{{ route('thankyou') }}";
   </script>
   @endif

   @if(session('error'))

   <p class="text-red text-center">
  {{ session('error') }}
</p>

   @endif

   @if($errors->any())

   <p  class="text-red text-center">
     im number two
   <ul>
     @foreach($errors->all() as $error)

     <li class="text-red ">{{ $error }}</li>
     @endforeach
   </ul>
   </p>
   @endif

   <div class="flex items-center gap-y-2 justify-center flex-col  pt-10">
     <div class="p-1 container" id="container">
       <h3 class="pb-2 text-lg text-center">من اجل التصويت قم بقراءة الQR كود الذي بحوزتك</h3>

       <div id="my-qr-reader"> </div>

     </div>



     <span class="loader" id="loader"></span>

<p id="vote-error " class="text-center text-red"> </p>
     <form id="vote-form" action="{{ route('submit.vote') }}" method="post" onsubmit="return validateForm()" class="flex items-center px-5 pb-10 justify-center flex-col">
       <h3 class="pt-5 pb-10 text-lg text-center">قم بإختيار رقم افضل مشروع </h3>
       @csrf
       <input type="text" name="user_id" id="user_id" required hidden>
       <input type="hidden" name="vote_number" id="vote_number" required>
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
       <button type="submit" class="button mt-5">تصويت</button>
     </form>
   </div>

   <script>
     const form = document.getElementById('vote-form')
     const loader = document.getElementById('loader')
     const container = document.getElementById('container')
     const userId = document.getElementById('user_id')
     const voteError = document.getElementById('vote-error')
     
 if(userId.value){
    container.style.display = 'none';
    form.style.display = 'block';
    loader.style.display = 'none';
 }
     function domReady(fn) {
       if (
         document.readyState === "complete" ||
         document.readyState === "interactive"
       ) {

         setTimeout(fn, 1000);
       } else {
         document.addEventListener("DOMContentLoaded", fn);
       }
     }

     domReady(function() {


       function onScanSuccess(decodeText, decodeResult) {
         console.log("You Qr is : " + decodeText, decodeResult);
         htmlscanner.clear();
         userId.value = decodeText;
         container.style.display = 'none';
         form.style.display = 'block';
         loader.style.display = 'none';
       }

       let htmlscanner = new Html5QrcodeScanner(
         "my-qr-reader", {
           fps: 10,
           qrbos: 250
         }
       );
       htmlscanner.render(onScanSuccess);
     });
     function validateForm() {
    const voteNumber = document.getElementById('vote_number').value;

    if (!voteNumber) {
 
      voteError.style.display = 'block';
      return false;  
    }

    return true;  
  }
  function setVoteNumber(number) {
    container.style.display = 'none';
    document.getElementById('vote_number').value = number;
    voteError.style.display = 'none';  
  }
  let htmlscanner = new Html5QrcodeScanner(
         "my-qr-reader", {
           fps: 10,
           qrbos: 250
         }
       );
       htmlscanner.clear();
   </script>
 </body>

 </html>