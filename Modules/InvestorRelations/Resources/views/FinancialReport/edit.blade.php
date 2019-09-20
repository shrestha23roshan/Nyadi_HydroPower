@extends('layouts.backend.containerform')

@section('footer_js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#financialreportEditForm').formValidation({
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
                        file: {
                            extension: 'jpg,jpeg,gif,png,doc,docx,xls,xlsx,pdf,txt,zip',
                            maxSize: 10485760,   // 10 * 1024 * 1024
                            message: 'The selected file is not valid or file size greater than 10 MB.'
                        }
                    }
                },
                    
                }
        }).on('blur', '[name="title"]', function(e){
            $('#financialreportEditForm').formValidation('revalidateField', 'title');
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
            <h3 class="box-title">Edit Financial Report</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form id="financialreportEditForm" method="POST" action="{{ route('admin.investor-relations.financialreport.update', $financialReport->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
        @include('layouts.backend.alert')
            <div class="form-group">
                <label for="title">Title *</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title." value="{{ $financialReport->title }}" >
            </div>

            <div class="form-group">
                <label for="attachment">File Attachment *</label>

                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" >
                        @if(file_exists('uploads/investor-relations/financialreports/'.$financialReport->attachment) & $financialReport->attachment != '')
                        <a href="{!! asset('uploads/investor-relations/financialreports/'.$financialReport->attachment) !!}" target="_blank">{{ $financialReport->attachment }}</a>
                        @endif
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail"
                        style="max-width: 600px; max-height: auto; line-height: 20px;">
                    </div>
                    <div>
                        <span class="btn btn-primary btn-file">
                        <span class="fileupload-new"><i class="fa fa-undo"></i> Select file</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" name="attachment" class="default"/>
                        </span>
                    </div>
                </div>
                <span class="badge bg-red">NOTE!</span>
            </div>
    
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="is_active">
                <option value="1" {{ ($financialReport->is_active == 1) ? 'selected=selected' : '' }}>Published</option>
                <option value="0" {{ ($financialReport->is_active == 0) ? 'selected=selected' : '' }}>Unpublished</option>
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