@include('navbar')
<div class="formStyle">
    <div class="formHead">
      <h1>Laravel ChatApp</h1>
      <div class="formPick">
        <a class="active" href="#">SING UP</a>
        <a class="inActive" href="/login">LOG IN</a>
      </div>
    </div>
    <div class="form">
      <form action="/users" method="POST">
        @csrf
        <div class="inputStyle">
          <label for="firstName">First name</label>
          <input id="firstName" type="text" name="first_name" value="{{old('first_name')}}" autocomplete="off">
          @error('first_name')
          <strong>* {{$message}}</strong>
          @enderror
        </div>
        <div class="inputStyle">
          <label for="lastName">Last name</label>
          <input id="lastName" type="text" name="last_name" value="{{old('last_name')}}" autocomplete="off">
          @error('last_name')
          <strong>* {{$message}}</strong>
          @enderror
        </div>
        <div class="inputStyle">
          <label for="username">Username</label>
          <input id="username" type="text" name="username" value="{{old('username')}}" autocomplete="off">
          @error('username')
          <strong>* {{$message}}</strong>
          @enderror
        </div>
        <div class="inputStyle">
          <label for="email">Email</label>
          <input id="email" type="email" name="email" value="{{old('email')}}" autocomplete="off">
          @error('email')
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
        <div class="inputStyle">
          <label for="password_confirmation">Password confirm</label>
          <input id="password_confirmation" type="password" name="password_confirmation" value="">
          @error('password_confirmation')
          <strong>* {{$message}}</strong>
          @enderror
        </div>
        <div class="buttonStyle">
          <button type="submit" name="signup">Sign Up</button>
        </div>
      </form>
    </div>
</div>
@include('includes.footer')