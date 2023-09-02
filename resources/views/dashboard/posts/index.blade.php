<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <x-slot name='nav'>
        <div class="space-x-4">
            <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                {{ __('Index') }}
            </x-nav-link>

            <x-nav-link href="{{ route('posts.create') }}" :active="request()->routeIs('posts.create')">
                        {{ __('Create') }}
            </x-nav-link>
        </div>
    </x-slot>

          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-ui.alerts></x-ui.alerts>
          </div>
        
      
      

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
            <div class="flex flex-col overflow-x-auto">
  <div class="sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
      <div class="overflow-x-auto">
  
        <livewire:post.index>


      </div>
    </div>
  </div>
</div>
            </div>
        </div>
    </div>
</x-app-layout>