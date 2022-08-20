<?php

namespace App\Http\Controllers;

use App\Http\Requests\Record\NewRecordRequest;
use App\Models\People;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class RecordController extends Controller
{
    public function index()
    {

    }

    public function add()
    {
        return view('record.add');
    }

    public function store(NewRecordRequest $request)
    {
        if ($request->save()) {
            return redirect()->route('index')->with(['status' => 'Запись добавлена']);
        }
        return back()->withErrors(['msg' => 'Не сохранено']);
    }

    public function view(People $people)
    {
        $records = $people->records()->where('user_id', auth()->id())->get();

        return view('record.view', compact('people', 'records'));
    }

    public function getFormView(Request $request)
    {
        $client = (int)$request->client;
        if ($client === People::NEW) return view('components.record.add.new');
        if ($client === People::EXISTS) return view('components.record.add.exists',
            ['clients' => auth()->user()->clients()->select(['people_id', 'name'])->distinct()->get()->toArray()]);

        abort(404);
    }

    public function delete(Record $record)
    {
        if ($record->delete()) {
            return back()->with(['status' => 'Удалено']);
        }

        return back()->withErrors(['msg' => 'Не удалено']);
    }
}
