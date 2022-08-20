<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Все записи') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Кто
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Когда
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Сколько
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Почем
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 {{$record->deleted_at ?'opacity-50' : ''}}">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <a href="{{route('record.people', $record->people->name)}}" class="font-medium text-blue-600
                                        dark:text-blue-500
                                        hover:underline">{{$record->people->name}}</a>
                                    </th>
                                    <td class="py-4 px-6">
                                        {{$record->created_at}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$record->quantity}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$record->price}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $records->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
