<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $people->name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-auth-session-status class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert" :status="session('status')"/>
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>

                                <th scope="col" class="py-3 px-6">
                                    Когда
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Сколько
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Почем
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Сумма
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Удалить
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700 {{$record->deleted_at ?'opacity-50' : ''}}">

                                    <td class="py-4 px-6">
                                        {{$record->created_at}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$record->quantity}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$record->price}}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{$record->sum}}
                                    </td>
                                    <td class="py-4 px-6">
                                        @includeWhen(is_null($record->deleted_at), 'components.record.delete', ['id' => $record->id])
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="font-semibold text-gray-900 dark:text-white">
                                <th scope="row" class="py-3 px-6 text-base">Всего</th>
                                <td class="py-3 px-6">{{$people->recordsQuantity}}</td>
                                <td class="py-3 px-6"></td>
                                <td class="py-3 px-6">{{$people->recordsSum}}</td>
                            </tr>
                            <tr class="font-semibold text-gray-900 dark:text-white">
                                <th scope="row" class="py-3 px-6 text-base">Долг</th>
                                <td class="py-3 px-6"></td>
                                <td class="py-3 px-6"></td>
                                <td class="py-3 px-6">{{$people->credit}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
