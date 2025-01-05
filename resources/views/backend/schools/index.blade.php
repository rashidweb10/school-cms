<!-- resources/views/backend/dashboard.blade.php -->
@extends('backend.layouts.app')

@section('title', 'Schools')

@section('content')
<div class="page-title-head d-flex align-items-center gap-2">
    <div class="flex-grow-1">
        <h4 class="fs-16 text-uppercase fw-bold mb-0">Schools</h4>
    </div>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-bottom border-dashed d-flex align-items-center">
                <h4 class="header-title">Schools</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>User</th>
                                <th>Account No.</th>
                                <th>Balance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="assets/images/users/avatar-2.jpg" alt="table-user" class="me-2 avatar-sm rounded-circle" />
                                    Risa D. Pearson
                                </td>
                                <td>AC336 508 2157</td>
                                <td>July 24, 1950</td>
                                <td class="text-muted">
                                    <a href="javascript: void(0);" class="link-reset fs-20 p-1"> <i class="ti ti-pencil"></i></a>
                                    <a href="javascript: void(0);" class="link-reset fs-20 p-1"> <i class="ti ti-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="assets/images/users/avatar-3.jpg" alt="table-user" class="me-2 avatar-sm rounded-circle" />
                                    Ann C. Thompson
                                </td>
                                <td>SB646 473 2057</td>
                                <td>January 25, 1959</td>
                                <td class="text-muted">
                                    <a href="javascript: void(0);" class="link-reset fs-20 p-1"> <i class="ti ti-pencil"></i></a>
                                    <a href="javascript: void(0);" class="link-reset fs-20 p-1"> <i class="ti ti-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="assets/images/users/avatar-4.jpg" alt="table-user" class="me-2 avatar-sm rounded-circle" />
                                    Paul J. Friend
                                </td>
                                <td>DL281 308 0793</td>
                                <td>September 1, 1939</td>
                                <td class="text-muted">
                                    <a href="javascript: void(0);" class="link-reset fs-20 p-1"> <i class="ti ti-pencil"></i></a>
                                    <a href="javascript: void(0);" class="link-reset fs-20 p-1"> <i class="ti ti-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="assets/images/users/avatar-5.jpg" alt="table-user" class="me-2 avatar-sm rounded-circle" />
                                    Sean C. Nguyen
                                </td>
                                <td>CA269 714 6825</td>
                                <td>February 5, 1994</td>
                                <td class="text-muted">
                                    <a href="javascript: void(0);" class="link-reset fs-20 p-1"> <i class="ti ti-pencil"></i></a>
                                    <a href="javascript: void(0);" class="link-reset fs-20 p-1"> <i class="ti ti-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div><!-- end row-->

<script defer>
    //initDatatable('.table');
</script>
@endsection