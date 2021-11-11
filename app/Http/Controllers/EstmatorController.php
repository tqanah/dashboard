<?php

namespace App\Http\Controllers;

use App\Estmator;
use App\Http\Resources\EstimateResource;
use Illuminate\Http\Request;

class EstmatorController extends Controller
{

    public function index()
    {

        $questions=Estmator::all();
        return view('dashboard.estimator.estimators',['questions'=>$questions]);
    }


    public function create()
    {


        return view('dashboard.estimator.create');

    }


    public function store(Request $request)
    {


        if ($request->type == 'MCQ') {
            for ($i = 0; $i < 4; $i++) {
                $data[] = ['answer' => $request->ans[0], 'cost' => $request->ansCost[0]];
            }

            Estmator::create([
                'question' => $request->question,
                'type' => $request->type,
                'ansMCQ' => json_encode($data),
                'order' => 1
            ]);
        } else {

            $data[] = ['answer' => 'yes', 'cost' => $request->costT];
            $data[] = ['answer' => 'no', 'cost' => $request->costF];

            Estmator::create([
                'question' => $request->question,
                'type' => $request->type,
                'ansMCQ' => json_encode($data),
                'order' => 1
            ]);
        }
        return redirect()->route('estimate.index');
    }


    public function show(Estmator $estmator)
    {
        return view('dashboard.estimator.index');

    }


    public function edit(Estmator $estmator)
    {
        //
    }


    public function update(Request $request, Estmator $estmator)
    {
        //
    }


    public function destroy(Estmator $estmator)
    {
        //
    }

    public function allQuest()
    {
       return EstimateResource::collection(Estmator::all());

    }
    public function quest($id)
    {

        return new EstimateResource(Estmator::find($id));
    }
}
