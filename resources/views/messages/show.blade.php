@extends('layouts.dashboard')

@section('title', 'Conversation')

@section('content')
<!-- Reusing the same rich chat UI from messages.index for demonstration -->
@include('messages.index')
@endsection
