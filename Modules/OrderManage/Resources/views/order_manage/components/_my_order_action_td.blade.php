<div class="dropdown CRM_dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false"> {{__('common.select')}}
    </button>
    @if(permissionCheck('order_manage.my_sales_index'))
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
            <a href="{{route('order_manage.show_details_mine',$order_package->id)}}" class="dropdown-item" type="button">{{__('common.details')}}</a>
        </div>
    @endif
</div>
