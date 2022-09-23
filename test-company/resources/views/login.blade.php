@extends ('layout')

@section ('content')

    <div class="container">
        <div class="mt-5 mb-5 ml-5">

            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="text-danger">{{ $error }}</div>
                @endforeach
            @endif
        </div>
     <div class="login-container">
       <div class="register">
         <h2>Registrarse</h2>
        <form class="col text-center" method="post" action="{{route('register')}}">
            @csrf
            <input type="text" placeholder="Nombre" class="correo" name="name">
           <input type="email" placeholder="Correo" class="correo" name="email">
           <input type="password" placeholder="Contraseña" class="pass" name="password">
           <input type="submit" class="submit" value="REGISTRARSE">
         </form>
       </div>
       <div class="login">
         <h2>Iniciar Sesión</h2>
          <form class="col text-center" method="post" action="{{route('login')}}">
            @csrf
           <input type="email" placeholder="Correo" class="correo" name="email">
           <input type="password" placeholder="Contraseña" class="pass" name="password">
           <input type="submit" class="submit" value="Acceder">
         </form>


       </div>
     </div>
   </div>
@endsection














