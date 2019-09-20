@extends('layouts.backend.containerform') 

@section('footer_js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebar li').removeClass('active');
            $('#sidebar a').removeClass('active');
            $('#sidebar').find('#contents').addClass('active');
            $('#sidebar').find('#page').addClass('active');

            $('.delete-attachment').click(function (e) {
                e.preventDefault();
                $object = $(this);
                var id = $object.attr('id');
                swal({
                    title: 'Are you sure?',
                    text: "You are going to remove the attachment!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, remove it!'
                }).then(function () {
                    $.ajax({
                        type: "PUT",
                        url: "{{ url('/admin/pages/remove/attachment/') }}",
                        data: {id: id},
                        dataType: 'json',
                        success: function (response) {
                            $object.parent('span').hide();
                            $('.normal img').attr('src', "{{ asset('uploads/noimage.jpg')}}");
                            swal("Deleted!", response.message, "success");
                        },
                        error: function (e) {
                            swal('Oops...', 'Something went wrong!', 'error');
                        }
                    });
                });
            });

            $('#pageEditForm').formValidation({
                framework: 'bootstrap',
                excluded: ':disabled',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    attachment: {
                        validators: {
                            file: {
                                extension: 'jpg,jpeg,png',
                                maxSize: 1048576, // 1 * 1024 * 1024
                                message: 'The selected file is not valid or file size greater than 1 MB.'
                            }
                        }
                    },
                    file: {
                    validators: {
                        file: {
                            extension: 'jpg,jpeg,gif,png,doc,docx,xls,xlsx,pdf,txt,zip',
                            maxSize: 10485760,   // 10 * 1024 * 1024
                            message: 'The selected file is not valid or file size greater than 10 MB.'
                        }
                    }
                },
                    heading: {
                        validators: {
                            notEmpty: {
                                message: 'Heading field is required.'
                            }
                        }
                    },
                    // title: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Page Title field is required.'
                    //         }
                    //     }
                    // },
                    description: {
                        validators: {
                            notEmpty: {
                                message: 'Description field is required.'
                            }
                        }
                    },
                    order_position: {
                        validators: {
                            notEmpty: {
                                message: 'Order Position field is required.'
                            }
                        }
                    },
                }
            }).on('blur', '[name="heading"]', function (e) {
                $('#pageEditForm').formValidation('revalidateField', 'heading');
                $('#pageEditForm').formValidation('revalidateField', 'title');
                $('#pageEditForm').formValidation('revalidateField', 'description');
            }).find('[name="description"]')
                .each(function () {
                    $(this)
                        .ckeditor({
                            allowedContent: true,
                            removePlugins: 'sourcearea' // disable source area
                        })
                        .editor
                        .on('change', function (e) {
                            $('#pageEditForm').formValidation('revalidateField', e.sender.name);
                        });
                });
        });
    </script>
@endsection

@section('dynamicdata')

<!-- iCheck -->
<div class="box box-success">
  <div class="box-header">
    <h3 class="box-title">Edit Page</h3>
  </div>

  <div class="box-body">

    <form action="{{ route('admin.pages.update', $page->id) }}"
        method="post" enctype="multipart/form-data" id="pageEditForm" >

      <div class="form-group col-md-12 col-xs-11">
          <label for="">Main Page *</label>
          <select name="parent_id" class="form-control">
              <option value="0">Main Page Itself</option>
              @foreach($parents as $parent)
                  <option value="{!! $parent->id !!}"
                          @if($parent->id == $page->parent_id) selected="selected" @endif>{!! $parent->heading !!}</option>
              @endforeach
          </select>
      </div>
      <div class="clearfix"></div>


      <div class="form-group col-md-6 col-xs-11">
          <label for="moduleSlug">Heading *</label>
          <div class="form-line">
          <input type="text" name="heading"
                 class="form-control heading"
                 value="{!! $page->heading !!}"
                 placeholder="Enter Heading"/>
          </div>
      </div>
      <div class="form-group col-md-6 col-xs-11">
          <label for="moduleSlug">Page Title </label>
          <div class="form-line">
          <input type="text" name="title"
                 class="form-control title"
                 value="{!! $page->title !!}"
                 placeholder="Enter Title"/>
          </div>
      </div>
      <div class="form-group col-md-12 col-xs-11">
          <label for="moduleSlug">Description</label>
          <textarea class="form-control" name="description"
                    rows="6">{{ $page->description }}</textarea>
      </div>

      <div class="clearfix"></div>

      <div class="form-group col-md-6 col-xs-11">
          <label for="">Order Position</label>
          <div class="form-line">
          <input type="number" min="0" name="order_position" value="{{ $page->order_position }}" class="form-control">
      </div>
      </div>
      
      <div class="form-group col-md-6 col-xs-11">
        <label for="">Status</label>
        <select name="is_active" class="form-control">
            <option value="1" {{ ($page->is_active == 1) ? 'selected=selected' : '' }}>Published</option>
            <option value="0" {{ ($page->is_active == 0) ? 'selected=selected' : '' }}>Unpublished</option>
        </select>
    </div>
      <div class="clearfix"></div><br />

      <div class="form-group col-md-6 col-xs-11">
          <label for="attachment">Attachment</label>
          <div class="fileupload fileupload-new normal" data-provides="fileupload">
              <div class="fileupload-new thumbnail" style="width: 250px; height: auto;">
                  @if(file_exists('uploads/pages/'.$page->attachment) && $page->attachment!='')
                      <img src="{{ asset('uploads/pages/'.$page->attachment) }}" alt="">
                  @else
                      <img src="{{ asset('uploads/noimage.jpg') }}" alt="">
                  @endif
              </div>
              <div class="fileupload-preview fileupload-exists thumbnail"
                   style="max-width: 250px; max-height: 150px; line-height: 20px;"></div>
              <div>
                  <span class="btn btn-primary btn-file">
                      <span class="fileupload-new"><i class="fa fa-undo"></i> Change Image</span>
                      <span class="fileupload-exists"><i class="fa fa-undo"></i> Change Image</span>
                      <input type="file" name="attachment" class="default"/>
                  </span>
              </div>
          </div>
          <span class="label label-danger">NOTE!</span>
          <span>Valid file extensions are jpg, jpeg and png.</span>
      </div>

      
      <div class="clearfix"></div>

      <div class="form-group">
        <label for="file">File Attachment *</label>

        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail" >
                @if(file_exists('uploads/pages/'.$page->file) & $page->file != '')
                <a href="{!! asset('uploads/pages/'.$page->file) !!}" target="_blank">{{ $page->file }}</a>
                @endif
            </div>
            <div class="fileupload-preview fileupload-exists thumbnail"
                style="max-width: 600px; max-height: auto; line-height: 20px;">
            </div>
            <div>
                <span class="btn btn-primary btn-file">
                <span class="fileupload-new"><i class="fa fa-undo"></i> Select file</span>
                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                <input type="file" name="file" class="default"/>
                </span>
            </div>
        </div>
        <span class="badge bg-red">NOTE!</span>
    </div>

    <div class="clearfix"></div>


      {!! csrf_field() !!}
      <button type="submit" class="btn btn-info waves-effect" style="margin-left:15px;">
        <span>Submit
            <i class="fa fa-check"></i>
        </span>
    </button>
      <input type="hidden" name="_method" value="PUT"/>
  </form>
<!-- #END# Basic Table -->

<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col (right) -->
</div>
<!-- /.row -->
@stop
