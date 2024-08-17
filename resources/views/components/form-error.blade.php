@props(['name'])

@error($name)
<li class="text-red-500 text-xs">{{$message}} </li>
@enderror

