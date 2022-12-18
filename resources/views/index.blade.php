@include("header")
<div class="d-flex align-items-center justify-content-center" style="height: 100vh;background-color: #2e363f;">
    <div class="login w-40" style="width: 400px; color:#ffffff">
        <form action="/login" method="get">
            @csrf
            <h2 class="text-center" >Admin Login</h2>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger p-1">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            @if (session("error"))
                <div class="alert alert-danger p-1">
                    {{session("error")}}
                </div>
            @endif
            <div class="p-2 ">
                <label class="pb-2" for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" class="d-block w-100 p-2">
            </div>
            <div class="p-2">
                <label class="pb-2" for="password">Password</label>
                <input type="password" id="password" name="password"placeholder="Password" class="d-block w-100 p-2">
            </div>
            <input type="submit" value="Login" class="btn btn-success d-block w-100 p-2 mt-2">
        </form>
    </div>
</div>
@include("footer")