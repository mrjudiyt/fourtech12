<div class="row">
    <div class="col-lg-12">
        <div class="QA_section QA_section_heading_custom check_box_table">
            <div class="QA_table">
                <div class="">
                    <table class="table Crm_table_active3">
                        <thead>
                            <tr>
                                <th width="15%" scope="col" class=" text-center">{{__('common.sl')}}</th>
                                <th width="35%" scope="col" class="">{{__('common.name')}}</th>
                                <th width="20%" scope="col" class="">{{__('common.status')}}</th>
                                <th width="30%" scope="col" class="">{{__('common.action')}}</th>
                            </tr>
                        </thead>
                        <tbody id="sku_tbody">
                            @foreach($categories as $key => $category)
                            <tr>
                                <td>{{getNumberTranslate($key + 1)}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <label class="switch_toggle" for="checkbox{{ $category->id }}">
                                        <input type="checkbox" id="checkbox{{ $category->id }}" @if (permissionCheck('ticket.category.status')) class="status_change" {{$category->status?'checked':''}}  value="{{$category->id}}" data-value="{{$category->id}}" @else disabled @endif>
                                        <div class="slider round"></div>
                                    </label>
                                </td>
                                <td>
                                    <div class="dropdown CRM_dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ __('common.select') }}
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                            @if (permissionCheck('ticket.category.update'))
                                                <a data-value="{{$category->id}}" class="dropdown-item edit_category">{{ __('common.edit') }}</a>
                                            @endif
                                            @if (permissionCheck('ticket.category.delete'))
                                                <a href="" class="dropdown-item delete_category" data-value="{{$category->id}}">{{ __('common.delete') }}</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
