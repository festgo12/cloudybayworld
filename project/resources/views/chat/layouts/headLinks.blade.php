<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('chat.name') }}</title>

    {{-- Meta tags --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="id" content="{{ $id }}">
    <meta name="type" content="{{ $type }}">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <meta name="messenger-color" content="{{ $messengerColor }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url" content="{{ url('').'/'.config('chat.routes.prefix') }}" data-user="{{ Auth::user()->id }}">

    {{-- scripts --}}
    <script
      {{-- src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
      
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/chat/font.awesome.min.js') }}"></script>
    <script src="{{ asset('js/chat/font.awesome.min.js') }}"></script>
    <script src="{{ asset('js/chat/autosize.js') }}"></script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/chat/nprogress.js') }}"></script>
    {{-- <script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script> --}}

    {{-- styles --}}
    {{-- <link rel='stylesheet' href='https://unpkg.com/nprogress@0.2.0/nprogress.css'/> --}}
    <link href="{{ asset('css/chat/nprogress.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/chat/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/chat/'.$dark_mode.'.mode.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/emojionearea.min.css') }}">
    <!-- Begin emoji-picker Stylesheets -->
    {{-- <link href="{{ asset('assets/css/emoji.css') }}" rel="stylesheet"> --}}
    <!-- End emoji-picker Stylesheets -->

    {{-- Messenger Color Style--}}
    @include('chat.layouts.messengerColor')

</head>
<body>
    

