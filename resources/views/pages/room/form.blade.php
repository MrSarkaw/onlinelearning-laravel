@extends('layouts.app')
@section('content')

<form method="post"  action="{{ route('store') }}">
    @csrf
    <div class=" flex mt-10 justify-center">
        <div class="w-5/12 rounded-lg text-white mainColor overflow-hidden">
            <div class="p-4 uppercase boxColor font-bold">
               <button  onclick="window.history.back()" class="focus:outline-none"><i class="fas fa-arrow-left"></i></button> Form Room Create/update
            </div>
            <div class="py-10 px-5">
                <div>
                    <p>Room Name</p>
                    <input value="{{ old('title') }}" name="title" class="bg-transparent p-2 w-full  focus:outline-none rounded border border-gray-100/20" type="text"  id="">

                </div>
                <div class="mt-5">
                    Topic
                    <input type="text" value="{{ old('topic') }}" name="topic" list="topic" class="bg-transparent p-2 w-full  focus:outline-none rounded border border-gray-100/20">
                    <datalist id="topic">
                        <select>
                            @foreach ($topics as $topic)
                                <option value="{{ $topic->name }}">{{ $topic->name }}</option>
                            @endforeach
                        </select>
                    </datalist>                    
                </div>
                <div class="mt-5">
                    <p>Description</p>
                    <input value="{{ old('description') }}"  class="bg-transparent p-2 w-full  focus:outline-none rounded border border-gray-100/20" type="text" name="description" id="">

                </div>

                <div class="text-right mt-10">
                    <button onclick="window.history.back()"  class="bg-gray-500 px-4 py-2 rounded  text-white mx-4">back</button>
                    <button  class="bg-cyan-500 px-4 py-2 rounded text-gray-700">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection