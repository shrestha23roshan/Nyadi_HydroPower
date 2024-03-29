@extends('layouts.backend.containerform')

@section('footer_js')
<script type="text/javascript">
    $(document).ready(function () {
        
        $('#teamAddForm').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name:{
                    validators:{
                        notEmpty:{
                            message: 'Name filed is required.'
                        }
                    }
                },
                post:{
                    validators:{
                        notEmpty:{
                            message: 'Post filed is required.'
                        }
                    }
                },
                attachment: {
                    validators: {
                        file: {
                            extension: 'jpg,jpeg,png',
                            maxSize: 1048576,   // 1 * 1024 * 1024
                            message: 'The selected file is not valid or file size greater than 1 MB.'
                        }
                    }
                },
            }
        }).on('blur', '[name="name"]', function(e){
            $('#teamAddForm').formValidation('revalidateField', 'name');
            $('#teamAddForm').formValidation('revalidateField', 'location');
            $('#teamAddForm').formValidation('revalidateField', 'description');
        })
        .find('[name="description"]')
                .each(function () {
                    $(this)
                        .ckeditor({
                            allowedContent: true,
                            removePlugins: 'sourcearea' // disable source area
                        })
                        .editor
                        .on('change', function (e) {
                            $('#teamAddForm').formValidation('revalidateField', e.sender.name);
                        });
                });
    });
</script>

@endsection 

@section('dynamicdata')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create Board of Director</h3>
</div>
    <!-- /.box-header -->
    <!-- form start -->
    <form id="teamAddForm" method="POST" action="{{ route('admin.about-us.team.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
        @include('layouts.backend.alert')

            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name." value="{{ old('name') }}" >
            </div>

            <div class="form-group">
                <label for="post">Post *</label>
                <input type="text" class="form-control" id="post" name="post" placeholder="Enter post." value="{{ old('post') }}" >
            </div>
            
            <div class="form-group">
                <label for="description">Description </label>
                <textarea class="form-control" id="description" name="description">{!! old('description') !!}</textarea>
            </div>

            <div class="form-group">
                <label for="attachment">Photo Attachment </label>
    
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 600px; height: auto;">
                        <img src="{{ asset('uploads/aboutus/teams/default-img.jpg') }}" alt="">
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail"
                        style="max-width: 600px; max-height: auto; line-height: 20px;">
                    </div>
                    <div>
                        <span class="btn btn-primary btn-file">
                        <span class="fileupload-new"><i class="fa fa-file-pencil"></i> Select photo</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change photo</span>
                        <input type="file" name="attachment" class="default"/>
                        </span>
                    </div>
                </div>
                <span class="badge bg-red">NOTE!</span>
                <span>Photo file format should be in jpg, jpeg and png.</span>
            </div>
          
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="is_active">
                <option value="1">Published</option>
                <option value="0">Unpublished</option>
                </select>
            </div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection