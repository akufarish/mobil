@extends("layout.auth")

@section("content")
    <main class="bg-lightmode">
        <div class="flex justify-center items-center h-screen">
            <div class="p-6 bg-white rounded-md border border-primary_50 shadow-md">
                <form method="POST" action="/register" class="flex flex-col justify-center items-center gap-3">
                    @csrf
                    <img  src="img/logo.png" alt="" class="w-40">
                    <div class="flex flex-col gap-2">
                        <label for="email" class="">Email</label>
                        <input type="email" class="w-64 h-11 bg-gray-200 rounded-md px-4 focus:outline-primary_50" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="name" class="">Name</label>
                        <input type="text" class="w-64 h-11 bg-gray-200 rounded-md px-4 focus:outline-primary_50" name="name" id="name" placeholder="Name">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="password" class="">Password</label>
                        <input type="password" class="w-64 h-11 bg-gray-200 rounded-md px-4 focus:outline-primary_50" name="password" id="password" placeholder="Password">
                    </div>
                    <button class="w-full bg-primary_50 text-white py-2 rounded-md">Register</button>
                    <a href="/login" class="text-primary_50">Sudah punya akun?</a>
                </form>
            </div>
        </div>
    </main>
@endsection