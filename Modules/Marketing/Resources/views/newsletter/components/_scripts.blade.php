@push('scripts')
    <script>
        (function($){
            "use strict";
            $(document).ready(function() {

                newsletterDataTable();

                $(document).on('submit', '#item_delete_form', function(event) {
                    event.preventDefault();
                    $('#pre-loader').removeClass('d-none');
                    $('#deleteItemModal').modal('hide');
                    let formData = new FormData();
                    formData.append('_token', "{{ csrf_token() }}");
                    formData.append('id', $('#delete_item_id').val());
                    let id = $('#delete_item_id').val();
                    $.ajax({
                        url: "{{ route('marketing.news-letter.delete') }}",
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(response) {
                            reloadWithData(response);
                            toastr.success("{{__('common.deleted_successfully')}}", "{{__('common.success')}}");
                            $('#pre-loader').addClass('d-none');
                        },
                        error: function(response) {
                            toastr.error("{{__('common.error_message')}}", "{{__('common.error')}}");
                            $('#pre-loader').addClass('d-none');
                        }
                    });
                });

                $(document).on('click', '.delete_mail', function(event){
                    event.preventDefault();
                    let id = $(this).data('id');
                    $('#delete_item_id').val(id);
                    $('#deleteItemModal').modal('show');
                });

                function newsletterDataTable(){
                    $('#newsLetterTable').DataTable({
                        processing: true,
                        serverSide: true,
                        stateSave: true,
                        "ajax": ( {
                            url: "{{ route('marketing.news-letter.get-data') }}"
                        }),
                        "initComplete":function(json){
                            
                        },
                        columns: [
                            { data: 'DT_RowIndex', name: 'id',render:function(data){
                            return numbertrans(data)
                            }},
                            { data: 'title', name: 'title' },
                            { data: 'publish_date', name: 'publish_date' },
                            { data: 'status', name: 'status' },
                            { data: 'created_by', name: 'created_by' },
                            { data: 'mail_to', name: 'mail_to' },
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

                function reloadWithData(response){
                    $('#item_table').empty();
                    $('#item_table').html(response.TableData);
                    newsletterDataTable();
                }

            });
        })(jQuery);

    </script>
@endpush