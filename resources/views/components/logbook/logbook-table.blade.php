<div class="container-fluid bg-light border-radius p-2 shadow">
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">date</th>
                <th scope="col">aircraft</th>
                <th scope="col">departure time</th>
                <th scope="col">departure place</th>
                <th scope="col">arrival time</th>
                <th scope="col">arrival place</th>
                <th scope="col">total flight time</th>
                <th scope="col">take offs</th>
                <th scope="col">landings</th>
                <th scope="col">type of flight</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        @foreach ($logbooks as $logbook)
        <tbody>
            <tr>
                <th scope="row">{{$logbook->date}}</th>
                <td>{{$logbook->aircraft}}</td>
                <td>{{Carbon\Carbon::parse($logbook->departure_time)->format('H:i')}}</td>
                <td>{{$logbook->departure_place}}</td>
                <td>{{Carbon\Carbon::parse($logbook->arrival_time)->format('H:i')}}</td>
                <td>{{$logbook->arrival_place}}</td>
                <td>{{Carbon\Carbon::parse($logbook->total_flight_time)->format('H:i')}}</td>
                <td>{{$logbook->take_offs}}</td>
                <td>{{$logbook->landings}}</td>
                <td>{{$logbook->type_of_flight}}</td>
                <td><button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#notesModal_{{$logbook->id}}">notes</button></td>
                <td><button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                        data-target="#updateModal_{{$logbook->id}}">edit</button></td>
                <td>
                    <form action="{{route('logbook-delete', $logbook->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">x</button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <div class="container" style="width: 190px">{{$logbooks->links()}}</div>
</div>

@component('components.logbook.notes', ['logbooks' => $logbooks])
@endcomponent

@component('components.logbook.update.modal', ['logbooks' => $logbooks])
@endcomponent