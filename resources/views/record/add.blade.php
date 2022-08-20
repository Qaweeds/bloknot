<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Добавить Запись') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('record.store')}}" method="post">
                        @csrf
                        <div class="flex">
                            <div class="flex items-center mr-5">
                                <input checked id="inline-radio" type="radio" value="{{\App\Models\People::NEW}}" name="client" class="w-4 h-4
                                text-blue-600
                                bg-gray-100
                                border-gray-300
                                focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="inline-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Новый</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input id="inline-2-radio" type="radio" value="{{\App\Models\People::EXISTS}}" name="client" class="w-4 h-4
                                text-blue-600 bg-gray-100
                                border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="inline-2-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Выбрать из
                                    списка</label>
                            </div>
                        </div>
                        <div id="record-add-form">
                            @include('components.record.add.new')
                        </div>
                        <x-button>
                            {{ __('Добавить') }}
                        </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
