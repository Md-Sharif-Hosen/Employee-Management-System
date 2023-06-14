<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

    <div class="input-group justify-content-lg-end">
        <form class="my-2" type="get" action="{{ route('bus.search') }}">
            {{-- <div class="d-flex gap-lg-2"> --}}

                <div>
                    <label for="">Availabe Bus</label>
                 <input type="time" class="form-control" name="bus_in">
                </div>

                <button class="btn btn-success btn-sm"  type="submit">Search</button>
            </div>
        </form>
<Table class="table table-striped">
    <thead>
        <tr>
            <th>Car name</th>
            <th>Car Model</th>
            <th>Driver</th>
            {{-- <th>Start Time</th>
            <th>End Time</th> --}}

        </tr>
    </thead>

    <tbody>
        @foreach ($bus_data as $data )
        <tr>
            <td>{{ $data->title }}</td>
            <td>{{ $data->bus_model }}</td>
            @if ($data->driver_info)

            <td>{{ $data->driver_info->name }}</td>
            {{-- <td>{{ $data->bus_start_time }}</td>
            <td>{{ $data->bus_out_time }}</td> --}}
            @endif
        </tr>
        @endforeach
    </tbody>


</Table>

    </div>
</body>
</html>
