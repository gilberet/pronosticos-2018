<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateacumuladoRequest;
use App\Http\Requests\UpdateacumuladoRequest;
use App\Repositories\acumuladoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class acumuladoController extends AppBaseController
{
    /** @var  acumuladoRepository */
    private $acumuladoRepository;

    public function __construct(acumuladoRepository $acumuladoRepo)
    {
        $this->acumuladoRepository = $acumuladoRepo;
    }

    /**
     * Display a listing of the acumulado.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->acumuladoRepository->pushCriteria(new RequestCriteria($request));
        $acumulados = $this->acumuladoRepository->all();

        return view('acumulados.index')
            ->with('acumulados', $acumulados);
    }

    /**
     * Show the form for creating a new acumulado.
     *
     * @return Response
     */
    public function create()
    {
        return view('acumulados.create');
    }

    /**
     * Store a newly created acumulado in storage.
     *
     * @param CreateacumuladoRequest $request
     *
     * @return Response
     */
    public function store(CreateacumuladoRequest $request)
    {
        $input = $request->all();

        $acumulado = $this->acumuladoRepository->create($input);

        Flash::success('Acumulado saved successfully.');

        return redirect(route('acumulados.index'));
    }

    /**
     * Display the specified acumulado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $acumulado = $this->acumuladoRepository->findWithoutFail($id);

        if (empty($acumulado)) {
            Flash::error('Acumulado not found');

            return redirect(route('acumulados.index'));
        }

        return view('acumulados.show')->with('acumulado', $acumulado);
    }

    /**
     * Show the form for editing the specified acumulado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $acumulado = $this->acumuladoRepository->findWithoutFail($id);

        if (empty($acumulado)) {
            Flash::error('Acumulado not found');

            return redirect(route('acumulados.index'));
        }

        return view('acumulados.edit')->with('acumulado', $acumulado);
    }

    /**
     * Update the specified acumulado in storage.
     *
     * @param  int              $id
     * @param UpdateacumuladoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateacumuladoRequest $request)
    {
        $acumulado = $this->acumuladoRepository->findWithoutFail($id);

        if (empty($acumulado)) {
            Flash::error('Acumulado not found');

            return redirect(route('acumulados.index'));
        }

        $acumulado = $this->acumuladoRepository->update($request->all(), $id);

        Flash::success('Acumulado updated successfully.');

        return redirect(route('acumulados.index'));
    }

    /**
     * Remove the specified acumulado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $acumulado = $this->acumuladoRepository->findWithoutFail($id);

        if (empty($acumulado)) {
            Flash::error('Acumulado not found');

            return redirect(route('acumulados.index'));
        }

        $this->acumuladoRepository->delete($id);

        Flash::success('Acumulado deleted successfully.');

        return redirect(route('acumulados.index'));
    }
}
