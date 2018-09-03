<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVirtualRequest;
use App\Http\Requests\UpdateVirtualRequest;
use App\Repositories\VirtualRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VirtualController extends AppBaseController
{
    /** @var  VirtualRepository */
    private $virtualRepository;

    public function __construct(VirtualRepository $virtualRepo)
    {
        $this->virtualRepository = $virtualRepo;
    }

    /**
     * Display a listing of the Virtual.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->virtualRepository->pushCriteria(new RequestCriteria($request));
        $virtuals = $this->virtualRepository->all();

        return view('virtuals.index')
            ->with('virtuals', $virtuals);
    }

    /**
     * Show the form for creating a new Virtual.
     *
     * @return Response
     */
    public function create()
    {
        return view('virtuals.create');
    }

    /**
     * Store a newly created Virtual in storage.
     *
     * @param CreateVirtualRequest $request
     *
     * @return Response
     */
    public function store(CreateVirtualRequest $request)
    {
        $input = $request->all();

        $virtual = $this->virtualRepository->create($input);

        Flash::success('Virtual saved successfully.');

        return redirect(route('virtuals.index'));
    }

    /**
     * Display the specified Virtual.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $virtual = $this->virtualRepository->findWithoutFail($id);

        if (empty($virtual)) {
            Flash::error('Virtual not found');

            return redirect(route('virtuals.index'));
        }

        return view('virtuals.show')->with('virtual', $virtual);
    }

    /**
     * Show the form for editing the specified Virtual.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $virtual = $this->virtualRepository->findWithoutFail($id);

        if (empty($virtual)) {
            Flash::error('Virtual not found');

            return redirect(route('virtuals.index'));
        }

        return view('virtuals.edit')->with('virtual', $virtual);
    }

    /**
     * Update the specified Virtual in storage.
     *
     * @param  int              $id
     * @param UpdateVirtualRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVirtualRequest $request)
    {
        $virtual = $this->virtualRepository->findWithoutFail($id);

        if (empty($virtual)) {
            Flash::error('Virtual not found');

            return redirect(route('virtuals.index'));
        }

        $virtual = $this->virtualRepository->update($request->all(), $id);

        Flash::success('Virtual updated successfully.');

        return redirect(route('virtuals.index'));
    }

    /**
     * Remove the specified Virtual from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $virtual = $this->virtualRepository->findWithoutFail($id);

        if (empty($virtual)) {
            Flash::error('Virtual not found');

            return redirect(route('virtuals.index'));
        }

        $this->virtualRepository->delete($id);

        Flash::success('Virtual deleted successfully.');

        return redirect(route('virtuals.index'));
    }
}
