<div class="messenger-sendCard ">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <label><span class="fas fa-paperclip"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept="image/*, .txt, .rar, .zip" /></label>
        <textarea  readonly='readonly' name="message" class="m-send app-scroll emoji" placeholder="Type a message.." ></textarea>
        {{-- <textarea  readonly='readonly' name="message" class="m-send app-scroll emoji" placeholder="Type a message.." data-emojiable="true"></textarea> --}}
        <button disabled='disabled'><span class="fas fa-paper-plane"></span></button>
    </form>
</div>

    <script type="text/javascript" src="{{ asset('assets/js/emojionearea.min.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".emoji").emojioneArea({
        // emojiPlaceholder: ":smile_cat:",
        pickerPosition: "top",
        tonesStyle: "bullet"

        });
    });
    </script>



{{-- <script src="{{ asset('assets/js/emoji/config.min.js') }}"></script>
<script src="{{ asset('assets/js/emoji/util.min.js') }}"></script>
<script src="{{ asset('assets/js/emoji/jquery.emojiarea.min.js') }}"></script>
<script src="{{ asset('assets/js/emoji/emoji-picker.min.js') }}"></script>
<!-- End emoji-picker JavaScript -->

<script>
  $(function() {
    // Initializes and creates emoji set from sprite sheet
    window.emojiPicker = new EmojiPicker({
      emojiable_selector: '[data-emojiable=true]',
    //   assetsPath: '/assets/images/',
      popupButtonClasses: 'fa fa-smile'
    });
    // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
    // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
    // It can be called as many times as necessary; previously converted input fields will not be converted again
    window.emojiPicker.discover();
  });
</script> --}}