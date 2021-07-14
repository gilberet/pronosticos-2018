<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFasesgrupoRequest;
use App\Http\Requests\UpdateFasesgrupoRequest;
use App\Repositories\FasesgrupoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\equipos;

class FasesgrupoController extends AppBaseController
{
    /** @var  FasesgrupoRepository */
    private $fasesgrupoRepository;

    public function __construct(FasesgrupoRepository $fasesgrupoRepo)
    {
        $this->fasesgrupoRepository = $fasesgrupoRepo;
    }

    /**
     * Display a listing of the Fasesgrupo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->fasesgrupoRepository->pushCriteria(new RequestCriteria($request));
        $fasesgrupos = $this->fasesgrupoRepository->all();

        return view('fasesgrupos.index')
            ->with('fasesgrupos', $fasesgrupos);
    }

    /**
     * Show the form for creating a new Fasesgrupo.
     *
     * @return Response
     */
    public function create()
    {
        $equipos = equipos::pluck('nombre', 'id');
        return view('fasesgrupos.create')->with('equipos', $equipos);
    }

    /**
     * Store a newly created Fasesgrupo in storage.
     *
     * @param CreateFasesgrupoRequest $request
     *
     * @return Response
     */
    public function store(CreateFasesgrupoRequest $request)
    {
        $input = $request->all();

        $fasesgrupo = $this->fasesgrupoRepository->create($input);

        Flash::success('Fasesgrupo saved successfully.');

        return redirect(route('fasesgrupos.index'));
    }

    /**
     * Display the specified Fasesgrupo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fasesgrupo = $this->fasesgrupoRepository->findWithoutFail($id);

        if (empty($fasesgrupo)) {
            Flash::error('Fasesgrupo not found');

            return redirect(route('fasesgrupos.index'));
        }

        return view('fasesgrupos.show')->with('fasesgrupo', $fasesgrupo);
    }

    /**
     * Show the form for editing the specified Fasesgrupo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fasesgrupo = $this->fasesgrupoRepository->findWithoutFail($id);
        $equipos = equipos::pluck('nombre', 'id');

        if (empty($fasesgrupo)) {
            Flash::error('Fasesgrupo not found');

            return redirect(route('fasesgrupos.index'));
        }

        return view('fasesgrupos.edit')->with('fasesgrupo', $fasesgrupo)->with('equipos', $equipos);
    }

    /**
     * Update the specified Fasesgrupo in storage.
     *
     * @param  int              $id
     * @param UpdateFasesgrupoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFasesgrupoRequest $request)
    {
        $fasesgrupo = $this->fasesgrupoRepository->findWithoutFail($id);

        if (empty($fasesgrupo)) {
            Flash::error('Fasesgrupo not found');

            return redirect(route('fasesgrupos.index'));
        }

        $fasesgrupo = $this->fasesgrupoRepository->update($request->all(), $id);

        Flash::success('Fasesgrupo updated successfully.');

        return redirect(route('fasesgrupos.index'));
    }

    /**
     * Remove the specified Fasesgrupo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fasesgrupo = $this->fasesgrupoRepository->findWithoutFail($id);

        if (empty($fasesgrupo)) {
            Flash::error('Fasesgrupo not found');

            return redirect(route('fasesgrupos.index'));
        }

        $this->fasesgrupoRepository->delete($id);

        Flash::success('Fasesgrupo deleted successfully.');

        return redirect(route('fasesgrupos.index'));
    }
}
