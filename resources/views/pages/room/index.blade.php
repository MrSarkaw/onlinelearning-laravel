@extends('layouts.app')
@section('content')
<div class="w-10/12 mx-auto mt-4 flex justify-between flex-wrap">
    <div class="w-2/12 ">
        {{-- <%- include('../component/topic.ejs') %> --}}
    </div>
    <div class="w-7/12 pl-5 text-xl">
        <div class="flex items-center justify-between">
            <div class="font-bold">
                <p class="uppercase text-white">study room</p> 
                <span class="text-sm mainColorText">{{ count($rooms) }} Rooms available</span>
            </div>
            @auth
            <div>
                <a href="/room/create" class="bg-cyan-500 px-4 py-2 rounded text-gray-700"><i class="fas fa-plus"></i> Create Room</a>
            </div>
            @endauth
        </div>
        <x-room :rooms="$rooms" />
    </div>
    <div class="w-3/12 pl-5">
        {{-- <%- include('../component/message.ejs') %> --}}
     </div>
</div>
@endsection