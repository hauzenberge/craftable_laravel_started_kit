@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.role.actions.edit', ['name' => $role->name]))

@section('body')

<div class="container-xl">
    <div class="card">

        <role-form 
            :action="'{{ $role->resource_url }}'" 
            :data="{{ $role->toJson() }}" 
            :permissions_list="{{ $permissions->toJson() }}"
            v-cloak inline-template>

            <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                <div class="card-header">
                    <i class="fa fa-pencil"></i> {{ trans('admin.role.actions.edit', ['name' => $role->name]) }}
                </div>

                <div class="card-body">
                    @include('admin.role.components.form-elements')

                    <div class="form-group row align-items-center" :class="{'has-danger': errors.has('permissions'), 'has-success': fields.permissions && fields.permissions.valid }">
                        <label for="permissions" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{
        trans('admin.role.columns.permissions') }}</label>
                        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
                            <multiselect 
                            v-model="form.permissions" 
                            :options="{{ $permissions->toJson() }}" 
                            placeholder="Select Permissions" 
                            label="name" 
                            track-by="id" 
                            :multiple="true">
                            </multiselect>

                            <div v-if="errors.has('permissions')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('permissions') }}</div>
                        </div>
                    </div>
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>

            </form>

        </role-form>

    </div>

</div>

@endsection