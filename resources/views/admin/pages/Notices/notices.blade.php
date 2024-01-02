@extends('admin.master')

@section('content')
<div class="shadow p-4 d-flex justify-content-between align-items-center rounded">
    <h4 class="text-uppercase">Notices</h4>
</div>
<div class="container my-5 py-5">
    <table class="table align-middle mb-4 text-center bg-white">
        <thead class="bg-light">
            <tr>
                <th>Date</th>
                <th>Notice About</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notices->reverse() as $index => $notice)
            <tr>
                <td>{{ $notice->select_date }}</td>
                <td>{{ $notice->notice_title }}</td>
                <td>
                    <a href="#" class="btn btn-success rounded-pill" data-toggle="modal"
                        data-target="#noticeModal{{ $index }}">Details</a>
                </td>
            </tr>
            <!-- Notice Modal for each notice -->
            <div class="modal fade" id="noticeModal{{ $index }}" tabindex="-1" role="dialog"
                aria-labelledby="noticeModal{{ $index }}Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="noticeModal{{ $index }}Label">{{
                                $notice->notice_title }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Detailed information about the specific notice -->
                            <p>“{{ $notice->description }}”</p><br>
                            <p>Thank you,</p>
                            <p>HR HUB 360</p>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>



<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</div>
@endsection