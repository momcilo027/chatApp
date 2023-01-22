@include('navbar')
<div class="formStyle">
    <div class="formHead">
      <h1>Laravel ChatApp</h1>
      <div class="formPick">
        <a class="inActive" href="/signup">SING UP</a>
        <a class="active" href="#">LOG IN</a>
      </div>
    </div>
    <div class="form">
      <form action="/loginUser" method="POST">
        @csrf
        <div class="inputStyle">
          <label for="username">Username</label>
          <input id="username" type="text" name="username" value="{{old('username')}}" autocomplete="off">
          @error('username')
          <strong>* {{$message}}</strong>
          @enderror
        </div>
        <div class="inputStyle">
          <label for="password">Password</label>
          <input id="password" type="password" name="password" value="">
          @error('password')
          <strong>* {{$message}}</strong>
          @enderror
        </div>
        <div class="buttonStyle">
          <button type="submit" name="login">Log In</button>
        </div>
      </form>
    </div>
</div>
@include('includes.footer')