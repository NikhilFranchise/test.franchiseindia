@extends('crreAdmin.layout.master')
@section('CAT', 'active open')
@section('CATL', 'active')
@section('content')
    @push('styles')
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
        </style>
    @endpush
    <div id="content-header">
        @php
            $language = $lang == 'en' ? 'English' : 'Hindi';
        @endphp
        <div id="breadcrumb">
            <a href="{{ route('crreAdmin.dashboard') }}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>
                Home</a>
            <a href="{{ route('crreAdmin.cat.list', ['lang' => $lang]) }}" class="tip-bottom"
                title="Go to Manage Categories"><i class="fa fa-cube"></i> Manage
                Categories</a>
            <a class="current">Edit {{ $language }} Main Category</a>
        </div>
    </div>
    <div class="container-fluid">
        <!-- <hr> -->
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="fa fa-cube"></i> </span>
                    <h5>Edit {{ $language }} Main Category</h5>
                </div>
                <div class="widget-content nopadding">
                    <form method="POST" class="form-horizontal"
                        action="{{ route('crreAdmin.cat.update', ['lang' => $lang]) }}">
                        @csrf
                        <input type="hidden" name="catid" value="{{ $editData->id }}">
                        <div class="control-group">
                            <label class="control-label">Main Category :</label>
                            <div class="controls">
                                <input type="text" maxlength="125" required class="typeahead tt-query" autocomplete="off"
                                    spellcheck="false" name="maincat" id="maincat" placeholder="Enter Main Category"
                                    value="{{ $editData->catname }}" oninput="chText('{{ $lang }}')" />
                                <span id="error-message" style="color:red;"></span>

                            </div>
                        </div>
                        @if ($lang == 'hi')
                            <div class="control-group">
                                <label class="control-label">Slug :</label>
                                <div class="controls">
                                    <input type="text" maxlength="125" required class="span11" name="slug"
                                        id="slug" placeholder="Slug" value="{{ $editData->slug }}" />
                                </div>
                            </div>
                        @endif
                        <div class="form-actions" style="text-align: center;">
                            <button type="submit" id="ariclesubmit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            function chText(locale) {
                var str = $("#maincat").val();
                var regex;
                if (locale === 'en') {
                    regex = /[^a-zA-Z0-9\s&-]/g;
                } else {
                    regex = /[^\u0900-\u097F\s&-]/g;
                }
                if (regex.test(str)) {
                    str = str.replace(regex, "");
                    $("#maincat").val(str);
                    // SweetAlert warning
                    Swal.fire({
                        icon: 'warning',
                        title: locale === 'en' ? 'Invalid Characters' : 'अमान्य अक्षर',
                        text: locale === 'en' ?
                            "Only English letters, numbers, spaces, &, and - are allowed!" :
                            "केवल हिंदी अक्षर, संख्या, स्पेस, &, और - की अनुमति है!",
                        timer: 2000,
                        showConfirmButton: false,
                        toast: true,
                        position: 'top-end'
                    });
                }
            }
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
