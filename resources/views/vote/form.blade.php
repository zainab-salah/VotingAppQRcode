<!-- resources/views/vote/form.blade.php -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Form</title>
    
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>
<body>
    <h2>Vote Form</h2>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>

    
        <script type="text/javascript">
        // setTimeout(function () {
            window.location.href = "{{ route('thankyou') }}";  
        // }, 3000);  
    </script>
    @endif

    @if(session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <video id="preview"></video>

    <form id="vote-form" action="{{ route('submit.vote') }}" method="post">
        @csrf
      
        <input type="text" name="user_id" id="user_id" required  hidden >
       
        <label for="vote_number">Vote Number:</label>
        <input type="number" name="vote_number" id="vote_number" required>
        <br>
        <button type="submit">Submit Vote</button>
    </form>
    <script type="text/javascript">
      var scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content, image) {
        console.log(content);
        document.getElementById('user_id').value = content;
                scanner.stop();
      });
 
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        }
      });
      document.getElementById('vote-form').addEventListener('submit', function (e) {
        scanner.stop();
            });
    </script>
 
</body>
</html>
