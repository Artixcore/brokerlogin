@extends('admin.master')
@section('style_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
<div class="container">
    <h1 class="h3 mb-3"><strong>Mails</strong></h1>
        <div class="row">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
</div>

@endsection
@section('footer_js')

<script>
    function myFunction() {
        if(!confirm("Bist Du sicher?"))
        event.preventDefault();
    }
</script>

    <script>
        $(document).ready(function() {
    $('#table').DataTable();
} );
    </script>


@endsection
