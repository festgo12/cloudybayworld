{{-- <script src="https://js.pusher.com/7.0.3/pusher.min.js"></script> --}}
<script src="{{ asset('js/chat/pusher.min.js') }}"></script>
<script >
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher("{{ config('chat.pusher.key') }}", {
    encrypted: true,
    cluster: "{{ config('chat.pusher.options.cluster') }}",
    authEndpoint: '{{route("pusher.auth")}}',
    auth: {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }
  });

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