<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<!-- Body Wrap -->
<body>
    <!-- Main Wrapper -->
    <!-- On rows -->
    <div class="container my-3">
    <table class="table">
        <tr class="table-primary">
            <td class="table-primary w-25 fw-bold">Id</td>
            <td class="table-primary">{{$data -> id}}</td>
        </tr>
        <tr class="table-primary">
            <td class="table-secondary w-25 fw-bold">name</td>
            <td class="table-secondary">{{$data -> name}}</td>
        </tr>
        <tr class="table-primary">
            <td class="table-primary w-25 fw-bold">email</td>
            <td class="table-primary">{{$data -> email}}</td>
        </tr>
        <tr class="table-primary">
            <td class="table-secondary w-25 fw-bold">phone</td>
            <td class="table-secondary">{{$data -> phone}}</td>
        </tr>
        <tr class="table-primary">
            <td class="table-primary w-25 fw-bold">subject</td>
            <td class="table-primary">{{$data -> subject}}</td>
        </tr>
        <tr class="table-primary">
            <td class="table-secondary w-25 fw-bold">message</td>
            <td class="table-secondary">{{$data -> message}}</td>
        </tr>
        <tr class="table-primary">
            <td class="table-primary w-25 fw-bold">ip</td>
            <td class="table-primary">{{$data -> ip}}</td>
        </tr>
        <tr class="table-primary">
            <td class="table-secondary w-25 fw-bold">status</td>
            <td class="table-secondary">{{$data -> status}}</td>
        </tr>
        <tr class="table-primary">
            <td class="table-primary w-25 fw-bold">created_at</td>
            <td class="table-primary">{{$data -> created_at}}</td>
        </tr>
        <tr class="table-primary">
            <td class="table-secondary w-25 fw-bold">updated_at</td>
            <td class="table-secondary">{{$data -> updated_at}}</td>
        </tr>



        <!-- On cells (`td` or `th`) -->
    </table>
    </div>
    <!-- /Main Wrapper -->
<!-- /Body Wrap  -->
<!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- jQuery -->
</body>
</html>
