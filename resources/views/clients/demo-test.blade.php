<h2>Demo view unicode</h2>
@if (session('mess'))
    <div class="alert alert-success">
        {{ session('mess') }}
    </div>
@endif
<form action="" method="post">
    <input type="text" name="username" placeholder="username..." value="{{old('username')}}">
    <button type="submit">Submit</button>
    @csrf
</form>