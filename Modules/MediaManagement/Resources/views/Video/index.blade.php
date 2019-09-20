@extends('layouts.backend.containerlist')

@section('dynamicdata')
<div class="box">
    <div class="box-header with-border">
      <a href="{{ route('admin.media-management.video.create') }}"><button class="btn btn-primary">Add New &nbsp;<i class="fa fa-plus"></i></button></a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      @include('layouts.backend.alert')
      <table id="example1" class="table table-bordered table-striped video-table">
        <thead>
            <tr>
                <th>SN</th>
                <th>Title</th>
                <th>Video</th>
                <th>Status</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody id="tablebody">
            @foreach ($videos as $record)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $record->title }}</td>
                    <td class="image">
                        @if($record->video_url)
                            <img src="http://img.youtube.com/vi/{{ $record->video_url }}/mqdefault.jpg" alt="{{ $record->title }}" width="200">
                        @endif
                      </td>
                    <td>
                        @if($record->is_active == '1')
                            <small class="label bg-green">Published</small>
                        @else
                            <small class="label bg-red">Unpublished</small>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.media-management.video.edit', $record->id) }}" title="Edit video"><button class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></button></a>&nbsp;
                        <a href="javascript:;" title="Delete video" class="delete-video" id="{{ $record->id }}"><button class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>SN</th>
                <th>Title</th>
                <th>Video</th>
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
        var oTable = $('.video-table').dataTable();

        $('#tablebody').on('click', '.delete-video', function(e){
        e.preventDefault();
        $object = $(this);
        var id = $object.attr('id');
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function() {
            $.ajax({
                type: "DELETE",
                url: "{{ url('/admin/media-management/video') }}"+"/"+id,
                dataType: 'json',
                success: function(response){
                    var nRow = $($object).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                    swal('success', response.message, 'success').catch(swal.noop);
                },
                error: function(e){
                    swal('Oops...', 'Something went wrong!', 'error').catch(swal.noop);
                }
            });
        }).catch(swal.noop);
        });
    });
</script>
@endsection
