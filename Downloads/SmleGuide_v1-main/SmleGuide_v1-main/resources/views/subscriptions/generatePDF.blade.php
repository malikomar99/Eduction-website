<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF Document</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            margin: 30px;
        }

        h1,
        h2,
        h3 {
            color: #2c3e50;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table,
        th,
        td {
            border: 1px solid #cccccc;
        }

        th,
        td {
            padding: 8px 10px;
            text-align: left;
        }

        .footer {
            position: fixed;
            bottom: 20px;
            text-align: center;
            font-size: 12px;
            color: #999999;
        }

        .image {
            display: flex;
            justify-content: center;
            text-align: center;
        }

    </style>
</head>

<body @isset($type) onload="printDoc()" @endisset>


    <div class="image">
        @isset($type)
        <img src="{{asset('images/logo-dark.png') }}" alt="" width="100">

        @endisset
        <img src="{{public_path('images/logo-dark.png') }}" alt="" width="100">
    </div>
    <h2>Report</h2>
    <table>

        </thead>
        <tbody>

            <tr>
                <th>User Name</th>
                <td>{{ $subscription->user->name }}</td>
            </tr>
            <tr>
                <th>User Picture</th>
                <td>
                    @isset($type)
                        <img class="rounded-circle" src="{{asset( $subscription->user->profile_picture) }}" alt="" width="100">
                    @endisset
                    <img class="rounded-circle" src="{{public_path( $subscription->user->profile_picture) }}" alt="" width="100">
                </td>
            </tr>
            <tr>
                <th>Country</th>
                <td>{{ $subscription->user->country }}</td>
            </tr>
            <tr>
                <th>User Email</th>
                <td>{{ $subscription->user->email }}</td>
            </tr>
            <tr>
                <th>User Mobile</th>
                <td>{{ $subscription->user->mobile }}</td>
            </tr>
            <tr>
                <th>Category </th>
                <td>{{ $subscription->file->course->category->name }}</td>
            </tr>
            <tr>
                <th>Course </th>
                <td>{{ $subscription->file->course->title }}</td>
            </tr>
            <tr>
                <th>Course Purchase Date</th>
                <td>{{ $subscription->purchase_date }}</td>
            </tr>
            <tr>
                <th>Course Expiry Date</th>
                <td>{{ $subscription->expiry_date }}</td>
            </tr>
            <tr>
                <th>Payment method</th>
                <td>{{$subscription->payment_method?? ""  }}</td>
            </tr>
            <tr>
                <th>Payment Slip</th>
                <td>
                    @if($subscription->payment_slip)
                    @isset($type)

                    <img width="100" src="{{ asset($subscription->payment_slip) }}" alt="image not found">
                    @endisset
                    <img width="100" src="{{ public_path($subscription->payment_slip) }}" alt="image not found">


                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        {{ env('APP_NAME') }} | {{ date('Y') }}
    </div>
    <script>
        function printDoc() {
            window.print();
        }
        window.onafterprint = function() {
            window.history.back(); // or window.location.href = 'your-url';
        };

    </script>
</body>
</html>
