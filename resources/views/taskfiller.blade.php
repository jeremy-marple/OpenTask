@extends('tasks')

@section('counter')
You have {{ $counts }} open tasks
@endsection

@section('templatefiller')
@foreach($templates as $template)
<option value="{{ $template->id }}">{{ $template->title }}</option>
@endforeach
@endsection

@section('contactfiller')
@foreach($contacts as $contact)
<option value="{{ $contact->id }}">{{ $contact->firstname }} {{ $contact->lastname }}</option>
@endforeach
@endsection

@section('taskfeed')

@foreach($tasks as $task)
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
<ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
              <div class="w-0 flex-1 flex items-center">
                <!-- Heroicon name: solid/paper-clip -->
                <!--<svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                </svg>-->
                <span class="ml-2 flex-1 w-0 truncate"><h4 class="text-xl leading-6 font-bold text-black-900"><a href="task/edit/{{ $task->id }}">{{ $task->title }}</a></h4>{{ $task->content }}<!--{{ $task->created_at->diffForHumans() }}--></span>
              </div>
              <div class="ml-4 flex-shrink-0">
              <a href="deletetask/{{ $task->id }}"><button type="submit" class="group relative flex justify-center py-2 px-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">

<svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-check-all" viewBox="0 0 16 16">
  <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
</svg>
        </button></a>
              </div>
            </li>
          </ul>
</div>
<br>
@endforeach

@endsection
