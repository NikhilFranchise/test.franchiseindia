@extends('crreAdmin.layout.master')
@section('CAT', 'active open')
@section('CATL', 'active')
@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <style type="text/css">
        .typeahead,
        .tt-query,
        .tt-hint {
            border: 2px solid #CCCCCC;
            border-radius: 8px;
            font-size: 22px;
            height: 30px;
            line-height: 30px;
            outline: medium none;
            padding: 8px 12px;
            width: 850px;
        }

        .typeahead {
            background-color: #FFFFFF;
        }

        .typeahead:focus {
            border: 2px solid #0097CF;
        }

        .tt-query {
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
        }

        .tt-hint {
            color: #999999;
        }

        .tt-menu {
            background-color: #FFFFFF;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            margin-top: 12px;
            padding: 8px 0;
            width: 422px;
        }

        .tt-suggestion {
            font-size: 22px;
            padding: 3px 20px;
        }

        .tt-suggestion:hover {
            cursor: pointer;
            background-color: #0097CF;
            color: #FFFFFF;
        }

        .tt-suggestion p {
            margin: 0;
        }

        .select2-container .select2-selection {
            box-sizing: border-box;
            cursor: pointer;
            display: block;
            min-height: 32px;
            user-select: none;
            -webkit-user-select: none;
            width: 812px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            display: none;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #5a6268;
            color: #fff;
            box-shadow: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
            color: #fff;
        }
    </style>
@endpush
@section('content')

    <!--breadcrumbs-->
    @php
        $language = $lang == 'en' ? 'English' : 'Hindi';
    @endphp
    <div id="content-header">
        <div id="breadcrumb">
            <a href="{{ route('crreAdmin.dashboard') }}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>
                Home</a>
            <a href="{{ route('crreAdmin.subcat.list', ['lang' => $lang]) }}" title="Go to Manage Categories"
                class="tip-bottom"><i class="fa fa-cube"></i> Manage
                Categories</a>
            <a href="{{ url()->current() }}" class="current">Add {{ $language }} Sub Category</a>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="fa fa-cube"></i></span>
                    <h5>Add {{ $language }} Sub Category</h5>
                </div>
                <div class="widget-content nopadding">

                    <form method="POST" class="form-horizontal"
                        action="{{ route('crreAdmin.subcat.store', ['lang' => $lang]) }}">
                        @csrf
                        <div class="control-group">
                            <label class="control-label">Main Category :</label>
                            <div class="controls">

                                <select class="span11" name="maincat" spellcheck="false">
                                    <option value="">Select Main Category</option>
                                    @foreach ($cat as $value)
                                        <option value="{{ $value->id }}">{{ $value->catname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Sub Category :</label>
                            <div class="controls" id="sub_categories">
                                <select multiple style="display: none;" name="sub_categories[]" id="select3"></select>
                            </div>
                        </div>
                        @if ($lang == 'hi')
                            <div class="control-group">
                                <label class="control-label">Sub Category Slug:</label>
                                <div class="controls">
                                    <input class="span11" required name="sub_catslug[]" />
                                </div>
                            </div>
                        @endif

                        <div class="form-actions">
                            <a href="{{ route('crreAdmin.subcat.list', ['lang' => $lang]) }}" class="btn btn-secondary"><i
                                    class="fa fa-times"></i> Cancel</a>
                            <button type="submit" class="btn btn-success" style="float: right;" id="newssubmit"><i
                                    class="fa fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Add this line for jQuery -->
        <script src="{{ url('admin/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                var businessCategories = {!! json_encode($subCategories) !!};
                // Language from backend
                var locale = "{{ $lang }}";
                // Filter categories by language
                var categories = businessCategories.filter(function(category) {
                    return category.lang === locale;
                });
                // Map to Select2's data format
                var tagArray = categories.map(function(category) {
                    return {
                        id: category.subcat_name,
                        text: category.subcat_name
                    };
                });

                var $select = $('#select3');
                // Pre-populate the <select> with the options
                $select.empty();
                tagArray.forEach(function(item) {
                    // third and fourth args (defaultSelected, selected) are false
                    var option = new Option(item.text, item.id, false, false);
                    $select.append(option);
                });

                // Initialize Select2
                $select.select2({
                    placeholder: locale === 'en' ? "Choose Subcategories..." : "उप श्रेणियाँ चुनें...",
                    minimumInputLength: 2, // start matching after 2 characters
                    tags: true, // allow creating new tags
                    data: tagArray,
                    // Prevent duplicates and only create tag if not already present
                    createTag: function(params) {
                        var term = $.trim(params.term);
                        if (term === '') return null;
                        // if term already exists (case-insensitive), don't create
                        var exists = false;
                        $select.find('option').each(function() {
                            if ($(this).val().toLowerCase() === term.toLowerCase()) {
                                exists = true;
                                return false; // break
                            }
                        });
                        if (exists) return null;

                        return {
                            id: term,
                            text: term,
                            newTag: true
                        };
                    },
                    // Custom matcher: split user input into tokens and require all tokens to be present
                    matcher: function(params, data) {
                        // if there is no search term, show all options
                        if (!params.term || params.term.trim() === '') {
                            return data;
                        }
                        var term = params.term.toLowerCase().trim();
                        var tokens = term.split(/\s+/).filter(Boolean);
                        var text = (data.text || '').toLowerCase();

                        // require every token to appear somewhere in the option text
                        for (var i = 0; i < tokens.length; i++) {
                            if (text.indexOf(tokens[i]) === -1) {
                                return null;
                            }
                        }
                        return data;
                    }
                });
            });
        </script>
        @if (session('success'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    icon: 'success',
                    title: 'Success!',
                    text: `{!! session('success') !!}`,
                    timer: 3000,
                    showConfirmButton: false,
                    timerProgressBar: true,
                    background: '#f0f9f4',
                    color: '#155724',
                    confirmButtonColor: '#28a745'
                });
            </script>
        @endif
        @if (session('warning'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    background: '#fff3cd',
                    color: '#856404',
                    icon: 'warning',
                    title: 'Warning!',
                    text: `{!! session('warning') !!}`,
                    confirmButtonColor: '#ffc107'
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    background: '#fff3cd',
                    color: '#856404',
                    icon: 'error',
                    title: 'Oops!',
                    html: `{!! session('error') !!}`,
                    confirmButtonColor: '#dc3545'
                });
            </script>
        @endif
    @endpush
@endsection
