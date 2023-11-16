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
            <th>Service</th>
            <th>Status</th>
            <th>Status code</th>
            <th>Message</th>
            <th>Log level</th>
            <th>Request details</th>
        </thead>

        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>
                        Authorization
                    </td>

                    <td>
                        {{ $log->success ? 'success' : 'failed' }}
                    </td>

                    <td>
                        {{ $log->status_code }}
                    </td>

                    <td>
                        {{ $log->message }}
                    </td>

                    <td>
                        {{ $log->log_level }}
                    </td>

                    <td>
                        {{ $log->request_details }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>



