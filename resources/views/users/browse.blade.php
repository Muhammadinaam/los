@extends('voyager::master')

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ $dataType->display_name_plural }}
        <a href="{{ route('voyager.'.$dataType->slug.'.create') }}" class="btn btn-success">
            <i class="voyager-plus"></i> Add New
        </a>
    </h1>
@stop

@section('page_header_actions')

@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <table id="dataTable" class="table table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Avatar</th>
                                    <th>Role</th>
                                    <th>Company</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>Telephone</th>
                                    <th>Mobile</th>
                                    <th class="actions text-center col-md-2">Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Avatar</th>
                                    <th>Role</th>
                                    <th>Company</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>Telephone</th>
                                    <th>Mobile</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> Are you sure you want to delete
                        this {{ $dataType->display_name_singular }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.'.$dataType->slug.'.index') }}" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="Yes, Delete This {{ $dataType->display_name_singular }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('javascript')
    <!-- DataTables -->
    <script>


        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{url("admin/users-datatable")}}',
            columns: [
                { data: 'name', name: 'users.name' },
                { data: 'email', name: 'users.email' },
                { data: 'avatar', name: 'users.avatar' },
                { data: 'display_name', name: 'roles.display_name' },
                { data: 'company_name', name: 'users.company_name' },
                { data: 'country', name: 'users.country' },
                { data: 'city', name: 'users.city' },
                { data: 'telephone', name: 'users.telephone' },
                { data: 'mobile', name: 'users.mobile' },
                { data: 'action', name: 'action', 'searchable': 'false', 'orderable': 'false' },
            ]
        });
        

        $(document).on('click', '.delete', function (e) {
            var form = $('#delete_form')[0];

            form.action = parseActionUrl(form.action, $(this).data('id'));

            $('#delete_modal').modal('show');
        });

        function parseActionUrl(action, id) {
            return action.match(/\/[0-9]+$/)
                ? action.replace(/([0-9]+$)/, id)
                : action + '/' + id;
        }
    </script>
@stop
