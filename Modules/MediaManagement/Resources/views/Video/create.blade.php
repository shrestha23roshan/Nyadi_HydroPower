@extends('layouts.backend.containerform')

@section('footer_js')
    <script type="text/javascript">
        $(document).ready(function () {
            
            $('#videoAddForm').formValidation({
                framework: 'bootstrap',
                excluded: ':disabled',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    title: {
                        validators: {
                            notEmpty: {
                                message: 'Title field is required.'
                            }
                        }
                    },
                    // description: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'Description field is required.'
                    //         },
                    //     }
                    // },
                    video_url: {
                        validators: {
                            notEmpty: {
                                message: 'Video URL field is required.'
                            },
                            uri: {
                                message: 'Youtube URL link is not valid.'
                            }
                        }
                    },
                }
            }).on('blur', '[name="title"]', function(e){
                $('#videoAddForm').formValidation('revalidateField', 'title');
                $('#videoAddForm').formValidation('revalidateField', 'description');
            }).find('[name="description"]')
                .each(function () {
                    $(this)
                        .ckeditor({
                            allowedContent: true, // for allowing tags
                            removePlugins: 'sourcearea' // disable source area
                        })
                        .editor
                        .on('change', function (e) {
                            $('#videoAddForm').formValidation('revalidateField', e.sender.name);
                        });
                });
        });
    </script>
@endsection 

@section('dynamicdata')

<div class="box box-primary">
    <div class="box-header with-border">
            <h3 class="box-title">Add Video</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form id="videoAddForm" method="POST" action="{{ route('admin.media-management.video.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
        @include('layouts.backend.alert')

            <div class="form-group">
                <label for="title">Title *</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title." value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="description">Description </label>
                <textarea class="form-control" name="description">{!! old('description') !!}</textarea>
            </div>

            <div class="form-group">
                <label for="video_url">Video URL *</label>
                <input type="text" class="form-control" id="video_url" name="video_url" value="{!! old('video_url') !!}" placeholder="Enter youtube video url."/>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="is_active">
                <option value="1">Published</option>
                <option value="0">Unpublished</option>
                </select>
            </div>

        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection