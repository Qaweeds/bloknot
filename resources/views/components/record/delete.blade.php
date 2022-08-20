<form class="w-full max-w-sm" action="{{route('record.delete', $id)}}" method="post">
    @csrf
    @method('DELETE')
    <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-red-700 text-sm border-4 text-white py-1 px-2
        rounded" type="submit">
        Удалить
    </button>
</form>
