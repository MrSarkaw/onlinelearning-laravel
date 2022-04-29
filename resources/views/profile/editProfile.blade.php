@extends("layouts.app")

@section('content')
<form method="post" action="{{ route('profileupdate') }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="h-min-screen ">
        <div class="w-4/12 rounded-lg mt-3 mx-auto text-white mainColor overflow-hidden">
            <div class="p-4 text-center uppercase boxColor font-bold text-white">
               Edit Profile {{ Auth::user()->name }}
            </div>
            <div class="py-5 px-5 mt-4">
                
                <div class="mt-5">
                    <p>name</p>
                    <input type="text" value="{{ $user->name }}" name="name" placeholder="name" class='bg-transparent p-2 w-full  focus:outline-none rounded border border-gray-100/20'>
                </div>
                
           
               
                <div class="mt-5">
                    <p>email</p>
                    <input type="email" value="{{  $user->email }}" name="email" placeholder="email" class='bg-transparent p-2 w-full  focus:outline-none rounded border border-gray-100/20'>
                </div>
                
                <div class="mt-5">
                    <p>password</p>
                    <input type="password" name="password" placeholder="*****" class='bg-transparent p-2 w-full  focus:outline-none rounded border border-gray-100/20'>
                </div>
           
               
                <div class="mt-5">
                    <p>password confirmation</p>
                    <input type="password" name="password_confirmation" placeholder="*****" class='bg-transparent p-2 w-full  focus:outline-none rounded border border-gray-100/20'>
                </div>
                
                <div class="mt-5">
                    <p>Bio</p>
                    <textarea name="bio"  class='bg-transparent p-2 w-full  focus:outline-none rounded border border-gray-100/20'>{{ $user->bio }}</textarea>
                </div>
                
                
                 <div class="mt-5">
                     <p>Avatar</p>
                     <input type="file" name="avatar" class='bg-transparent p-2 w-full  focus:outline-none rounded border border-gray-100/20'>
                 </div>
                
                <div class="mt-10">
                    <button  class="bg-cyan-500 py-2 px-4 rounded text-gray-700"> <i class="fas fa-pen"></i> Update </button>
                </div>
    
            </div>
        </div>
    </div>
</form>
@endsection