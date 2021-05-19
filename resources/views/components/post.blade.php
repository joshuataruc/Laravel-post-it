@props(['post' => $post])

<div class="mb-4">
    <a href="{{route('user.posts', $post->user)}}" class="font-bold">{{ucfirst($post->user->name)}} <span class="text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</span></a>
    {{-- diffForHuamans is a formatting method for dates eg 5mins ago --}}

    <p class="mb-2">{{$post->body}}</p>

    
    @can('delete', $post)
        <form action="{{route('posts.destroy', $post)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    @endcan
        <div class=" flex items-center">
            @auth
                @if(!$post->likedBy(auth()->user()))
                    <form action="{{route('posts.like', $post)}}" method="post" class="mr-1">
                        @csrf
                        <button type="submit" class="text-blue-500"> Like</button>
                    </form>
                    @else
                    <form action="{{route('posts.like', $post)}}" method="post" class="mr-1">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="text-blue-500"> Unlike</button>
                    </form>
                @endif

            @endauth
        <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}  </span>
    </div>

</div>