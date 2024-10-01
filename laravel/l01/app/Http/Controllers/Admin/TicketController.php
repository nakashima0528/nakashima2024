<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Repositories\TicketRepository;
use App\Http\Controllers\AppBaseController;
use Auth;
use Illuminate\Http\Request;
use Flash;
use Response;

class TicketController extends AppBaseController
{
    /** @var TicketRepository $ticketRepository*/
    private $ticketRepository;

    public function __construct(TicketRepository $ticketRepo)
    {
        $this->ticketRepository = $ticketRepo;
    }

    /**
     * Display a listing of the Ticket.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ticket = $this->ticketRepository->all()->sortByDesc("id");

        return view('admin.tickets.index')->with('tickets', $ticket);
    }

    /**
     * Show the form for creating a new Ticket.
     *
     * @return Response
     */
    public function create($user_id)
    {
        $user = $this->ticketRepository->findUser($user_id);
        return view('admin.tickets.create')->with('user', $user);
    }

    /**
     * Store a newly created Ticket in storage.
     *
     * @param CreateTicketRequest $request
     *
     * @return Response
     */
    public function store(CreateTicketRequest $request)
    {
        $input = $request->all();

        $ticket = $this->ticketRepository->create($input);

        Flash::success('Ticket saved successfully.');

        return redirect(route('tickets.show',$ticket->id));
    }

    /**
     * Display the specified Ticket.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ticket = $this->ticketRepository->find($id);
        $user = $this->ticketRepository->findUser($ticket->user_id);

        if (empty($ticket)) {
            Flash::error('Ticket not found');

            return redirect(route('admin-home'));
        }

        return view('admin.tickets.show')->with('ticket', $ticket)
                                         ->with('user', $user);
    }

    /**
     * Show the form for editing the specified Ticket.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ticket = $this->ticketRepository->find($id);
        $user = $this->ticketRepository->findUser($ticket->user_id);

        if (empty($ticket)) {
            Flash::error('Ticket not found');

            return redirect(route('admin-home'));
        }

        return view('admin.tickets.edit')->with('ticket', $ticket)
                                         ->with('user', $user);
    }

    /**
     * Update the specified Ticket in storage.
     *
     * @param int $id
     * @param UpdateTicketRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTicketRequest $request)
    {
        $ticket = $this->ticketRepository->find($id);

        if (empty($ticket)) {
            Flash::error('Ticket not found');

            return redirect(route('admin-home'));
        }

        $ticket = $this->ticketRepository->update($request->all(), $id);

        Flash::success('Ticket updated successfully.');

        return redirect(route('tickets.show',$ticket->id));
    }

    /**
     * Remove the specified Ticket from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ticket = $this->ticketRepository->find($id);

        if (empty($ticket)) {
            Flash::error('Ticket not found');

            return redirect(route('admin-home'));
        }

        $this->ticketRepository->delete($id);

        Flash::success('Ticket deleted successfully.');

        return redirect(route('users.show', [$ticket->user_id]));
    }
}
