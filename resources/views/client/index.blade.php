<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Все клиенты' }}
            </h2>
            <p>Общий долг: {{$clients->sum('credit')}}</p>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-session-status class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert" :status="session('status')"/>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Имя
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Долг
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Добавить запись
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <a href="{{route('record.people', $client->name)}}" class="font-medium text-blue-600
                                        dark:text-blue-500
                                        hover:underline">{{$client->name}}</a>
                                    </th>
                                    <td class="py-4 px-6">
                                        {{$client->credit}}
                                    </td>
                                    <td class="py-4 px-6">
                                        @include('components.record.add.client', ['id' => $client->id])
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
