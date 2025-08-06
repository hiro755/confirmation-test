@extends('layouts.app')

@section('content')
<div class="thanks-container">
    <h1>お問い合わせありがとうございました</h1>
    <a class="home-button" href="{{ route('contact.input') }}">HOME</a>
</div>
@endsection