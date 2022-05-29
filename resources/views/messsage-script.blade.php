<script>
    const pusherChannel = "{{env('PUSHER_APP_CHANNEL')}}";
    const pusherEvent = "{{env('PUSHER_APP_EVENT')}}";

    Pusher.logToConsole = true;
    var pusher = new Pusher("{{env('PUSHER_APP_KEY')}}", {
        cluster: "{{env('PUSHER_APP_CLUSTER')}}",
        forceTLS: true,
        encrypted: true ,
        authEndpoint:"{{route('pusher.auth')}}",
        auth: {
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        },
    });

    var channel = pusher.subscribe(pusherChannel);
    channel.bind(pusherEvent, function (data) {
        alert(data);
    });

</script>
