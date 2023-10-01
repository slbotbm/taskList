
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
      {{ __('Contributor List') }}
    </h2>
  </x-slot>
   
  <div class="py-1">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
          <table class="text-center w-full border-collapse">
            <tbody>
              @foreach ($users as $user)
              <tr class="hover:bg-gray-lighter">
                <td class="py-4 px-6 border-b border-gray-light dark:border-gray-600">
                  <a href="{{ route('user.show',$user->id) }}">
                    
                    <h3 class="text-xl text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$user->name}}</h3></a>
                    <h3 class="text-xs text-left font-bold text-lg text-gray-dark dark:text-gray-200">{{$user->email}}</h3>
                    <h3 class="text-xs text-left font-bold text-lg text-gray-dark dark:text-gray-200">User since: {{$user->created_at->format('Y-m-d')}}</h3>
                    
                  
                  
                </td>
              </tr>
              

              @endforeach
            </tbody>
          </table>
           @if ($users->count())
            <nav align="center" class='py-1 mb-1'>
              {{ $users->links() }}
            </nav>
            @endif
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

