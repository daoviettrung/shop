@extends('admin.index')

@section('content')
    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
        Delete cache
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Dashboard</h2>
                <button id='cache-clear' class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-calendar-remove"></i>Clear cache</button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $("#cache-clear").click(function() {
            $.ajax({
                url: 'dashboard/cache-clear',
                method: 'POST',
                data: {},
                success: function(resp) {
                    if(resp.status == true) {
                        $('.sufee-alert').show();
                    }
                }
            });
        });
    </script>
@endsection
