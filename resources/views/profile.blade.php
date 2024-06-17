@extends("layout.layout")

@section("title","Profile Page")
@section("content")

<h2>Profile</h2>
<form class="profile-form" method="post" action="#">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="" disabled>
    </div>
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" value="">
    </div>
    <div class="form-group">
        <button type="submit">Save Changes</button>
    </div>
</form>
 
@endsection



