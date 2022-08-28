{{-- <script src="https://js.pusher.com/7.0.3/pusher.min.js"></script> --}}
<script src="{{ asset('js/chat/pusher.min.js') }}"></script>
{{-- <script src="{{ asset('js/chat/echo.js') }}"></script> --}}


<script >
 
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher("{{ config('chat.pusher.key') }}", {
    // encrypted: true,
    cluster: "{{ config('chat.pusher.options.cluster') }}",
    authEndpoint: '{{route("pusher.auth")}}',
    // authEndpoint: '{{route("pusher.auth")}}',
    forceTLS: false,
    wsHost: window.location.hostname,
    wsPort: 6001,
    auth: {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }
  });

  // Pusher = new Pusher();

    // Echo = new Echo({
    //     broadcaster: 'pusher',
    //     key: "{{ config('chat.pusher.key') }}",
    //     cluster: "{{ config('chat.pusher.options.cluster') }}",
    //     forceTLS: false
    // });

    // Echo.join(`chat`)
    // .here((users) => {
    //     //
    // })
    // .joining((user) => {
    //     console.log(user.username);
    // })
    // .leaving((user) => {
    //     console.log(user.username);
    // })
    // .error((error) => {
    //     console.error(error);
    // });

    // Bellow are all the methods/variables that using php to assign globally.
    const allowedImages = {!! json_encode(config('chat.attachments.allowed_images')) !!} || [];
    const allowedFiles = {!! json_encode(config('chat.attachments.allowed_files')) !!} || [];
    const getAllowedExtensions = [...allowedImages, ...allowedFiles];
    const getMaxUploadSize = {!! json_encode(config('chat.attachments.max_upload_size')) !!} ;
    
// {{-- const getMaxUploadSize = {{ (new Message)->getMaxUploadSize() }}; --}}
</script>
<script src="{{ asset('js/chat/code.js') }}"></script>

</body>
</html>