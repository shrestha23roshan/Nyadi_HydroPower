@extends('layouts.backend.containerform')

@section('footer_js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#popupEditForm').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                heading: {
                    validators: {
                        notEmpty: {
                            message: 'Heading field is required.'
                        }
                    }
                },
                date: {
                    validators: {
                        notEmpty: {
                            message: 'Date field is required.'
                        },
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
        }).on('blur', '[name="title"]', function(e){
            $('#popupEditForm').formValidation('revalidateField', 'title');
            
        })
    });
</script>

<script>
    $("#file-upload").change(function(){
        $("#file-name").text(this.files[0].name);
    });
</script>
@endsection 

@section('dynamicdata')

<div class="box box-primary">
    <div class="box-header with-border">
            <h3 class="box-title">Edit Popup</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form id="popupEditForm" method="POST" action="{{ route('admin.popup.update', $popup->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
        @include('layouts.backend.alert')

            <div class="form-group">
                <label for="title">Title *</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title." value="{{ $popup->title }}" >
            </div>
        
            <div class="form-group">
                <div class="form-group has-feedback">
                    <label for="date">Date *</label>
                <input type="text" class="form-control" name="date" id="datepicker" placeholder="Select date." value="{{ $popup->date}}">
                    <span class="fa fa-calendar form-control-feedback"></span>
                </div>
            </div>

            <div class="form-group">
                <label for="attachment">Photo Attachment *</label>

                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" >
                        @if(file_exists('uploads/popup/'.$popup->attachment) && $popup->attachment != '')
                            <img src="{{ asset('uploads/popup/'.$popup->attachment) }}" alt="{{ $popup->name }}">
                        @else
                            <img src="{{ asset('uploads/popup/default-img.jpg') }}" alt="default-image">
                        @endif
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail"
                        style="max-width: 600px; max-height: auto; line-height: 20px;">
                    </div>
                    <div>
                        <span class="btn btn-primary btn-file">
                        <span class="fileupload-new"><i class="fa fa-file-pencil"></i> Change photo</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change photo</span>
                        <input type="file" name="attachment" class="default"/>
                        </span>
                    </div>
                </div>
                <span class="badge bg-red">NOTE!</span>
            </div>
    
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="is_active">
                <option value="1" {{ ($popup->is_active == 1) ? 'selected=selected' : '' }}>Published</option>
                <option value="0" {{ ($popup->is_active == 0) ? 'selected=selected' : '' }}>Unpublished</option>
                </select>
            </div>
    
            </div>
            
    
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <input type="hidden" name="_method" value="PUT">

    </form>
</div>

@endsection