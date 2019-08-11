@extends('adminlte::page')

@section('content')
<div class="form-group" value-if="permissionType == 'crud'">
    <label for="resource" class="label">Resource</label>
    <input class="form-control input-filter input-sm" id="resource" v-model="resource" placeholder="Ketik untuk mencari.." name="search" type="text">
</div>

<!-- /Checkbox -->
<div class="form-group" value-if="permissionType == 'crud'">
        <div class="form-check" value-model="crudSelected">
            <input class="form-check-input" type="checkbox" checked="true" value="create" style="position: relative;">
            <label class="form-check-label">Create</label>
            <input class="form-check-input" type="checkbox" checked="true" value="read" style="position: relative;">
            <label class="form-check-label">Read</label>
            <input class="form-check-input" type="checkbox" checked="true" value="update" style="position: relative;">
            <label class="form-check-label">Update</label>
            <input class="form-check-input" type="checkbox" checked="true" value="delete" style="position: relative;">
            <label class="form-check-label">Delete</label>
        </div>
  </div>
   <!-- /.Checkbox -->
<input type="hidden" name="crud_selected" : value="crudSelected">
<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
                <th>Nama</th>
                <th>Slug</th>
                <th>Deskripsi</th>
            </thead>
            <tbody value-if="resource.length > 3">
                <td value-for="item in crudSelected"></td>
                <td value-text="crudName(item)"></td>
                <td value-text="crudSlug(item)"></td>
                <td value-text="crudDescription(item)"></td>
            </tbody>
@endsection
<script>
    var app = new({
        el: '#app',
        data: {
            permissionType: 'basic',
            resource: 'ini',
            crudSelected: ['create', 'read', 'update', 'delete']
        }
        method: {
            crudName: function(item) {
                return item.substr('apalah');
            },
            crudSlug: function(item) {
                return item.substr('itulah');
            },
            crudDescription: function(item) {
                return item.substr('adalah');
            }
        }
    });
</script>

