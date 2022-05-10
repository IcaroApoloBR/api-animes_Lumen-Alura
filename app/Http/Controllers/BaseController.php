<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    protected $class;

    public function index(Request $request)
    {
        return $this->class::paginate($request->per_page);
    }

    public function store(Request $request)
    {
        return response()
            ->json($this->class::create($request->all()), 201); //created
    }

    public function show(int $id)
    {
        $resource = $this->class::find($id);
        if (is_null($resource)) {
            return response()->json('', 204); //no content
        }

        return response()->json($resource);
    }

    public function update(int $id, Request $request)
    {
        $resource = $this->class::find($id);
        if (is_null($resource)) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404); //not found
        }

        $resource->fill($request->all());
        $resource->save();

        return $resource;
    }

    public function destroy($id)
    {
        $qtdResourceRemoved = $this->class::destroy($id);
        if ($qtdResourceRemoved === 0) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }

        return response()->json(['', 204]);
    }
}
