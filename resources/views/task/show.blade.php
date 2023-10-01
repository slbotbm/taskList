<head>
<script>
            function myFunction() {
                var copyText = document.getElementById("myInput");
                copyText.select();
                copyText.setSelectionRange(0, 99999); 
                navigator.clipboard.writeText(copyText.value);
                alert("Link to task copied to clipboard");
            } 
        </script>
</head>
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('Task Details') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800">
          <div class="mb-6">
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Creator</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="task">
                <a href="{{ route('user.show',$task->user->id) }}">{{$task->user->name}}</a>
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Task</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="task">
                {{$task->task}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Description</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="description">
                {{$task->description}}
              </p>
            </div>
            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">Status</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="status">
                @if($task->completed==true)
                {{__('Completed at ') }}{{$task->completed_at}}
                @else
                {{__('Incomplete')}}
                @endif
              </p>
            </div>
            @if($task->user_id === Auth::user()->id)
            <div class="flex">  
                    <form action="{{ route('task.edit',$task->id) }}" method="GET" class="text-left">
                      @csrf
                      <div class="flex items-center justify-end mt-4">
                      <x-primary-button class="ml-3">
                        Edit
                      </x-primary-button>
</div>
                    </form>
                    
                    <form action="{{ route('task.destroy',$task->id) }}" method="POST" class="text-left">
                      @method('delete')
                      @csrf
                      <div class="flex items-center justify-end mt-4">
                      <x-primary-button class="ml-3">
                        Delete
                      </x-primary-button>
                      
                    </form>
</div>
                    <form action="{{ route('task.toggle',$task->id) }}" method="POST" class="text-left">
                      @method('put')
                      @csrf
                      <div class="flex items-center justify-end mt-4">
                      <x-primary-button class="ml-3">
                        @if($task->completed == false)
                        Mark as complete
                        @else
                        Mark as not complete
                      @endif
                      </x-primary-button>
                    </form>
</div>
<input class="hidden" type="text" value="{{url()->current()}}" id="myInput">
                  </div>
            @endif
            <div class="flex items-center justify-end mt-4">
                      <x-secondary-button class="ml-3" onclick="myFunction()">
                        Share
                      </x-primary-button>
</div>
            <div class="flex items-center justify-end mt-4">
            <a href="{{ url()->previous() }}">
              <x-secondary-button class="ml-3">
                {{ __('Back') }}
              </x-primary-button>
            </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>



