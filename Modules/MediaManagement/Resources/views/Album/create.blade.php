@extends('layouts.backend.containerform')

@section('footer_js')
    <script type="text/javascript">
        $(document).ready(function () {
            
            $('#albumAddForm').formValidation({
                framework: 'bootstrap',
                excluded: ':disabled',
                icon: {
                    valid: 'glyphicon glyphicon-ok',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    attachment: {
                        validators: {
                            notEmpty: {
                                message: 'Cover Photo Attachment field is required.'
                            },
                            file: {
                                extension: 'jpg,jpeg,png',
                                maxSize: 1048576,   // 1 * 1024 * 1024
                                message: 'The selected file is not valid or file size greater than 1 MB.'
                            }
                        }
                    },
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Name field is required.'
                            }
                        }
                    }
                }
            }).on('blur', '[name="name"]', function(e){
                $('#albumAddForm').formValidation('revalidateField', 'name');
            });
        });
    </script>
@endsection 

@section('dynamicdata')

<div class="box box-primary">
    <div class="box-header with-border">
            <h3 class="box-title">Add Album</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form id="albumAddForm" method="POST" action="{{ route('admin.media-management.album.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
        @include('layouts.backend.alert')

            <div class="form-group">
                <label for="main_album_id">Choose *</label>
                <select class="form-control" name="main_album_id">
                    @foreach($mainAlbums as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Album Name *</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter album name." value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="attachment">Cover Photo Attachment *</label>

                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 600px; height: auto;">
                        <img src="{{ asset('uploads/media-management/album/default-img.jpg') }}" alt="">
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail"
                        style="max-width: 600px; max-height: auto; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-primary btn-file">
                        <span class="fileupload-new"><i class="fa fa-file-pencil"></i> Select photo</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change photo</span>
                        <input type="file" name="attachment" class="default"/>
                        </span>
                    </div>
                </div>
                <span class="badge bg-red">NOTE!</span>
                <span>photo file format should be in jpg, jpeg and png.</span>

            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="is_active">
                <option value="1">Published</option>
                <option value="0">UnPublished</option>
                </select>
            </div>
            {{-- <div class="form-group">
                <input type="checkbox" name="show_on" value="1">Show On<br>
            </div> --}}

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection