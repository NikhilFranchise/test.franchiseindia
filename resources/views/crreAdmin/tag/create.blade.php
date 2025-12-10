@extends('crreAdmin.layout.master')
@section('TAG', 'active open')
@section('ATL', 'active')
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
                width: 650px;
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
                font-size: 13px;
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
    <div id="content-header">
        @php
            $language = $lang == 'en' ? 'English' : 'Hindi';
        @endphp
        <!--breadcrumbs-->
        <div id="breadcrumb">
            <a href="{{ route('crreAdmin.dashboard') }}" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i>
                Home</a>
            <a href="{{ route('crreAdmin.tag.list', ['lang' => $lang]) }}" class="tip-bottom"><i class="fa fa-tags"></i> Manage
                Tags</a>
            <a href="#" class="current">Add {{ $language }} Tag</a>
        </div>
        <!--End-breadcrumbs-->
    </div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="fa fa-tags"></i></span>
                    <h5>Add {{ $language }} Tag</h5>
                </div>
                <div class="widget-content nopadding">

                    <form method="POST" class="form-horizontal"
                        action="{{ route('crreAdmin.tag.store', ['lang' => $lang]) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="control-group">
                            <label class="control-label">{{ $language }} Tag :</label>
                            <div class="controls">
                                <input type="text" maxlength="125" required class="typeahead tt-query" autocomplete="off"
                                    spellcheck="false" name="tag" placeholder="Enter Tag">
                            </div>
                        </div>
                        <div class="form-actions">
                            <a href="{{ route('crreAdmin.tag.list', ['lang' => $lang]) }}" class="btn btn-secondary"><i
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery FIRST -->
        <script src="{{ url('admin/js/typeahead.bundle.js') }}"></script> <!-- Then typeahead -->

        <script type="text/javascript">
            $(document).ready(function() {
                var tagList = {!! json_encode($tags) !!}; // Should be an array of strings

                var tags = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    local: tagList
                });

                // Initialize Typeahead
                $('.typeahead').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                }, {
                    name: 'tags',
                    source: tags
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
