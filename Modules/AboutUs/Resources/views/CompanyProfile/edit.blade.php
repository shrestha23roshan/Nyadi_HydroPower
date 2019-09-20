@extends('layouts.backend.containerform')

@section('footer_js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#companyprofilesEditForm').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                    description: {
                            validators: {
                                notEmpty: {
                                    message: 'Description field is required.'
                                },
                            }
                        },
                }
        }).on('blur', '[name="description"]', function(e){
            $('#companyprofilesEditForm').formValidation('revalidateField', 'description');
            
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
                            $('#companyprofilesEditForm').formValidation('revalidateField', e.sender.name);
                        });
                });
    });
</script>

@endsection 

@section('dynamicdata')

<div class="box box-primary">
    <div class="box-header with-border">
            <h3 class="box-title">Edit Company Profile</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form id="companyprofilesEditForm" method="POST" action="{{ route('admin.about-us.company-profile.update', $companyProfile->id) }}">
        {{ csrf_field() }}
        <div class="box-body">
        @include('layouts.backend.alert')
        
            <div class="form-group">
                <label for="description">Description *</label>
                <textarea class="form-control" id="description" name="description">{!! $companyProfile->description !!}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="is_active">
                <option value="1" {{ ($companyProfile->is_active == 1) ? 'selected=selected' : '' }}>Published</option>
                <option value="0" {{ ($companyProfile->is_active == 0) ? 'selected=selected' : '' }}>Unpublished</option>
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