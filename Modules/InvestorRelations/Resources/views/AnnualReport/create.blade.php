@extends('layouts.backend.containerform')

@section('footer_js')
<script type="text/javascript">
    $(document).ready(function () {
        
        $('#annualreportAddForm').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                title:{
                    validators:{
                        notEmpty:{
                            message : 'Title field is required.'
                        }
                    }
                },
                attachment: {
                    validators: {
                        notEmpty: {
                            message: 'File Attachment field is required.'
                        },
                        file: {
                            extension: 'jpg,jpeg,gif,png,doc,docx,xls,xlsx,pdf,txt,zip',
                            maxSize: 10485760,   // 10 * 1024 * 1024
                            message: 'The selected file is not valid or file size greater than 10 MB.'
                        }
                    }
                },
            }
        }).on('blur', '[name="title"]', function(e){
            $('#annualreportAddForm').formValidation('revalidateField', 'title');
        })
    });
</script>

@endsection 

@section('dynamicdata')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create Annual Report</h3>
</div>
    <!-- /.box-header -->
    <!-- form start -->
    <form id="annualreportAddForm" method="POST" action="{{ route('admin.investor-relations.annualreport.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
        @include('layouts.backend.alert')

            <div class="form-group">
                <label for="title">File Title *</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title." value="{{ old('title') }}" >
            </div>

            <div class="form-group">
                <label for="attachment">File Attachment *</label>
    
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-preview fileupload-exists thumbnail"
                        style="max-width: 600px; max-height: auto; line-height: 20px;">
                    </div>
                    <div>
                        <span class="btn btn-primary btn-file">
                        <span class="fileupload-new"><i class="fa fa-file-pencil"></i> Select File</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change File</span>
                        <input type="file" name="attachment" class="default"/>
                        </span>
                    </div>
                </div>
                <span class="badge bg-red">NOTE!</span>
                <span>file format should be in jpg, jpeg, doc, pdf and png.</span>
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