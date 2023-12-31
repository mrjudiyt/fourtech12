@extends('backEnd.master')
@section('styles')
<link rel="stylesheet" href="{{asset(asset_path('modules/marketing/css/flash_deal_create.css'))}}" />
@endsection
@section('mainContent')
@if(isModuleActive('FrontendMultiLang'))
@php
$LanguageList = getLanguageList();
@endphp
@endif
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <form action="{{route('marketing.flash-deals.store')}}" enctype="multipart/form-data" method="POST">
        <div class="row">
                @csrf
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"> {{__('marketing.create_flash_deal')}} </h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="formHtml" class="col-lg-12">
                        <div class="white-box">
                                <div class="add-visitor">
                                    <div class="row">
                                        @if(isModuleActive('FrontendMultiLang'))
                                            <div class="col-lg-12">
                                                <ul class="nav nav-tabs justify-content-start mt-sm-md-20 mb-30 grid_gap_5" role="tablist">
                                                    @foreach ($LanguageList as $key => $language)
                                                        <li class="nav-item lang_code" data-id="{{$language->code}}">
                                                            <a class="nav-link anchore_color @if (auth()->user()->lang_code == $language->code) active @endif" href="#element{{$language->code}}" role="tab" data-toggle="tab" aria-selected="@if (auth()->user()->lang_code == $language->code) true @else false @endif">{{ $language->native }} </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div class="tab-content">
                                                    @foreach ($LanguageList as $key => $language)
                                                        <div role="tabpanel" class="tab-pane fade @if (auth()->user()->lang_code == $language->code) show active @endif" id="element{{$language->code}}">
                                                            <div class="col-lg-12">
                                                                <div class="primary_input mb-25">
                                                                    <label class="primary_input_label" for="title">{{__('common.title')}} <span class="text-danger">*</span></label>
                                                                    <input class="primary_input_field" type="text" id="title" name="title[{{$language->code}}]" autocomplete="off" value="{{ old('title.'.$language->code) }}" placeholder="{{__('common.title')}}">
                                                                    @if ($errors->has('title.'.auth()->user()->lang_code))
                                                                        <span class="text-danger">{{ $errors->first('title.'.auth()->user()->lang_code) }}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-lg-12">
                                                <div class="primary_input mb-25">
                                                    <label class="primary_input_label" for="title">{{__('common.title')}} <span class="text-danger">*</span></label>
                                                    <input class="primary_input_field" type="text" id="title" name="title" autocomplete="off" value="{{ old('title') }}" placeholder="{{__('common.title')}}">
                                                    @error('title')
                                                        <span class="text-danger" id="error_title">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-lg-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for="background_color">{{__('marketing.background_color')}} <span class="text-danger">*</span></label>
                                                <input class="primary_input_field" type="text" id="background_color" class="form-control" name="background_color" autocomplete="off" value="" placeholder="{{__('#000000')}}">
                                                @error('background_color')
                                                <span class="text-danger" id="error_background_color">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="primary_input mb-25">
                                                <label class="primary_input_label" for="text_color">{{__('marketing.text_color')}} <span class="text-danger">*</span></label>
                                                <input class="primary_input_field" type="text" id="text_color" name="text_color" autocomplete="off" value="" placeholder="{{__('#000000')}}">
                                                @error('text_color')
                                                    <span class="text-danger" id="error_text_color">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="primary_input_label" for="">{{ __('common.banner') }} {{__('common.image')}} ({{getNumberTranslate(1920)}} X {{getNumberTranslate(500)}}){{__('common.px')}} <span class="text-danger">*</span></label>
                                            <div class="primary_input mb-25">
                                                <div class="primary_file_uploader" data-toggle="amazuploader" data-multiple="false" data-type="image" data-name="flash_deal_banner_image">
                                                    <input class="primary-input file_amount" type="text" id="image" placeholder="{{__('common.browse_image_file')}}" readonly="">
                                                    <button class="" type="button">
                                                        <label class="primary-btn small fix-gr-bg" for="image">{{__("common.image")}} </label>
                                                        <input type="hidden" class="selected_files" value="">
                                                    </button>
                                                </div>
                                                <div class="product_image_all_div">   
                                                </div>
                                            </div>
                                            @error('flash_deal_banner_image')
                                                <span class="text-danger" id="error_date">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="primary_input mb-15">
                                                <label class="primary_input_label" for="date">{{__('common.date')}} <span class="text-danger">*</span></label>
                                                <div class="primary_datepicker_input">
                                                    <div class="no-gutters input-right-icon">
                                                        <div class="col">
                                                            <div class="">
                                                                <input placeholder="{{__('common.date')}}" class="primary_input_field primary-input form-control" id="date" type="text" name="date" autocomplete="off" readonly required>
                                                            </div>
                                                            <input type="hidden" name="start_date" id="start_date" value="">
                                                            <input type="hidden" name="end_date" id="end_date" value="">
                                                        </div>
                                                        <button class="btn-date" data-id="#date" type="button"> <i class="ti-calendar" id="start-date-icon"></i> </button>
                                                    </div>
                                                </div>
                                                @error('date')
                                                    <span class="text-danger" id="error_date">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="primary_input mb-15">
                                                <label class="primary_input_label" for="products">{{ __('common.products') }} <span class="text-danger">*</span></label>
                                                <select id="products" class="mb-15">
                                                    <option disabled selected value="">{{ __('marketing.select_products') }}</option>
                                                </select>
                                                @error('products')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-40">
                                        <div class="col-lg-12 text-center">
                                        <button id="submit_btn" type="submit" class="primary-btn fix-gr-bg" data-toggle="tooltip" title="" data-original-title=""> <span class="ti-check"></span> {{__('common.save')}} </button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-30">{{__('marketing.selected_product_list')}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="white-box overflow-auto">
                            <div id="item_table">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="35%" class="text-center">{{__('common.product')}}</th>
                                            <th width="15%" class="text-center">{{__('common.price')}}</th>
                                            <th width="15%" class="text-center">{{__('common.discount')}}</th>
                                            <th width="25%" class="text-center">{{__('common.discount_type')}}</th>
                                            <th width="10%" class="text-center">{{__('common.delete')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sku_tbody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</section>
@endsection
@push('scripts')
    <script>
        (function($){
            "use strict";
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            today = mm + '/' + dd + '/' + yyyy;
            $(document).ready(function(){
                $("#background_color").spectrum();
                $("#text_color").spectrum();
                $(document).on('change','#products', function(event){
                    $('#pre-loader').removeClass('d-none');
                    $('#submit_btn').prop('disabled',true);
                    $('.p_discount_type').removeClass('discount_type');
                    let product_id = $('#products').val();
                    if(product_id != null){
                        $.post('{{ route('marketing.flash-deals.product-list') }}', {_token:'{{ csrf_token() }}', product_id:product_id}, function(data){
                            let exsists = $('#product_'+product_id).length;
                            if(exsists < 1){
                                $('#sku_tbody').append(data);
                                $('#submit_btn').prop('disabled',false);
                                $('.discount_type').niceSelect();
                                $('#products').val('');
                                $('#products').niceSelect('update');
                                $('#pre-loader').addClass('d-none');
                            }else{
                                $('#pre-loader').addClass('d-none');
                                toastr.error("{{__('marketing.this_item_already_added_to_list')}}");
                                $('#submit_btn').prop('disabled',false);
                                $('#products').val('');
                                $('#products').niceSelect('update');
                            }
                        });
                    }
                    else{
                        $('#submit_btn').prop('disabled',false);
                        $('#pre-loader').addClass('d-none');
                    }
                });
                $('#date').daterangepicker({
                    "timePicker": false,
                    "linkedCalendars": false,
                    "autoUpdateInput": false,
                    "showCustomRangeLabel": false,
                    "startDate": today,
                    "endDate": today,
                    "buttonClasses": "primary-btn fix-gr-bg",
                    "applyButtonClasses": "primary-btn fix-gr-bg",
                    "cancelClass": "primary-btn fix-gr-bg",
                }, function(start, end, label) {
                    $('#date').val(start.format('DD-MM-YYYY')+' to ' + end.format('DD-MM-YYYY'));
                    $('#start_date').val(start.format('DD-MM-YYYY'));
                    $('#end_date').val(end.format('DD-MM-YYYY'));
                });
                $(document).on('click', '.product_delete_btn', function(event){
                    event.preventDefault();
                    let this_data = $(this)[0];
                    delete_product_row(this_data);
                });
                function delete_product_row(this_data){
                    let row = this_data.parentNode.parentNode;
                    row.parentNode.removeChild(row);
                }
                dynamicSelect2WithAjax("#products", "{{url('/products/seller-products/get-by-ajax')}}", "GET");
            });
        })(jQuery);
    </script>
@endpush
