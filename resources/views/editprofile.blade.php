@include('navbar')
  <div class="formStyle">
    <div class="formHead">
      <h1>Edit Profile Information</h1>
      <form class="deleteAcc" method="post" action="/user/{{$userInfo->id}}/delete">
        @csrf
        @method('DELETE')
        <button type="submit" name="button">Delete Account</button>
      </form>
    </div>
    <div class="form">
      <form class="" method="post" action="/user/{{$userInfo->id}}/update">
        @csrf
        @method('PUT')
        <div class="inputStyle">
          <label for="">Ime</label>
          <input type="text" name="first_name" value="{{$userInfo->first_name}}" autocomplete="off">
          @error('first_name')
          <strong>* {{$message}}</strong>
          @enderror
        </div>
        <div class="inputStyle">
          <label for="">Prezime</label>
          <input type="text" name="last_name" value="{{$userInfo->last_name}}" autocomplete="off">
          @error('last_name')
          <strong>* {{$message}}</strong>
          @enderror
        </div>
        <div class="inputStyle">
          <label for="">Korisnicko Ime</label>
          <input type="text" name="username" value="{{$userInfo->username}}" autocomplete="off">
          @error('username')
          <strong>* {{$message}}</strong>
          @enderror
        </div>
        <div class="inputStyle">
          <label for="">Email Adresa</label>
          <input type="email" name="email" value="{{$userInfo->email}}" autocomplete="off">
          @error('email')
          <strong>* {{$message}}</strong>
          @enderror
        </div>
        <div class="inputStyle">
          <label for="">Lozinka</label>
          <input type="password" name="password" value="">
          @error('password')
          <strong>* {{$message}}</strong>
          @enderror
        </div>
        <div class="buttonStyle">
          <button type="submit" name="button">Save</button>
        </div>
      </form>
    </div>
  </div>
@include('includes.footer')