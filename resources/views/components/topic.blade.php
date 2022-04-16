<p class=" mainColorText uppercase ">browse topics</p>
<div class="grid gap-y-8 text-white mt-5">
    <a  href="/" class="flex items-center justify-between">
        <p>All</p>
        <div class="mainColor px-3 py-1 rounded">
            {{ $rooms }}
        </div>
    </a>
    @foreach ($topics as  $row)
        <a href="/?q={{ $row->name }}" class="flex items-center hover:text-cyan-400 justify-between">
            <p>{{ $row->name }}</p>
            <div class="mainColor px-3 py-1 rounded">
                {{ $row->rooms_count }}
            </div>
        </a>
    @endforeach
 
</div>