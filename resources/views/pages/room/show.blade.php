@extends('layouts.app')
@section('content')

<div class="w-10/12 mx-auto">
    <div class=" flex space-x-5">
        <div class="w-9/12 rounded-lg text-white mainColor overflow-hidden">
            <div class="p-4 uppercase boxColor font-bold flex justify-between items-center">
                <div>
                    <a href="{{ route('index') }}" class="focus:outline-none"><i class="fas fa-arrow-left"></i></a> STUDY ROOM
                </div>
                <div class="space-x-4 flex">
                    @auth    
                     @if(Auth::id() == $room->user_id)
                        <a href="{{ route('edit', ['room'=>$room->id]) }}" class="focus:outline-none"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('destroy', ['room'=>$room->id]) }}" method="post">
                            @method('delete')
                            @csrf
                            <button><i class="fas fa-trash"></i></button>
                        </form>
                     @endif
                    @endauth
                    
                </div>
            </div>
            <div class="py-10 px-5 ">
                <div class="flex items-center justify-between ">
                    <p class="text-cyan-500 text-2xl">  {{ $room->title }}</p>
                    <p class="text-sm text-gray-100/30">{{ $room->created_at->diffForHumans() }}</p>
                </div>
                <p class="uppercase mt-2 text-xs text-gray-100/30">hosted by</p>
                <div class="flex items-center space-x-3 mt-2">
                    <img style="background-image:url('/images/{{ $room->user->image }}')" class="w-8 h-8 coverImg rounded-full" alt="">
                    <div class="text-lg">
                        <p class="text-cyan-500">
                           {{ $room->user->name }}
                        </p>
                    </div>
                </div>
                <p class="text-gray-100/40 my-3">
                    {{ $room->description }}
                </p>
                <span class="bg-gray-500 px-4 rounded-full py-1">
                    {{ $room->topic->name }}
                </span>

                <div class="color p-2 rounded mt-4 h-72 overflow-y-scroll grid gap-y-5">
                  @foreach ($room->messages as $row)
                    <div class="p-3 border-l-2 border-gray-100/30">
                            <div class="flex justify-between">
                                <div class="flex items-center space-x-3">
                                    <img style="background-image:url('{{ asset('images/'.$row->user->image.'') }}')" class="w-8 h-8 coverImg rounded-full" alt="">
                                    <div class="text-lg">
                                        <p class="text-cyan-500">
                                            {{ $row->user->name }}
                                        </p>
                                    </div>
                                    <p class="text-xs">{{ $row->created_at->diffForHumans() }}</p>
                                </div>
                                <div>
                                    @auth
                                        @if(Auth::id() == $row->user_id)
                                            <form action="{{ route('message.destroy', ['id'=>$row->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="focus:outline-none"><i class="fas fa-times"></i></button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>    
                            </div>
                            <p class="text-gray-100/40 text-sm my-3">
                                {{ $row->message }}
                            </p>
                        </div>
                    @endforeach
                </div>
                @auth
                    <form method="post" action="{{ route('message.store') }}">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}" id="">
                        <input type="text" class="py-2 px-2 focus:outline-none color w-full rounded mt-3" placeholder="write message" name="message" id="">
                    </form>
                @endauth

            </div>
        </div>
        <div class="w-3/12">
            <div class="rounded overflow-hidden text-white">
                <div class="p-4 uppercase boxColor font-bold">
                    PARTICIPANTS <span class="text-cyan-400 text-xs">({{ count($room->particpanties) }} Joined)</span>
                </div>
                <div class="mainColor p-2 h-screen overflow-y-scroll">
                    <div class="p-2">
                        @foreach ($room->particpanties as $row)
                                <div class="flex items-center my-2 justify-between">
                                    <div>
                                        <div class="flex items-center space-x-3">
                                            <img style="background-image:url('/images/{{ $row->user->image }}')" class="w-10 h-10 coverImg rounded-full" alt="">
                                            <div class="text-sm">
                                                <p class="text-sm">
                                                    {{ $row->user->name }}
                                                </p>
                                                <a href="{{ route('profile', ['id'=>$row->user->id]) }}" class=" text-cyan-500">
                                                    {{ $row->user->email }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection