<div>
    <div class="grid gap-y-10 text-white mt-5">
        @foreach ($rooms as $row)    
            <div class="rounded-xl mainColor p-3">
                <div class="flex text-gray-100/70 items-center justify-between">
                    <div>
                        <a href="/profile/<%= element.user.dataValues.id %>" class="flex items-center space-x-3">
                            <img style="background-image:url('/images/{{ Auth::user()->image }}')" class="w-8 h-8 coverImg rounded-full" alt="">
                            <div class="text-sm">
                                <p>
                                   {{Auth::user()->name}}
                                </p>
                            
                            </div>
                        </a>
                    </div>
                    <div>
                        <p class="text-xs">
                            {{ $row->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
                <a class="text-xl mt-4" href="{{ route('show', ['room' => $row->id]) }}">{{ $row->title }}</a>
                <p class=" text-gray-100/70 mt-5 text-sm pb-5 border-b border-gray-100/30">
                    {{ $row->name }}
                </p>
                <div class="flex mt-4 text-sm text-gray-100/70 items-center justify-between">
                    <div>
                        <p>
                            <i class="fas fa-users"></i>    1 joiend
                        </p>
                    </div>
                    <div class=" flex space-x-2">
                    
                        <p class="bg-gray-500 px-4 rounded-full py-1">
                            {{ $row->topic->name }}
                        </p>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</div>