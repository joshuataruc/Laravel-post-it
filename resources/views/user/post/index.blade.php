@extends('layouts.app')

@section('content')
  <div class="flex justify-center">
    <div class="w-4/12">

      <div class="p-6">
        <h1 class="text-2xl font-medium mb-1">{{ucfirst($user->name)}}</h1>
        <p>Posted {{$posts->count()}} {{Str::plural('post', $posts->count())}} and recieved {{$user->likes->count()}} likes</p>
      </div>
      <div class="bg-white p-6 rounded-lg">
        @if ($posts->count())
        @foreach ($posts as $post)
        {{-- here we are using components to make the original code reusable and not to make the same mark up over and over again the component is in the folder view/components/index.blade.php --}}
            <x-post :post="$post" />
        @endforeach

        {{$posts->links()}}
        @else
            <p>{{$user->name}} does not have any post</p>
        @endif
    </div>
  </div>
@endsection