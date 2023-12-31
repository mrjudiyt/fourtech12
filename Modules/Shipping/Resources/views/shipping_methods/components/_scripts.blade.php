@push('scripts')
<script type="text/javascript">
    (function($){
        "use strict";
        $(document).ready(function () {
            costFieldLabelChange();
            $(document).on('change','.cost_based_on', function(event){
                costFieldLabelChange();
            });
            $(document).on('submit', '#createForm', function(event){
                event.preventDefault();
                $('#pre-loader').removeClass('d-none');
                $('#error_shipment_time').text('');
                let shipment_time = $('#shipment_time').val();
                let userKeyRegExp1 = /^[0-9]\-[0-9] [a-z]{4}?$/;
                let userKeyRegExp2 = /^[0-9]\-[0-9]{2}\ [a-z]{4}?$/;
                let userKeyRegExp3 = /^[0-9]\-[0-9]{3}\ [a-z]{4}?$/;
                let userKeyRegExp4 = /^[0-9]{2}\-[0-9]{2}\ [a-z]{4}?$/;
                let userKeyRegExp5 = /^[0-9]{2}\-[0-9]{3}\ [a-z]{4}?$/;
                let userKeyRegExp6 = /^[0-9]{3}\-[0-9]{3}\ [a-z]{4}?$/;
                let userKeyRegExp7 = /^[0-9]\-[0-9]\ [a-z]{3}?$/;
                let userKeyRegExp8 = /^[0-9]\-[0-9]{2}\ [a-z]{3}?$/;
                let userKeyRegExp9 = /^[0-9]\-[0-9]{3}\ [a-z]{3}?$/;
                let userKeyRegExp10 = /^[0-9]{2}\-[0-9]{2}\ [a-z]{3}?$/;
                let userKeyRegExp11 = /^[0-9]{2}\-[0-9]{3}\ [a-z]{3}?$/;
                let userKeyRegExp12 = /^[0-9]{3}\-[0-9]{3}\ [a-z]{3}?$/;
                let valid1 = userKeyRegExp1.test(shipment_time);
                let valid2 = userKeyRegExp2.test(shipment_time);
                let valid3 = userKeyRegExp3.test(shipment_time);
                let valid4 = userKeyRegExp4.test(shipment_time);
                let valid5 = userKeyRegExp5.test(shipment_time);
                let valid6 = userKeyRegExp6.test(shipment_time);
                let valid7 = userKeyRegExp7.test(shipment_time);
                let valid8 = userKeyRegExp8.test(shipment_time);
                let valid9 = userKeyRegExp9.test(shipment_time);
                let valid10 = userKeyRegExp10.test(shipment_time);
                let valid11 = userKeyRegExp11.test(shipment_time);
                let valid12 = userKeyRegExp12.test(shipment_time);
                resetValidationError();
                if(valid1 !=false || valid2!=false || valid3!=false || valid4!=false || valid5!=false ||
                valid6!=false || valid7!=false || valid8!=false || valid9!=false || valid10!=false || valid11!=false || valid12!=false){
                    let data1 = shipment_time.split(" ");
                    if(data1[1] == 'days' || data1[1] == 'hrs'){
                    }else{
                        $('#pre-loader').addClass('d-none');
                        $('#error_shipment_time').text('Format must be like 3-5 days or 3-5 hrs');
                        return false;
                    }
                }
                else{
                    $('#pre-loader').addClass('d-none');
                    $('#error_shipment_time').text('Format must be like 3-5 days or 3-5 hrs');
                    return false;
                }
                let formElement = $(this).serializeArray()
                let formData = new FormData();
                formElement.forEach(element => {
                    formData.append(element.name,element.value);
                });
                formData.append('_token',"{{ csrf_token() }}");
                $('#pre-loader').removeClass('d-none');
                $.ajax({
                    url: "{{ route('shipping_methods.store')}}",
                    type:"POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success:function(response){
                        resetAfterChange(response.TableData);
                        create_form_reset();
                        toastr.success("{{__('common.created_successfully')}}", "{{__('common.success')}}");
                        $('#pre-loader').addClass('d-none');
                    },
                    error:function(response) {
                        if(response.responseJSON.error){
                            toastr.error(response.responseJSON.error ,"{{__('common.error')}}");
                            $('#pre-loader').addClass('d-none');
                            return false;
                        }
                        showValidationErrors('#createForm',response.responseJSON.errors);
                        $('#pre-loader').addClass('d-none');
                    }
                });
            });
            $(document).on('submit', '#methodEditForm', function(event){
                event.preventDefault();
                $('#pre-loader').removeClass('d-none');
                $('#error_shipment_time').text('');
                let shipment_time = $('#shipment_time').val();
                let userKeyRegExp1 = /^[0-9]\-[0-9] [a-z]{4}?$/;
                let userKeyRegExp2 = /^[0-9]\-[0-9]{2}\ [a-z]{4}?$/;
                let userKeyRegExp3 = /^[0-9]\-[0-9]{3}\ [a-z]{4}?$/;
                let userKeyRegExp4 = /^[0-9]{2}\-[0-9]{2}\ [a-z]{4}?$/;
                let userKeyRegExp5 = /^[0-9]{2}\-[0-9]{3}\ [a-z]{4}?$/;
                let userKeyRegExp6 = /^[0-9]{3}\-[0-9]{3}\ [a-z]{4}?$/;
                let userKeyRegExp7 = /^[0-9]\-[0-9]\ [a-z]{3}?$/;
                let userKeyRegExp8 = /^[0-9]\-[0-9]{2}\ [a-z]{3}?$/;
                let userKeyRegExp9 = /^[0-9]\-[0-9]{3}\ [a-z]{3}?$/;
                let userKeyRegExp10 = /^[0-9]{2}\-[0-9]{2}\ [a-z]{3}?$/;
                let userKeyRegExp11 = /^[0-9]{2}\-[0-9]{3}\ [a-z]{3}?$/;
                let userKeyRegExp12 = /^[0-9]{3}\-[0-9]{3}\ [a-z]{3}?$/;
                let valid1 = userKeyRegExp1.test(shipment_time);
                let valid2 = userKeyRegExp2.test(shipment_time);
                let valid3 = userKeyRegExp3.test(shipment_time);
                let valid4 = userKeyRegExp4.test(shipment_time);
                let valid5 = userKeyRegExp5.test(shipment_time);
                let valid6 = userKeyRegExp6.test(shipment_time);
                let valid7 = userKeyRegExp7.test(shipment_time);
                let valid8 = userKeyRegExp8.test(shipment_time);
                let valid9 = userKeyRegExp9.test(shipment_time);
                let valid10 = userKeyRegExp10.test(shipment_time);
                let valid11 = userKeyRegExp11.test(shipment_time);
                let valid12 = userKeyRegExp12.test(shipment_time);
                resetValidationError();
                if(valid1 !=false || valid2!=false || valid3!=false || valid4!=false || valid5!=false ||
                valid6!=false || valid7!=false || valid8!=false || valid9!=false || valid10!=false || valid11!=false || valid12!=false){
                    let data1 = shipment_time.split(" ");
                    if(data1[1] == 'days' || data1[1] == 'hrs'){
                    }else{
                        $('#pre-loader').addClass('d-none');
                        $('#error_shipment_time').text('Format must be like 3-5 days or 3-5 hrs');
                        return false;
                    }
                }
                else{
                    $('#pre-loader').addClass('d-none');
                    $('#error_shipment_time').text('Format must be like 3-5 days or 3-5 hrs');
                    return false;
                }
                let formElement = $(this).serializeArray()
                let formData = new FormData();
                formElement.forEach(element => {
                    formData.append(element.name,element.value);
                });
                formData.append('_token',"{{ csrf_token() }}");
                resetValidationError();
                $.ajax({
                    url: "{{ route('shipping_methods.update') }}",
                    type:"POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success:function(response){
                        resetAfterChange(response.TableData);
                        toastr.success('{{__("common.updated_successfully")}}',"{{__('common.success')}}");
                        $('#pre-loader').addClass('d-none');
                        $('.create_div').html(response.createForm);
                        $('select').niceSelect();
                    },
                    error:function(response) {
                        if(response.responseJSON.error){
                            toastr.error(response.responseJSON.error ,"{{__('common.error')}}");
                            $('#pre-loader').addClass('d-none');
                            return false;
                        }
                        showValidationErrors('#methodEditForm',response.responseJSON.errors);
                        $('#pre-loader').addClass('d-none');
                    }
                });
            });

            $(document).on("click", ".edit_method", function (event) {
                event.preventDefault();
                $('#pre-loader').removeClass('d-none');
                let id = $(this).data("id");
                let baseUrl = $('#url').val();
                let url = baseUrl + '/shipping/rate/edit/' + id;
                $.get(url, function(data){
                    $('.create_div').html(data);
                    $('#pre-loader').addClass('d-none');
                    $(".primary_select").niceSelect();
                });
            });

            $(document).on("click", ".delete_method", function (event) {
                event.preventDefault();
                let id = $(this).data("id");
                $('#shipping_delete_id').val(id);
                $('#shipping_delete_modal').modal('show');
            });

            $(document).on('submit', '#shipping_delete_form', function(event) {
                event.preventDefault();
                $('#pre-loader').removeClass('d-none');
                $('#shipping_delete_modal').modal('hide');
                var formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('id', $('#shipping_delete_id').val());
                $.ajax({
                    url: "{{ route('shipping_methods.destroy') }}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(response) {
                        if(response.msg){
                            toastr.warning(response.msg);
                            $("#pre-loader").addClass('d-none');
                        }else{
                            resetAfterChange(response.TableData);
                            toastr.success("{{__('common.deleted_successfully')}}","{{__('common.success')}}")
                            $('#pre-loader').addClass('d-none');
                            $('.create_div').html(response.createForm);
                            $('select').niceSelect();
                        }
                    },
                    error: function(response) {
                        if(response.responseJSON.error){
                            toastr.error(response.responseJSON.error ,"{{__('common.error')}}");
                            $('#pre-loader').addClass('d-none');
                            return false;
                        }
                        toastr.error("{{__('common.error_message')}}'","{{__('common.error')}}");
                    }
                });
            });

            $(document).on('change', '.status_change', function(event){
                event.preventDefault();
                let status = 0;
                if($(this).prop('checked')){
                    status = 1;
                }
                else{
                    status = 0;
                }
                let id = $(this).data('id');
                $('#pre-loader').removeClass('d-none');
                let formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('id', id);
                formData.append('status', status);
                $.ajax({
                    url: "{{ route('shipping_methods.update_status') }}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(response) {
                        if(response.status == 'last shipping rate disable not posible'){
                            toastr.info("{{__('shipping.Last shipping rate disable not posible.')}}");
                            location.reload();
                        }else{
                            toastr.success("{{__('common.updated_successfully')}}","{{__('common.success')}}");
                        }
                        $('#pre-loader').addClass('d-none');
                    },
                    error: function(response) {
                        if(response.responseJSON.error){
                            toastr.error(response.responseJSON.error ,"{{__('common.error')}}");
                            $('#pre-loader').addClass('d-none');
                            return false;
                        }
                        toastr.error("{{__('common.error_message')}}","{{__('common.error')}}");
                        $('#pre-loader').addClass('d-none');
                    }
                });
            });

            $(document).on('change', '.approve_status_change', function(event){
                event.preventDefault();
                let status = 0;
                if($(this).prop('checked')){
                    status = 1;
                }
                else{
                    status = 0;
                }
                let id = $(this).data('id');
                $('#pre-loader').removeClass('d-none');
                let formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('id', id);
                formData.append('status', status);
                $.ajax({
                    url: "{{ route('shipping_methods.update_approve_status') }}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(response) {
                        toastr.success("{{__('common.updated_successfully')}}","{{__('common.success')}}");
                        $('#pre-loader').addClass('d-none');
                    },
                    error: function(response) {

                        if(response.responseJSON.error){
                            toastr.error(response.responseJSON.error ,"{{__('common.error')}}");
                            $('#pre-loader').addClass('d-none');
                            return false;
                        }
                        toastr.error("{{__('common.error_message')}}","{{__('common.error')}}");
                        $('#pre-loader').addClass('d-none');
                    }
                });
            });

            function create_form_reset(){
                $('#createForm')[0].reset();
            }
            function resetAfterChange(response){
                $('#method_list').html(response);
                CRMTableThreeReactive();
            }
            function showValidationErrors(formType, errors){
                @if(isModuleActive('FrontendMultiLang'))
                    $(formType +' #error_method_name_{{auth()->user()->lang_code}}').text(errors['method_name.{{auth()->user()->lang_code}}']);
                @else
                    $(formType +' #error_method_name').text(errors.method_name);
                @endif
                $(formType +' #error_phone').text(errors.phone);
                $(formType +' #error_cost').text(errors.cost);
                $(formType +' #error_shipment_time').text(errors.shipment_time);
                $(formType +' #error_thumbnail_logo').text(errors.method_logo);
                $(formType +' #error_carrier_id').text(errors.carrier_id);
                $(formType +' #error_cost_based_on').text(errors.cost_based_on);
            }
            function resetValidationError(){
                @if(isModuleActive('FrontendMultiLang'))
                $('#error_method_name_{{auth()->user()->lang_code}}').text('');
                @else
                $('#error_method_name').text('');
                @endif
                $('#error_phone').text('');
                $('#error_cost').text('');
                $('#error_shipment_time').text('');
                $('#error_thumbnail_logo').text('');
                $('#error_carrier_id').text('');
                $('#error_cost_based_on').text('');
            }
            function costFieldLabelChange (){
                let costBasedOn =   $('.cost_based_on:checked').val();
                if (costBasedOn === 'Price') {
                    $('.cost_help_label').html('[Per Hundred]');
                }else if(costBasedOn === 'Weight'){
                    $('.cost_help_label').html('[Per 100 Gm]');
                } else if(costBasedOn === 'Flat') {
                    $('.cost_help_label').html('[Flat Rate]');
                }
            }
        });
    })(jQuery);
</script>
@endpush
