@extends('layouts.backend.containerlist')

@section('dynamicdata')
<div class="box">
    <div class="box-header with-border">
       <h4>Company Profile</h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      @include('layouts.backend.alert')
      <table id="example1" class="table table-bordered table-striped company-profile-table">
        <thead>
        <tr>
            <th>SN</th>
            <th>Description</th>
            <th>Status</th>
            <th>Options</th>
        </tr>
        </thead>
       
        <tbody id="tablebody">
            @foreach($companyProfiles as $index => $record)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{!! $record->description !!}</td>
                    <td>
                        @if($record->is_active == '1')
                        <small class="label bg-green">Published</small>
                        @else
                        <small class="label bg-red">Unpublished</small>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.about-us.company-profile.edit', $record->id) }}" title="Edit message"><button class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></button></a>&nbsp;
                    </td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
        <tr>
            <th>SN</th>
            <th>Description</th>
            <th>Status</th>
            <th>Options</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
@endsection

@section('footer_js')
<script type="text/javascript">
    $(document).ready(function() {
        var oTable = $('.company-profile-table').dataTable();
    });
</script>
@endsection