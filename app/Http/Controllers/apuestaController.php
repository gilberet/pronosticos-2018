<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateapuestaRequest;
use App\Http\Requests\UpdateapuestaRequest;
use App\Models\acumulado;
use App\Models\Fasesgrupo;
use App\User;
use App\Repositories\apuestaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class apuestaController extends AppBaseController
{
    /** @var  apuestaRepository */
    private $apuestaRepository;

    public function __construct(apuestaRepository $apuestaRepo)
    {
        $this->apuestaRepository = $apuestaRepo;
    }

    /**
     * Display a listing of the apuesta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->apuestaRepository->pushCriteria(new RequestCriteria($request));
        $apuestas = $this->apuestaRepository->all();
        $ids = acumulado::max('id');
        $acumulado = acumulado::where('id', $ids)->first();
        $fasesgrupos = Fasesgrupo::where('estado','<>', 3)
//            ->where('deleted_at', '<>', null)
//            ->where('fecha', '=', now()->toDa teString())
            ->orderBy('fecha', 'asc')
        ->get()
        ;


        return view('apuestas.index')
            ->with('acumulado', $acumulado)
            ->with('apuestas', $apuestas)
            ->with('fasesgrupos', $fasesgrupos);
    }

    /**
     * Show the form for creating a new apuesta.
     *
     * @return Response
     */
    public function create()
    {
        $apuestas = $this->apuestaRepository->all();
        $fasesgrupos = Fasesgrupo::where('estado','<>',3)
//            ->where('deleted_at', '<>', null)
//            ->where('fecha', '=', now()->toDa teString())
            ->orderBy('fecha', 'asc')
            ->get();

        $users = User::pluck('name','id');
        return view('apuestas.create')->with('fasesgrupos', $fasesgrupos)->with('users', $users)->with('apuestas', $apuestas);
    }

    /**
     * Store a newly created apuesta in storage.
     *
     * @param CreateapuestaRequest $request
     *
     * @return Response
     */
    public function store(CreateapuestaRequest $request)
    {
        $input = $request->all();

        $fasegrupo = Fasesgrupo::findOrFail($request->fasegrupo_id);

        if($fasegrupo->estado <> 0) {
            return redirect(route('apuestas.index'));
        }

        $apuesta = $this->apuestaRepository->create($input);


        Flash::success('Apuesta guardo correctamente.');

        return redirect(route('apuestas.index'));
    }

    /**
     * Display the specified apuesta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $apuesta = $this->apuestaRepository->findWithoutFail($id);

        if (empty($apuesta)) {
            Flash::error('Apuesta not found');

            return redirect(route('apuestas.index'));
        }

        return view('apuestas.show')->with('apuesta', $apuesta);
    }

    /**
     * Show the form for editing the specified apuesta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $apuesta = $this->apuestaRepository->findWithoutFail($id);

        if (empty($apuesta)) {
            Flash::error('Apuesta not found');

            return redirect(route('apuestas.index'));
        }

        return view('apuestas.edit')->with('apuesta', $apuesta);
    }

    /**
     * Update the specified apuesta in storage.
     *
     * @param  int              $id
     * @param UpdateapuestaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateapuestaRequest $request)
    {
        $apuesta = $this->apuestaRepository->findWithoutFail($id);

        if (empty($apuesta)) {
            Flash::error('Apuesta no encontrada');

            return redirect(route('apuestas.index'));
        }

        $apuesta = $this->apuestaRepository->update($request->all(), $id);

        Flash::success('Apuesta actualizada correctamente.');

        return redirect(route('apuestas.index'));
    }

    /**
     * Remove the specified apuesta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $apuesta = $this->apuestaRepository->findWithoutFail($id);

        if (empty($apuesta)) {
            Flash::error('Apuesta no encontrada');

            return redirect(route('apuestas.index'));
        }

        $fasegrupo = Fasesgrupo::findOrFail($apuesta->fasegrupo_id);

        if($fasegrupo->estado <> 0) {
            return redirect(route('apuestas.index'));
        }
        $this->apuestaRepository->delete($id);

        Flash::success('Apuesta eliminada Correctamente.');

        return redirect(route('apuestas.index'));
    }
}
