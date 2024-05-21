<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$pageTitle}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h3 class="bg-secondary text-white text-center p-1 mt-2">Bulk SMS Panel</h3>
        <div class="row justify-content-around">
            <div class="col-md-6">
                @if(session('success'))
                <div id="successAlert" class="alert alert-success">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('successAlert').style.display = 'none';
                    }, 3000); // 3 seconds
                </script>
                @endif

                <div class="card mt-3">
                    <div class="card-header bg-secondary">
                        <h3 class="text-white">{{$pageTitle}}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('bulk.sms.give')}}" method="post">
                            @csrf
                            <button class="btn btn-secondary w-100 mt-2" type="submit">Submit</button>
                            <div class="form-group">
                                <div class="form-label">Sms</div>
                                <input type="number" name="sms" class="form-control" placeholder="Enter SMS Value">
                            </div>
                            <div class="form-group">
                                <div class="form-label">Select Doctor</div>
                                <select name="user_id" class="form-control" id="user">
                                    <option>Select</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mt-3">
                    <div class="card-header bg-secondary">
                        <h3 class="text-white">SMS Content</h3>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Total SMS</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userSms as $customSms)
                                <tr>
                                    <th scope="row">{{$customSms->id}}</th>
                                    <td>{{$customSms->user->phone}} - {{$customSms->user->fname}}  {{$customSms->user->lname}}</td>
                                    <td>{{$customSms->sms}}</td>
                                    <td><a href="{{ url('sms/bulk/edit')}}/{{$customSms->id}}" class="btn btn-secondary"><i class="fas fa-edit"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer">
                        {{ $userSms->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        jQuery(document).ready(function($) {
            $('#user').select2({
                ajax: {
                    url: '{{ route("get.user.data") }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        console.log(data);
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.s_mobile + ' - ' + item.user.fname + ' ' + item.user.lname,
                                    id: item.d_id
                                };
                            })
                        };
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error); 
                    },
                    cache: true
                },
                placeholder: 'Search for a user',
                minimumInputLength: 1
            });
        });
    </script>
</body>

</html>