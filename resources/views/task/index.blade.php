
<x-app-layout>
  <x-slot name="header">
    <span class="inline">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      @if(Request::path() !== 'task/mypage')
      {{ __('Task List') }}
      @else
      {{$name}}
      @endif
      </h2>
   
  </span>
  </x-slot>
  

  <div class="py-1">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
          <table class="text-center w-full border-collapse">
            <tbody>
              @foreach ($tasks as $task)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                  @if(Request::path() !== 'task/mypage')
                  <a href="{{ route('user.show',$task->user->id) }}"><p class="text-sm text-left text-gray-dark dark:text-gray-200">{{$task->user->name}} </p></a>
                  @endif
                  <a href="{{ route('task.show',$task->id) }}">
                    <h3 class="text-xl text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$task->task}}</h3> </a>
                    <p class="text-xs text-left font-bold text-lg text-gray-dark dark:text-gray-200">Created at: {{$task->created_at->format('Y-m-d')}}</p>
                    @if($task->completed==1)
                    <p class="text-xs text-left font-bold text-lg text-green-400 dark:text-green-400">Completed at {{$task->completed_at}}</p>
                    @else
                    <p class="text-sm text-left font-bold text-lg text-red-400 dark:text-red-400">Incomplete</p>
                    @endif
                    @if($task->created_at !== $task->updated_at)
                    <p class="text-xs text-left font-bold text-lg text-gray-dark dark:text-gray-500">(Edited)</p>
                    @endif
                    
                 
                  
                </td>
              </tr>

              @endforeach
            </tbody>
          </table>
          @if ($tasks->count())
          <nav align="center" class='py-1 mb-1'>
            {{ $tasks->links() }}
          </nav>
          @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

