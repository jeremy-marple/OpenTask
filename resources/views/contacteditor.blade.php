@extends('updatecontact')


@section('counter')
Contacts
@endsection

@section('taskfeed')

@foreach($contact as $contacts)



  <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
    <div class="w-0 flex-1 flex items-center">
      <!-- Heroicon name: solid/paper-clip -->
      <!--<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-person-rolodex" viewBox="0 0 21 21">
        <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
        <path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1H1Zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1V2Z"/>
      </svg>-->
      <span class="ml-2 flex-1 w-0 truncate"> <h4 class="text-lg font-bold leading-6 text-black-900">{{ $contacts->firstname }} {{$contacts->lastname}}</h4> ({{ $contacts->email }})</span>
    </div>
    <div class="ml-4 flex-shrink-0">
      <a href="../../contact/delete/{{ $contacts->id }}" class="font-medium text-indigo-600 hover:text-indigo-500"> Delete </a>
    </div>
  </li>
@endforeach

@endsection
