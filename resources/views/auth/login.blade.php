@extends("layout.app")

@section("title","Login Page")
@section("content")

        <form class="form" action="{{'login'}}" method="post">
            <h2>Login</h2>
            @csrf
            <div class="form-group">
                <input type="email" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
            <div class="form-group">
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
        </form>
        @endsection