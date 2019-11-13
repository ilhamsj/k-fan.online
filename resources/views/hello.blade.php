<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
</head>

<body>
  <h1>Pusher Test</h1>

  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>

  <audio id="myAudio">
    <source src="{{ secure_url('css/jarvis_incoming_mess.mp3')}}" type="audio/ogg">
    Your browser does not support the audio element.
  </audio>

  <i class="fa fa-bell-o" aria-hidden="true"></i>
  
  <script src="{{ secure_url('js/app.js') }}"></script>
  <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
  <script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('44c07d75b84acf6201e2', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(response) {
      // alert(JSON.stringify(data));
      $('#myAudio')[0].play();
      console.log(response);
      
    });
  </script>
</body>