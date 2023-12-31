@push('scripts')
    <script>
        (function($){
            "use strict";
            $(document).ready(function(){

                subscriberDataTable();

                $(document).on('submit', '#item_delete_form', function(event) {
                    event.preventDefault();
                    $('#pre-loader').removeClass('d-none');
                    $('#deleteItemModal').modal('hide');
                    let formData = new FormData();
                    formData.append('_token', "{{ csrf_token() }}");
                    formData.append('id', $('#delete_item_id').val());
                    let id = $('#delete_item_id').val();
                    $.ajax({
                        url: "{{ route('marketing.subscriber.delete') }}",
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(response) {
                            $('#item_table').empty();
                            $('#item_table').html(response);
                            subscriberDataTable();
                            toastr.success("{{__('common.deleted_successfully')}}", "{{__('common.success')}}");
                            $('#pre-loader').addClass('d-none');
                        },
                        error: function(response) {
                            if(response.responseJSON.error){
                                toastr.error(response.responseJSON.error ,"{{__('common.error')}}");
                                $('#pre-loader').addClass('d-none');
                                return false;
                            }
                            toastr.error("{{__('common.error_message')}}", "{{__('common.error')}}");
                            $('#pre-loader').addClass('d-none');
                        }
                    });
                });

                $(document).on('click', '.delete_subscription', function(event){
                    event.preventDefault();
                    let id = $(this).data('id');
                    showDeleteModal(id);
                });

                $(document).on('change', '.status_change_subscription', function(){
                    changeStatus($(this)[0]);
                });

                function showDeleteModal(id){
                    $('#delete_item_id').val(id);
                    $('#deleteItemModal').modal('show');
                }

                function changeStatus(el){
                    let status = 0;
                    if(el.checked){
                        status = 1;
                    }
                    else{
                        status = 0;
                    }
                    $('#pre-loader').removeClass('d-none');
                    let formData = new FormData();
                    formData.append('_token', "{{ csrf_token() }}");
                    formData.append('id', el.value);
                    formData.append('status', status);

                    $.ajax({
                        url: "{{ route('marketing.subscriber.status') }}",
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
                            toastr.error("{{__('common.error_message')}}", "{{__('common.error')}}");
                            $('#pre-loader').addClass('d-none');
                        }
                    });
                }

                $(document).on('click', '.send_verification_link', function(event){
                    event.preventDefault();
                    let id = $(this).data('id');
                    let data = {
                        id:id,
                        _token: "{{ csrf_token() }}"
                    }
                    $('#pre-loader').removeClass('d-none');
                    $.post("{{route('marketing.subscriber.send-verify-link')}}", data, function(response){
                        if(response.msg == 'success'){
                            toastr.success("{{__('marketing.Verification link send successfully')}}","{{__('common.success')}}");
                        }else{
                            toastr.error("{{__('common.error_message')}}", "{{__('common.error')}}");
                        }
                        $('#pre-loader').addClass('d-none');
                    }).fail(function(response){
                        if(response.responseJSON.error){
                            toastr.error(response.responseJSON.error ,"{{__('common.error')}}");
                            $('#pre-loader').addClass('d-none');
                            return false;
                        }
                    });
                });

                function subscriberDataTable(){
                    $('#subscriberTable').DataTable({
                        processing: true,
                        serverSide: true,
                        stateSave: true,
                        "ajax": ( {
                            url: "{{ route('marketing.subscriber.get-data') }}"
                        }),
                        "initComplete":function(json){

                        },
                        columns: [
                            { data: 'DT_RowIndex', name: 'id',render:function(data){
                            return numbertrans(data)
                            }},
                            { data: 'email', name: 'email' },
                            { data: 'date', name: 'date' },
                            { data: 'status', name: 'status' },
                            { data: 'is_verified', name: 'is_verified' },
                            { data: 'action', name: 'action' }

                        ],

                        bLengthChange: false,
                        "bDestroy": true,
                        language: {
                            search: "<i class='ti-search'></i>",
                            searchPlaceholder: trans('common.quick_search'),
                            paginate: {
                                next: "<i class='ti-arrow-right'></i>",
                                previous: "<i class='ti-arrow-left'></i>"
                            }
                        },
                        dom: 'Bfrtip',
                        buttons: [{
                                extend: 'copyHtml5',
                                text: '<i class="fa fa-files-o"></i>',
                                title: $("#header_title").text(),
                                titleAttr: 'Copy',
                                exportOptions: {
                                    columns: ':visible',
                                    columns: ':not(:last-child)',
                                }
                            },
                            {
                                extend: 'excelHtml5',
                                text: '<i class="fa fa-file-excel-o"></i>',
                                titleAttr: 'Excel',
                                title: $("#header_title").text(),
                                margin: [10, 10, 10, 0],
                                exportOptions: {
                                    columns: ':visible',
                                    columns: ':not(:last-child)',
                                },

                            },
                            {
                                extend: 'csvHtml5',
                                text: '<i class="fa fa-file-text-o"></i>',
                                titleAttr: 'CSV',
                                exportOptions: {
                                    columns: ':visible',
                                    columns: ':not(:last-child)',
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                text: '<i class="fa fa-file-pdf-o"></i>',
                                title: $("#header_title").text(),
                                titleAttr: 'PDF',
                                exportOptions: {
                                    columns: ':visible',
                                    columns: ':not(:last-child)',
                                },
                                pageSize: 'A4',
                                margin: [0, 0, 0, 0],
                                alignment: 'center',
                                header: true,
                            },
                            {
                                extend: 'print',
                                text: '<i class="fa fa-print"></i>',
                                titleAttr: 'Print',
                                title: $("#header_title").text(),
                                exportOptions: {
                                    columns: ':not(:last-child)',
                                }
                            },
                            {
                                extend: 'colvis',
                                text: '<i class="fa fa-columns"></i>',
                                postfixButtons: ['colvisRestore']
                            }
                        ],
                        columnDefs: [{
                            visible: false
                        }],
                        responsive: true,
                    });
                }
            });
        })(jQuery);

    </script>
@endpush
