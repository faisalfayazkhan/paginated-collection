<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Employee Collection Pagination!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card border-primary mb-3 mt-5">
                    <div class="card-header">Collection Pagination Example</div>
                    <div class="card-body text-primary">
                        <h5 class="card-title">Employees</h5>
                        <table class="table">
                            <th>#</th>
                            <th>Employee Name</th>
                            <tbody>
                                @forelse ($employees_collection as $employee_name)
                                    <tr>
                                        <td>{{ ($employees_collection->currentPage() - 1) * $employees_collection->perPage() + $loop->iteration }}
                                        </td>
                                        <td>{{ $employee_name }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">No employees found!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $employees_collection->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
