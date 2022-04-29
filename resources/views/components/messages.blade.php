<div class="rounded overflow-hidden text-white">
    <div class="p-2 uppercase boxColor font-bold">
        recent activites
    </div>
    <div class="mainColor p-2 grid gap-y-5">
        @foreach ($messages as $row)
            <div class="p-4 border rounded border-gray-100/30">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center space-x-3">
                            <img style="background-image:url('/images/<%= element.user.dataValues.image %>')" class="w-8 h-8 coverImg rounded-full" alt="">
                            <div class="text-sm">
                                <p>
                                    <a href="{% url 'profile' message.user.id %}">
                                        {{ $row->user->name }}
                                    </a>
                                </p>
                                <p class="text-xs">
                                    {{ $row->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                       @auth
                            @if(Auth::id() == $row->user->id)
                                <form method="POST" action="{{ route('message.destroy', ['id'=>$row->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button>
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            @endif
                     @endauth
                    </div>
                </div>
                <p class="text-sm mt-4 text-gray-100/50">replaied to post <a class="text-cyan-400" href="{{ route('show', ['room'=>$row->room_id]) }}">{{ $row->room->title }}</a></p>
                <div class="bodyColor mt-1 text-gray-100/70 rounded p-2 text-xs">
                    {{ $row->message }}
                </div>
            </div>
        @endforeach
    </div>
</div>