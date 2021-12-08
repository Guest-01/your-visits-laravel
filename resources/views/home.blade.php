@extends('base')

@section('content')
@auth
<form action="{{ route('logout') }}" method="post">
    @csrf
    <input type="submit" value="{{auth()->user()->name}}님(로그아웃)">
</form>

<h2>당신은 이 웹사이트에... {{ $ip->count }}번 방문하였습니다.</h2>
<p>현재 아이피: {{ request()->ip() }}</p>
<p>과거 아이피들:</p>

@if ($ips)
<ul>
    @foreach ($ips as $ip)
    <li>{{ $ip->ip }}: {{ $ip->count }}</li>
    @endforeach
</ul>
@endif

@endauth
@guest
<a href="{{ route('login') }}">로그인</a>
<a href="{{ route('signup') }}">회원가입</a>

<h2>당신은 이 웹사이트에... {{ $ip->count }}번 방문하였습니다.</h2>
<p>현재 아이피: {{ request()->ip() }}</p>
@endguest


<footer>
    Developed with PHP - Laravel framework @2021
</footer>
@endsection