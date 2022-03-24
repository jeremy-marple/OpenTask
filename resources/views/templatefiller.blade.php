@extends('templates')


@section('counter')
Templates
@endsection

@section('taskfeed')

@foreach($template as $templates)
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
  <div class="px-4 py-5 sm:px-6">
    <h3 class="text-2xl leading-6 font-medium text-black-900">{{ $templates->title }}</h3>
    <p class="mt-1 max-w-2xl text-sm text-black-500"> {{ $templates->content }}</p>
  </div>
  <div class="border-t border-gray-200">
    <dl>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <a href="template/edit/{{ $templates->id }}">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Edit Template</button>
            </a>
        </div>
    </dl>
  </div></div><br>
@endforeach

@endsection
