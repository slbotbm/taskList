
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('Search Results') }}
    </h2>
  </x-slot>
   @if($users->count()!== 0)
  <div class="py-1">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
                {{ __('Contributor Name Matches ') }}({{$users->count()}})
            </h2>
          <table class="text-center w-full border-collapse">
            <tbody>
              @foreach ($users as $user)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                  <a href="{{ route('user.show',$user->id) }}">
                    <h3 class="text-xl text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$user->name}}</h3></a>
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endif
  @if($ids->count()!== 0)
  <div class="py-1">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
                {{ __('Contributor Id Matches ') }}({{$ids->count()}})
            </h2>
          <table class="text-center w-full border-collapse">
            <tbody>
              @foreach ($ids as $id)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                  <a href="{{ route('user.show',$id->id) }}">
                    <h3 class="text-xs text-left font-bold text-lg text-gray-dark dark:text-gray-200">Id: {{$id->id}}</h3>
                    <h3 class="text-xl text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$id->name}}</h3></a>
                    

                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endif
  @if($tasks->count()!== 0)
  <div class="py-1">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
                {{ __('Task Name Matches ') }}({{$tasks->count()}})
            </h2>
          <table class="text-center w-full border-collapse">
            <tbody>
              @foreach ($tasks as $task)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                    
                  <a href="{{ route('task.show',$task->id) }}">
                    <h3 class="text-xl text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$task->task}}</h3></a>
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endif
@if($descriptions->count()!== 0)
  <div class="py-1">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
                {{ __('Task Description Matches ') }}({{$descriptions->count()}})
            </h2>
          <table class="text-center w-full border-collapse">
            <tbody>
              @foreach ($descriptions as $description)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                  <a href="{{ route('task.show',$description->id) }}">
                    <h3 class="text-xl text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$task->task}}</h3></a>
 
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endif
@if(!$tasks->count()&&!$descriptions->count()&&!$ids->count()&&!$users->count())
<div class="py-1">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
                {{ __('No Matches for given search term') }}
            </h2>
            <div class="flex items-center justify-end mt-4">
            <a href="{{ url()->previous() }}">
              <x-secondary-button class="ml-3">
                {{ __('Back') }}
              </x-primary-button>
            </a>
            </div>
@endif
</x-app-layout>

