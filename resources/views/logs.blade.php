<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #dddddd;
        }
    </style>

    <table>
        <thead>
            <th>Method</th>
            <th>Service</th>
            <th>Status</th>
            {{-- <th>Endpoint</th>
            <th>Payload</th> --}}
            {{-- <th>Error code</th> --}}
            <th>Message</th>
            <th>Actions</th>
        </thead>

        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>
                        {{ $log->method }}
                    </td>

                    <td>
                        {{ $log->service }}
                    </td>

                    <td>
                        {{ $log->status ? 'success' : 'failed' }}
                    </td>

                    {{-- <td>
                        <pre>{{ $log->endpoint }}</pre>
                    </td>

                    <td>
                        {{ $log->payload }}
                    </td> --}}

                    {{-- <td>
                        {{ $log->error_code }}
                    </td> --}}

                    <td>
                        {{ $log->message }}
                    </td>

                    <td>
                        <button>
                            View
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>



