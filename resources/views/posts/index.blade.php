@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <form action="{{ route('posts') }}" method="post">
              @csrf
                <div class="mb-4">
                    <label for="body" class="sr-only">Body</label>
                    <textarea name="body" id="body" cols="30" rows="3"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                        placeholder="Put something in here"></textarea>
                    @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium mb-4">Post</button>
            </form>

            @if ($posts->count())
                @foreach ($posts as $post)
                {{-- here we are using components to make the original code reusable and not to make the same mark up over and over again the component is in the folder view/components/index.blade.php --}}
                    <x-post :post="$post" />
                @endforeach

                {{$posts->links()}}
            @else
                <p>There are no post</p>
            @endif

        </div>
    </div>
@endsection
