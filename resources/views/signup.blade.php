@extends('base')

@section('content')
<form action="" method="post">
    @csrf
    <div>
        <label for="name">name</label>
        <input type="text" name="name" id="name">
        @error('name')
        <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        @error('password')
        <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit">회원가입</button>
</form>
@endsection