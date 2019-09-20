@extends('layouts.backend.containerform') @section('footer_js')
<script type="text/javascript">

    $(document).ready(function () {
        $('#sidebar li').removeClass('active');
        $('#sidebar a').removeClass('active');
        $('#sidebar').find('#page').addClass('active');

        $('#pageAddForm').formValidation({
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
                $('#pageAddForm').formValidation('revalidateField', 'heading');
                $('#pageAddForm').formValidation('revalidateField', 'title');
                $('#pageAddForm').formValidation('revalidateField', 'description');
            }).find('[name="description"]')
            .each(function () {
                $(this)
                    .ckeditor({
                        allowedContent: true,
                        removePlugins: 'sourcearea' // disable source area
                    })
                    .editor
                    .on('change', function (e) {
                        $('#pageAddForm').formValidation('revalidateField', e.sender.name);
                    });
            });
    });
</script>
@endsection @section('dynamicdata')

<!-- iCheck -->
<div class="box box-success">
    <div class="box-header">
        <h3 class="box-title">Add Page</h3>
    </div>
    <div class="box-body">

        <form id="pageAddForm" action="{{ route('admin.pages.store') }}" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-12 col-xs-11">
                <label for="">Main Page *</label>
                <select name="parent_id" class="form-control">
                    {{-- <option value="0">Main Page Itself</option> --}}
                    @foreach($parents as $parent)
                    <option value="{!! $parent->id !!}">{!! $parent->heading !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="clearfix"></div>


            <div class="form-group col-md-6 col-xs-11">
                <label for="moduleSlug">Heading *</label>
                <div class="form-line">
                    <input type="text" name="heading" value="{!! old('heading') !!}" class="form-control heading" placeholder="Enter Heading"
                    />
                </div>
            </div>
            <div class="form-group col-md-6 col-xs-11">
                <label for="moduleSlug">Page Title </label>
                <div class="form-line">
                    <input type="text" name="title" value="{!! old('title') !!}" class="form-control title" placeholder="Enter Page Title" />
                </div>
            </div>
            <div class="form-group col-md-12 col-xs-11">
                <label for="moduleSlug">Description *</label>
                <textarea class="form-control" name="description" rows="6">{!! old('description') !!}</textarea>
            </div>

            <div class="form-group col-md-6 col-xs-11">
                <label for="">Order Position</label>
                <div class="form-line">
                    <input type="number" min="0" name="order_position" value="{{ old('order_position') }}" class="form-control"
                    placeholder="Select order"/>
                </div>
            </div>

            <div class="form-group col-md-6 col-xs-11">
                <label for="">Status</label>
                <select name="is_active" class="form-control">
                    <option value="1">Published</option>
                    <option value="0">Unpublished</option>
                </select>
            </div>

            <div class="clearfix"></div>

            <div class="form-group col-md-6 col-xs-11">
                <label for="attachment">Image Attachment</label>
                <div class="fileupload fileupload-new " data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 260px; height: auto;">
                        <img src="{{ asset('uploads/noimage.jpg') }}" alt="">
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 260px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-primary btn-file">
                            <span class="fileupload-new">
                                <i class="fa fa-file-photo-o"></i> Select image</span>
                            <span class="fileupload-exists">
                                <i class="fa fa-undo"></i> Change</span>
                            <input type="file" name="attachment" class="default" />
                        </span>
                    </div>
                </div>
                <span class="label label-danger">NOTE!</span>
                <span>Valid file extensions are jpg, jpeg and png.</span>
            </div>

            <div class="clearfix"></div>

            <div class="form-group col-md-6 col-xs-11">
                <label for="file">File Attachment *</label>
    
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-preview fileupload-exists thumbnail"
                        style="max-width: 600px; max-height: auto; line-height: 20px;">
                    </div>
                    <div>
                        <span class="btn btn-primary btn-file">
                        <span class="fileupload-new"><i class="fa fa-file-pencil"></i> Select File</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change File</span>
                        <input type="file" name="file" class="default"/>
                        </span>
                    </div>
                </div>
                <span class="badge bg-red">NOTE!</span>
                <span>file format should be in jpg, jpeg, doc, pdf and png.</span>
            </div>

            <div class="clearfix"></div>

            {!! csrf_field() !!}
            <button type="submit" class="btn btn-info waves-effect" style="margin-left:15px;">
                <span>Submit
                    <i class="fa fa-check"></i>
                </span>
            </button>
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
